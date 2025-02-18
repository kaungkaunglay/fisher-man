<?php

namespace App\Helpers;

use App\Models\OAuths;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthHelper
{
    /**
     * Get the currently authenticated user.
     *
     * @return \App\Models\User|null
     */
    public static function auth(): ?Users
    {
        // First, check the standard Laravel Auth system
        if (Auth::check()) {
            return Auth::user();
        }

        // If not authenticated via Auth, try to retrieve user from session
        return self::getUserFromSession();
    }

    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    public static function check(): bool
    {
        // Check if the user is authenticated via Auth or if the OAuth session is valid
        return Auth::check() || self::checkOAuthSession();
    }

    /**
     * Get the currently authenticated user's ID.
     *
     * @return int|null
     */
    public static function id(): ?int
    {
        return Auth::id() ?? session('user_id');
    }

    /**
     * Log the user out by clearing their session and logging out of Auth.
     *
     * @return bool
     */
    public static function logout(): bool
    {
        session()->forget(['user_id', 'line_token']);
        Auth::logout();

        // Optionally log the logout event
        \Log::info('User logged out', ['user_id' => self::id()]);

        return true;
    }

    /**
     * Helper to check OAuth session validity.
     *
     * @return bool
     */
    private static function checkOAuthSession(): bool
    {
        $userId = session('user_id');
        $lineToken = session('line_token');

        if (!$userId || !$lineToken) {
            return false;
        }

        // Cache the OAuth token lookup to avoid frequent DB hits
        return Cache::remember("oauth_token_{$userId}", 60, function () use ($userId, $lineToken) {
            $oauth = OAuths::where('user_id', $userId)
                           ->latest()
                           ->first();

            return $oauth && $oauth->token === $lineToken;
        });
    }

    /**
     * Helper to get the user from the session.
     *
     * @return \App\Models\User|null
     */
    private static function getUserFromSession(): ?Users
    {
        $userId = session('user_id');
        if ($userId) {
            return Users::find($userId);
        }

        return null;
    }
}
