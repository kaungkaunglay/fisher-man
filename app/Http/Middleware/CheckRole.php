<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!AuthHelper::check()) {
            return redirect()->route('login');
        }

        $user = AuthHelper::auth();
        $roleId = optional($user->roles->first())->id;

        return match ($roleId) {
            1 => to_route('admin.index'),
            2 => to_route('profile_seller'),
            3 => to_route('profile_user'),
            default => abort(403, 'Unauthorized access'),
        };

        return $next($request);
    }
}
