<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         //  check if theire is any user logged in
         if (!Auth::guard('admin')->check()) {
            return redirect()->route('home')->with('error', 'Please Login First');
        }
         if (Auth::guard('admin')->user()->role !== 'super_admin') {
            return redirect()->route('home')->with('error', 'You have no access to this page');
        }
        return $next($request);
    }
}
