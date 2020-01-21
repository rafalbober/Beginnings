<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::guard('admin')->check()) {
                return redirect('/admin');
            }
            if(Auth::guard('teacher')->check()) {
                return redirect('/teachers/home');
            }
            if(Auth::guard('student')->check()) {
                return redirect('/student/home');
            }
            else {
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
