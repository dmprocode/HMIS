<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function doctorDashboard(){
        return view('DoctorDashboard.DoctorHome.doctorIndex');
    }

    public function doctorProfile(){
      $adminId = Auth()->guard('admin')->user()->id;
        $doctor = Doctor::where('user_id', $adminId)->with('admin')->first();

    if (!$adminId) {
        return redirect()->route('login')->with('error', 'Please login first');
    }
        return view('DoctorDashboard.DoctorHome.doctorProfile',compact('doctor'));
    }
}