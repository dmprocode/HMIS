<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;




class NurseController extends Controller
{
    public function dashboard(){
        return view('NurseDashboard.NurseHome.Index');
    }

    public function patentsIndex(){
        return view('NurseDashboard.NurseHome.patient');
    }


    public function addPatients(Request $request){
        $validated = $request->validate([
            'first_name'         => 'required|string|min:2|max:50',
            'last_name'          => 'required|string|min:2|max:50',
            'date_of_birth'      => 'nullable|date|before:today',
            'gender'             => 'required|in:male,female,other',
            'phone'              => 'required|string|regex:/^[0-9]{10,15}$/|unique:patients,phone',
            'address'            => 'nullable|string|max:500',
            'blood_group'        => 'nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'allergies'          => 'nullable|string|max:1000',
            'next_of_kin_phone'  => 'nullable|string|regex:/^[0-9]{10,15}$/',
            'status'             => 'required|in:active,inactive,deceased',
        ]);


       
        $validated['registered_by'] = auth('admin')->id();

       $patient = Patients::create([
            'first_name'         => $validated['first_name'],
            'last_name'          => $validated['last_name'],
            'date_of_birth'      => $validated['date_of_birth'] ?? null,
            'gender'             => $validated['gender'],
            'phone'              => $validated['phone'],
            'address'            => $validated['address'] ?? null,
            'blood_group'        => $validated['blood_group'] ?? null,
            'allergies'          => $validated['allergies'] ?? null,
            'next_of_kin_phone'  => $validated['next_of_kin_phone'] ?? null,
            'status'             => $validated['status'],
            'registered_by'      => auth('admin')->id(),
        ]);

        

        return redirect()->route('patents.index')
            ->with('success', 'Patient registered successfully!');
    

    
    }
}
