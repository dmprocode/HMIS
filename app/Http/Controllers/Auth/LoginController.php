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
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $username = $request->input('email');
    $password = $request->input('password');

    $admin = Admin::where('username', $username)->first();

    if (!$admin) {
        return back()->with('error', 'No account found with this email.');
    }

    if (!Hash::check($password, $admin->password)) {
        return back()->with('error', 'Incorrect email or password.');
    }

    Auth::guard('admin')->login($admin, $request->boolean('remember'));

    $request->session()->regenerate();

   
    if ($admin->role === 'super_admin') {
       return redirect()->route('super-admin')->with('success','welcame');
    }
    if ($admin->role === 'admin') {
       return redirect()->route('admin-dashboard')->with('success','welcame');
    }

    

    return redirect()->route('home')->with('success', 'Login successful!');


  
        


        }
    
}