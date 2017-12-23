<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->user_type != 'member' && Auth::user()->status != '0') {
                return $next($request);
            } else {
                return redirect('/admin/login');
            }
        }
        return redirect('/admin/login');
    }
}
