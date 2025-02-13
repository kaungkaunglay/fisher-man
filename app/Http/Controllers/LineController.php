<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
        logger('it is working');
        try {
            // Get the user information from LINE
            $user = Socialite::driver('line')->user();

            logger(json_encode($user, JSON_PRETTY_PRINT));

            // Redirect the user to the dashboard or home page
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong with LINE login.');
        }
    }
}
