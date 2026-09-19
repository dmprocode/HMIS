<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller

{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    
    public function login(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $username = $request->input('email');
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        // 2. Find admin by username (or change to 'email' column)
        $admin = Admin::where('username', $username)->first();

        if (!$admin) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'No account found with this username.');
        }

        // 3. Check password — FIXED (removed the ! inversion)
        if (!Hash::check($password, $admin->password)) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Incorrect Username or Password.');
        }

        // 4. Optional: check if account is active
        if (isset($admin->status) && $admin->status !== 'active') {
            return back()->with('error', 'Your account is not active.');
        }

        // 5. Login using admin guard
        Auth::guard('admin')->login($admin, $remember);
        $request->session()->regenerate();

        // 6. Redirect based on role
        switch ($admin->role) {
             case 'super_admin':
                return redirect()->route('super-admin')
                    ->with('success', 'Welcome, ' . $admin->fname);

            case 'admin':
                return redirect()->route('admin.index')
                    ->with('success', 'Welcome, ' . $admin->fname);

            case 'moderator':
                return redirect()->route('admin.moderator.dashboard')
                    ->with('success', 'Welcome, ' . $admin->fname);

            default:
                // Unknown role → logout and reject
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->with('error', 'You do not have permission to access this area.');
        }
    }


    
}
