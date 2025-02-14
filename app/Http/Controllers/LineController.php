<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\OAuths; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Auth;


class LineController extends Controller
{
    /**
     * Redirect the user to the LINE authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    /**
     * Handle the callback from LINE.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleLineCallback(Request $request)
    {
        try {
            // Get the user information from LINE
            $line = Socialite::driver('line')->user();
            //token encrypt 
            $line_token = Hash::make($line->token); 
            $refresh_token = Hash::make($line->refresh_token); 

            // Log the user information from LINE
            Log::info('LINE User:', (array) $line);
            // check if the user is already registered
            $user = Users::where('line_id', $line->getId())->first();
            logger($user);
            if($user){
                // Update the user's information
                $user->username = $line->getName();
                $user->email = $line->getEmail();
                $user->avatar = $line->getAvatar();
                $user->save();
            }else{
                // Save the user information to the Users model
                $user = new Users();
                $user->username = $line->getName();
                $user->email = $line->getEmail();
                $user->avatar = $line->getAvatar();
                $user->line_id = $line->getId();
                $user->save();
            }
            

            // save the informatoin to Oauth with user id 
            $oauth = OAuths::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'provider' => 'line'
                ],
                [
                    'token' => $line_token,
                    'refresh_token' => $refresh_token,
                    'expires_in' => $line->expiresIn
                ]
            );
            //save the token in session
            Session::put('line_token', $line_token );
            Session::put('user_id', $user->id );
            Session::put('line_refresh_token', $refresh_token );
            // Redirect the user to the dashboard or home page
            return redirect()->route('home');
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Error in handleLineCallback: ' . $e->getMessage(), context: ['exception' => $e]);
            return redirect()->route('login')->with('error', 'Failed to authenticate with LINE.');
        }
    }
}
