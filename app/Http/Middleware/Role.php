<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        $user = Auth::user();
        if($user !== null) {
            foreach($roles as $role) {
                if($user->role->name === $role) {
                    return $next($request);
                }
            }
        }

        return redirect('home');
    }
}
