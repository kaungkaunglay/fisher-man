<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsBuyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if(!session()->has('user_id')){
            return to_route('login');
        }

        $user = Users::find(session()->get('user_id'));

        if ($user->roles()->first()->id != 3) {
            abort(403, 'Unauthorized Access');
        }

        return $next($request);
    }
}
