<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!AuthHelper::check()){
            return to_route('login');
        }
        return $next($request);
    }
}
