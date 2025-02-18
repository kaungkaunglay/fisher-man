<?php

namespace App\Http\Middleware;

use App\Helpers\AuthHelper;
use Closure;
use App\Models\Users;
use App\Models\OAuths;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSeller
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
            return redirect()->route('login');
        }

        $user = AuthHelper::auth();

        if ($user->roles->first()->id != 2) {
            abort(403, 'Unauthorized Access');
        }

        return $next($request);
    }
}
