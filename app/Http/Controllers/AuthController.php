<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StaffModel;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    public function loginIndex(){
        return view('loginPages.loginIndex');
    }

    public function LoginData(Request $request){
        $validated = $request->validate([
           'emailaddress' => 'required|email',
           'password' =>  'required|min:6|max:10',
        ]);
        $staff = StaffModel::where('userEmail', $validated['emailaddress'])->first();

   if ($staff) {

    if (Hash::check($request->password, $staff->password)) {

        $request->session()->put('loginID', $staff->id);
        $request->session()->put('userRole', $staff->userrole);

        if ($staff->userrole === 'admin') {

            return redirect()
                ->route('admin-dashboard')
                ->with('success', 'Welcome to your Dashboard, ' . $staff->fname . '!');

        } else {

            return redirect()
                ->route('login')
                ->with('fail', 'You are not authorized to access the admin dashboard.');

        }

    } else {

        return redirect()
            ->route('login')
            ->with('fail', 'Invalid email or password.');

    }

} else {

    return redirect()
        ->route('login')
        ->with('fail', 'Invalid email or password.');

}
    }

    
}

class AuthController extends Controller
{
    
}

