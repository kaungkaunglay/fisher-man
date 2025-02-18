<?php

namespace App\Helpers;

use App\Models\OAuths;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    /**
     * Get the currently authenticated user.
     *
     * @return \App\Models\User|null
     */
    public static function auth()
    {
        return Auth::user() ?? (session()->has('user_id') ? Users::find(session('user_id')) : null );
    }

    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    public static function check()
    {
        return Auth::check() || (session()->has('user_id') ? OAuths::where('user_id',session('user_id'))->limit(1)->latest()->token === session('line_token') : false) ;
    }

    /**
     * Get the currently authenticated user's ID.
     *
     * @return int|null
     */
    public static function id()
    {
        return Auth::id() ?? session('user_id');
    }

    /**
     * logout function
     *
     * @return bool
     */

    public static function logout()
    {
        session()->forget('user_id');
        session()->forget('line_token');
        Auth::logout();

        return true;
    }
}

