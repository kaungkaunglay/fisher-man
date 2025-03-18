<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\OAuths;
use App\Helpers\AuthHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    private $isProfileUpdated = false;

    protected $providerMap = [
        'line' => 'line_id',
        'google' => 'google_id',
        'facebook' => 'facebook_id'
    ];

    public function handleCallback(Request $request, string $provider)
    {
        try {
            // Get user from provider
            $providerUser = Socialite::driver($provider)->user();

            // Encrypt tokens
            $token = Hash::make($providerUser->token);
            $refreshToken = Hash::make($providerUser->refresh_token);

            // Log the user information if needed
            // Log::info(ucfirst($provider) . ' User:', (array) $providerUser);

            // Get the correct ID field for this provider
            $providerIdField = $this->providerMap[$provider];


            $this->isProfileUpdated = AuthHelper::check();
            // First try to find user by provider ID
            $user = Users::where($providerIdField, $providerUser->getId())->first();

            if($user && $this->isProfileUpdated){
                session()->flash('status','error');
                session()->flash('message',`Your {$provider} OAuth already registered with another account.`);
                return redirect()->route('profile');
            }

            // If no user found by provider ID, check by email
            if (!$user && $providerUser->getEmail()) {

                $user = $this->isProfileUpdated ? AuthHelper::user(): Users::where('email', $providerUser->getEmail())->first();

                if ($user) {


                    if($user->email != $providerUser->getEmail()){
                        session()->flash('status',"error");
                        session()->flash('message',"Your provided email does not match with your {$provider} account.");

                        return redirect()->route('profile');
                    }

                    // Update the provider ID for the existing user
                    $user->update([
                        // 'username' => $providerUser->getName(),
                        // 'email' => $providerUser->getEmail(),
                        $providerIdField => $providerUser->getId(),
                        'avatar' => $providerUser->getAvatar()
                    ]);

                }
            }

            // If still no user, create new one
            if (!$user && !$this->isProfileUpdated) {
                $user = $this->createNewUser($providerUser, $providerIdField);
            }

            // Save OAuth information
            $this->saveOAuthData($user, $provider, $token, $refreshToken, $providerUser->expiresIn);

            // Store session data
            $this->storeSessionData($provider, $token, $refreshToken, $user->id);

            if($provider == 'line'){
                send_push_notification($user->id, 'Welcome! You have successfully logged in with LINE.');
            }

            session()->flash('status','success');
            session()->flash('message',`{$provider} OAuth added successfully`);
            return $this->isProfileUpdated ? redirect()->route('profile') : ( session('cart_login') ? redirect()->route('cart.login.finished')  :redirect()->route('home'));
        } catch (\Exception $e) {
            Log::error("Error in handle{$provider}Callback: " . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('login')->with('error', "Failed to authenticate with " . ucfirst($provider));
        }
    }

    protected function createNewUser($providerUser, $providerIdField)
    {
        $userData = [
            'username' => $providerUser->getName(),
            $providerIdField => $providerUser->getId(),
            'avatar' => $providerUser->getAvatar() ?? null,
            'email' => $providerUser->getEmail() ?? $providerUser->getId() . '@placeholder.com'
        ];


        $user = Users::create($userData);
        $user->assignRole(3);
        return $user;
    }

    protected function saveOAuthData($user, $provider, $token, $refreshToken, $expiresIn)
    {
        OAuths::updateOrCreate(
            [
                'user_id' => $user->id,
                'provider' => $provider
            ],
            [
                'token' => $token,
                'refresh_token' => $refreshToken,
                'expires_in' => $expiresIn
            ]
        );
    }

    protected function storeSessionData($provider, $token, $refreshToken, $userId)
    {
        Session::put([
            "{$provider}_token" => $token,
            'user_id' => $userId,
            "{$provider}_refresh_token" => $refreshToken
        ]);
    }

    // Provider-specific routes that use the generic handler
    public function handleLineCallback(Request $request)
    {
        return $this->handleCallback($request, 'line');
    }

    public function handleGoogleCallback(Request $request)
    {
        return $this->handleCallback($request, 'google');
    }

    public function handleFacebookCallback(Request $request)
    {
        return $this->handleCallback($request, 'facebook');
    }

    public function removeProvider($provider)
    {
        $user = AuthHelper::user();

        // Remove the provider's ID dynamically
        $column = "{$provider}_id";

        if (Schema::hasColumn('users', $column)) {
            $user->update([
                $column => null
            ]);
        }

        // Remove OAuth entry from related table
        $user->oAuths()->where('provider', $provider)->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'OAuth removed successfully');

        return response()->json([
            'status' => true,
            'message' => "{$provider} OAuth removed successfully"
        ]);
    }

}
