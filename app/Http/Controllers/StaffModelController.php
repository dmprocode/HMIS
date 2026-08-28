<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffModelController extends Controller
{
    public function staffIndex(){
    return view('StaffFolder.ManageStaff');
    }
}
