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
    // 1. Validate
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $username = $request->input('email');
    $password = $request->input('password');

    // 2. Find admin by email
    $admin = Admin::where('username', $username)->first();

    // 3. Check if admin exists
    if (!$admin) {
        return back()->with('error', 'No account found with this email.');
    }

    // 4. Check password
    if (!Hash::check($password, $admin->password)) {
        return back()->with('error', 'Incorrect email or password.');
    }

    // 5. Login using admin guard
    Auth::guard('admin')->login($admin, $request->boolean('remember'));

    // 6. Regenerate session
    $request->session()->regenerate();

    // 7. Redirect based on role
    if ($admin->role === 'admin') {
        return redirect()->route('admin-dashboard')
            ->with('success', 'Welcome, ' . $admin->fname);
    }

    return redirect()->route('home')->with('success', 'Login successful!');
}
    
}
