<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // $allowed_ips = ['127.0.0.1', '150.95.27.152']; 

        // if (!in_array($request->ip(), $allowed_ips)) {
        //     abort(403, 'Access denied');
        // }

        // return $next($request);
    }
}
