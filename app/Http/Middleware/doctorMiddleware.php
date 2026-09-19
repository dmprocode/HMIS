<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class doctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   // app/Http/Middleware/IsDoctor.php

public function handle($request, $next)
{
    if (auth()->check() && auth()->user()->userrole === 'doctor') {
        return $next($request); 
    }
    
    if (auth()->check()) {
        return redirect()->route('login')->with('error', 'You have no access to this page');
    }
    
    return redirect()->route('login');
}
}
