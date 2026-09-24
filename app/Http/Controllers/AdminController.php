<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;


class AdminController extends Controller
{
    public function adminIndex(){
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('home')->with('error', 'Please login first');
        }

        if ($admin->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You have no access to this page');
        }

        $adminDashboard = [
            'numOfUser' => Admin::count(),
             
        ];

        return view('AdminDashboard.AdminIndex', compact('adminDashboard'));
    
        
    }

  public function addUser(Request $request)
{
    $validated = $request->validate([
        'fname'        => 'required|string|min:2|max:50',
        'lname'        => 'required|string|min:2|max:50',
        'userEmail'    => 'required|email|unique:admins,username|max:100',
        'userImage'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'phone'        => 'required|string|regex:/^[0-9]{10,15}$/|unique:admins,phone',
        'gender'       => 'required',
        'user_status'  => 'required|in:active,inactive,suspended',
        'userrole'     => 'required|in:admin,doctor,receptionist,user',
    ]);

    $imagePath = null;

    if ($request->hasFile('userImage')) {
        $imagePath = $request->file('userImage')->store('users', 'public');
    }
    $password = Hash::make('password123');

    $admin = Admin::create([
        'fname' => $request->fname,
        'lname' => $request->lname,
        'username' => $request->userEmail,
        'userImage' => $imagePath,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'user_status' => $request->user_status,
        'role' => $request->userrole,
        'password' => $password,

    ]);
    return redirect()->route('user.index')->with('success', 'User added successfully!');

    

}

    public function userIndex(){
        $numOfUser = Admin::count();
        $adminData =  Admin::latest()->get();
        $adminComponents = [
            'numOfUser' => $numOfUser,
            'adminData' => $adminData,
        ] ;

        return view('AdminDashboard.AddUser',compact('adminComponents'));
    }

    public function deleteUser(Request $request){
       $userId = $request->userId;
        if ($userId) {
            $admin = Admin::find($userId)->delete();
            return response()->json([
                'message' => 'User Deleted Successfully'
            ]);
        }
    }
    public function updateUser(Request $request){
   

    {
        

       
        $admin = Admin::find($request->user_id);
        if ($admin) {
           
            $admin->update([
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'phone'     => $request->phone,
                'gender'    => $request->gender,
                'role'      => $request->role,
                'is_active' => $request->is_active,
            ]);
            return response()->json([
                'message' => 'User Upadted Suuccessfully'
            ]);
        }else{
            return 'Hello';
        }
        


            
        
    }
}


// =============================Profile======================

public function adminProfile(){
    $userProfile = Auth()->guard('admin')->user();
      
    return view('AdminDashboard.AdminProfile',compact('userProfile'));
}


public function UpdatePassword(Request $request)
{
    $request->validate([
        'current_password'     => 'required',
        'new_password'         => 'required|min:8',
        'confirm_new_password' => 'required|same:new_password',  // ✅ Matches new_password
    ], [
        'confirm_new_password.same' => 'The confirm password does not match the new password.',
    ]);

    // Now verify current password
    $admin = auth('admin')->user();

    if (!Hash::check($request->current_password, $admin->password)) {
        return back()->with('error', 'Current password is incorrect.');
    }

    // Update
    $admin->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('success', 'Password updated successfully!');
}
    

 


    public function superAdmin(){
        return  view('SuperAdminDashboard.dashboard');
    }
}
