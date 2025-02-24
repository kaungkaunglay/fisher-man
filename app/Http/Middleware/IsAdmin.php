<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!AuthHelper::check())
        {
            return redirect()->route('admin.login');
        }

        $user = AuthHelper::auth();
        if ($user->roles->first()->id != 1 && $user->roles->first()->id != 2) {
            abort(403, 'Unauthorized Access');
        }
        return $next($request);
    }
}
