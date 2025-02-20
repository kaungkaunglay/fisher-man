<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\OAuths;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
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
            Log::info(ucfirst($provider) . ' User:', (array) $providerUser);

            // Get the correct ID field for this provider
            $providerIdField = $this->providerMap[$provider];

            // Find or create user
            $user = $this->findOrCreateUser($providerUser, $provider, $providerIdField);

            // Save OAuth information
            $this->saveOAuthData($user, $provider, $token, $refreshToken, $providerUser->expiresIn);

            // Store session data
            $this->storeSessionData($provider, $token, $refreshToken, $user->id);

            return redirect()->route('home');
        } catch (\Exception $e) {
            Log::error("Error in handle{$provider}Callback: " . $e->getMessage(), ['exception' => $e]);
            return redirect()->route('login')->with('error', "Failed to authenticate with " . ucfirst($provider));
        }
    }

    protected function findOrCreateUser($providerUser, $provider, $providerIdField)
    {
        $user = Users::where($providerIdField, $providerUser->getId())->first();

        if ($user) {
            $this->updateUserInfo($user, $providerUser);
        } else {
            $user = $this->createNewUser($providerUser, $providerIdField);
        }

        return $user;
    }

    protected function updateUserInfo($user, $providerUser)
    {
        $user->update([
            'username' => $providerUser->getName(),
            'email' => $providerUser->getEmail(),
            'avatar' => $providerUser->getAvatar()
        ]);
    }

    protected function createNewUser($providerUser, $providerIdField)
    {
        $user = Users::create([
            'username' => $providerUser->getName(),
            'email' => $providerUser->getEmail(),
            'avatar' => $providerUser->getAvatar(),
            $providerIdField => $providerUser->getId()
        ]);

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
}