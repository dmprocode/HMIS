<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctorDashboard(){
        return view('DoctorDashboard.DoctorHome.doctorIndex');
    }

    public function doctorProfile(){
        return view('DoctorDashboard.DoctorHome.doctorProfile');
    }
}