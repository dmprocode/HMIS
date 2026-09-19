<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Log out from BOTH guards to be safe
        Auth::guard('admin')->logout();
        Auth::guard('web')->logout();

        // Invalidate session (kills session data)
        $request->session()->invalidate();

        // Regenerate CSRF token (prevents reuse)
        $request->session()->regenerateToken();

        // Optional: forget "remember me" cookies
        cookie()->forget('remember_admin_web');
        cookie()->forget('remember_web_' . sha1('App\Models\User'));

        // Redirect to home / login
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }
} 