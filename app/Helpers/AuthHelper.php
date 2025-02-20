<?php

namespace App\Helpers;

use App\Models\OAuths;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthHelper
{
    protected static $providers = ['line', 'google', 'facebook'];

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

    public static function user(): ?Users
    {
        return self::auth();
    }

    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    public static function check(): bool
    {
        // Check if the user is authenticated via Auth or if any OAuth session is valid
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
        // Clear all provider tokens
        foreach (self::$providers as $provider) {
            session()->forget([
                "{$provider}_token",
                "{$provider}_refresh_token"
            ]);
        }

        session()->forget('user_id');
        Auth::logout();

        // Clear any cached OAuth tokens
        if ($userId = self::id()) {
            Cache::forget("oauth_token_{$userId}");
        }

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
        if (!$userId) {
            return false;
        }

        // Check each provider's token
        foreach (self::$providers as $provider) {
            if (self::isValidProviderSession($userId, $provider)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if a specific provider's session is valid
     *
     * @param int $userId
     * @param string $provider
     * @return bool
     */
    private static function isValidProviderSession(int $userId, string $provider): bool
    {
        $token = session("{$provider}_token");
        if (!$token) {
            return false;
        }

        // Cache the OAuth token lookup to avoid frequent DB hits
        $cacheKey = "oauth_token_{$userId}_{$provider}";
        
        return Cache::remember($cacheKey, 60, function () use ($userId, $provider, $token) {
            $oauth = OAuths::where('user_id', $userId)
                         ->where('provider', $provider)
                         ->latest()
                         ->first();

            return $oauth && $oauth->token === $token;
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
        if (!$userId) {
            return null;
        }

        return Cache::remember("session_user_{$userId}", 60, function () use ($userId) {
            return Users::find($userId);
        });
    }

    /**
     * Get the provider used for authentication
     *
     * @return string|null
     */
    public static function getAuthProvider(): ?string
    {
        foreach (self::$providers as $provider) {
            if (session("{$provider}_token")) {
                return $provider;
            }
        }

        return null;
    }
}