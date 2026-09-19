<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        
        // 1. Check ADMIN guard
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            
            if ($admin->role === 'super_admin') {
                return redirect()->route('super-admin');
            }
            
            if ($admin->role === 'admin') {
                
                return redirect()->route('admin.index');
            }
            
            // Fallback for admin guard
            return redirect()->route('admin.index');
        }
        
        
        // 3. Not logged in → login page
        return redirect()->route('login');
    }
}