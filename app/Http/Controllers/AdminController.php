<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depertmeant;
use App\Models\StaffModel;
use Illuminate\Support\Facades\Auth;



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
            'numberOfStaff' => StaffModel::count(),
            'admin'         => $admin,   
        ];

        return view('AdminDashboard.AdminIndex', compact('adminDashboard'));
    
        
    }

    public function userIndex(){
        return view('AdminDashboard.AddUser');
    }

    public function superAdmin(){
        return  view('SuperAdminDashboard.dashboard');
    }
}
