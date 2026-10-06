<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Doctor
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


        if (!Auth::guard('admin')->check()) {
            return redirect()->route('home')->with('error','Please Login First');
        }

        if (Auth::guard('admin')->user()->role !== 'doctor') {
            return redirect()->route('home')->with('error','You Have No Access This This Page');

        }
        
        
        
        
        return $next($request);
    }
}
