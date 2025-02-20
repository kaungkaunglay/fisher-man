<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $host = $request->getHost(); // Get full domain (e.g., en.r-mekiki.com)
        $subdomain = explode('.', $host)[0]; // Get first part (en or jp)

        // Define allowed languages
        $languages = ['en', 'jp'];

        // Check if subdomain matches a language
        if (in_array($subdomain, $languages)) {
            App::setLocale($subdomain);
            Session::put('locale', $subdomain);
        } else {
            App::setLocale(config('app.fallback_locale')); // Default language
        }
        return $next($request);
    }
}
