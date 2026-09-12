<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function superAdmin(){
        return view('AdminDashboard.SuperAdmin.dashboard');
    }
}
