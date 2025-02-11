<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('user') && ($request->path() != '/' && $request->path() != '/login' && $request->path() != '/register' && $request->path() != '/forgot_password')) {
            return redirect('login')->with('fail', 'You must be logged in');
        }
        return $next($request);
    }
}
