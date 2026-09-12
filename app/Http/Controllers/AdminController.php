<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======

>>>>>>> temp-branch
use App\Models\Depertmeant;
use App\Models\StaffModel;


class AdminController extends Controller
{
    public function adminIndex(){
        $numberOfStaff= StaffModel::count();
        $adminDashboard = [
            'staff' => $numberOfStaff
        ];
        return view('AdminDashboard.AdminIndex' ,compact('adminDashboard'));
    }
<<<<<<< HEAD
=======

    public function superAdmin(){
        return view('AdminDashboard.SuperAdmin.dashboard');
    }
>>>>>>> temp-branch
}
