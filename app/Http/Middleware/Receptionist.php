<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Receptionist
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
         if (auth()->check() && auth()->user()->userrole == 'receptionist') {
                return $next($request);

         }

         if (auth()->check()) {
          return redirect()->route('login')->with('error', 'You have no access to this page');
          }
    
    
        return redirect()->route('login');

    }
   
}
