<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(in_array('testauth', $guards, true) && Auth::guard('testauth')->check()) {
            return redirect(route('testauth.dashboard'));
        }
        if(in_array('admin', $guards, true) && Auth::guard('admin')->check()) {
            return redirect(route('admin.dashboard'));
        }
        if(in_array('administrator', $guards, true) && Auth::guard('administrator')->check()) {
            return redirect(route('administrator.dashboard'));
        }
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
