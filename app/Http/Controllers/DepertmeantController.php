<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepertmeantController extends Controller
{
    public function depertmeantIndex(){
        return view('Depertmeant.depertmeantIndex');
    }
}
