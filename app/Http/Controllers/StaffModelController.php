<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\StaffModel;

class StaffModelController extends Controller
{
    public function staffIndex(){
        $staff = StaffModel::latest()->get();
        $staffCount = StaffModel::count();
        $staffInfo =[
            'staff' =>  $staff,
            'noStaff' => $staffCount
        ];
       return view('StaffFolder.ManageStaff',compact('staffInfo'));
    }
    public function addStaff(Request $request){
     $validated = $request->validate([
    'userEmail' => 'required|email|unique:staff_models,userEmail'
    ]);
        $defaultPassword = '123456';
        $hashedPassword = Hash::make($defaultPassword);  // ✅ This is a string
        $staff = StaffModel::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'userEmail' => $request->userEmail,
            'userrole' => $request->userrole,
            'phone' => $request->phone,
            'password' => $hashedPassword
        ]);
        
        if ($staff) {
            return redirect()->route('staff-index')->with('success','Staff Added Successfully');
        }else{
            return redirect()->route('staff-index')->with('success','Samething went wrong');
        }
        
    }

    //===================delete staff===============
    public function deleteStaff(Request $request){
        $staffId= $request->staffId;
        if ($staffId) {
           $deletStaff = StaffModel::find($staffId)->delete();
           return response()->json([
            'message' => 'User Deleted Successfully'
        ]);

        }

        
    }

    // =====================Update Staff Data ===============

    public function updateStaffData(Request $request){
        $staff_id = $request->staff_id;
        if ($staff_id) {
            $updateStaff = StaffModel::find($staff_id)->update([
                  'fname' => $request->fname,
                  'lname' => $request->lname,
                  'userEmail' => $request->userEmail,
                  'userrole' => $request->userRole,
                  'phone' => $request->phone
            ]);
            return response()->json([
            'message' => 'Staff Data Updated Successfully'
        ]);
        }else{
            
        }

        
    }
}
