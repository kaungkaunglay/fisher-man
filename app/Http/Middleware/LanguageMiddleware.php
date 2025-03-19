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
        $host = $request->getHost();
        $parts = explode('.', $host);
        $subdomain = count($parts) >= 3 ? $parts[0] : 'jp'; // Default to 'en'
                                                                                                                                                                       
        // Determine language based on ENV variable
        $locale = env('APP_LOCALE', env('APP_FALLBACK_LOCALE', 'jp'));

        // Set Laravel's locale
        App::setLocale($locale);
        Session::put('locale', $locale);
        return $next($request);
    }
}
