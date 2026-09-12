<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\Depertmeant;
use App\Models\StaffModel;

>>>>>>> 5bd2a13 (Fixing bags)

class AdminController extends Controller
{
    public function adminIndex(){
<<<<<<< HEAD
        return view('AdminDashboard.AdminIndex');
=======
        $numberOfStaff= StaffModel::count();
        $adminDashboard = [
            'staff' => $numberOfStaff
        ];
        return view('AdminDashboard.AdminIndex' ,compact('adminDashboard'));
>>>>>>> 5bd2a13 (Fixing bags)
    }
}
