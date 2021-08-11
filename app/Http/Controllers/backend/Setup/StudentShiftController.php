<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.shift_view', $data); 
    }

    public function AddShift(){
        return view('backend.setup.shift.add_shift');
    }

    public function StoreShift(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ],
        [
            'name.required' => 'Name field is required'
        ]);

        $shiftData = new StudentShift();
        $shiftData->name = $request->name;
        $shiftData->save();

        $notification = array(
            "message" => "Student Shift Created",
            "alert_type" => "success"
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function EditShift($id){
        $findShift = StudentShift::findOrFail($id);
        return view('backend.setup.shift.edit_shift', compact('findShift'));
    }

    public function UpdateShift(Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ],
        [
            'name.required' => 'Name field is required'
        ]);

        $updateShift = StudentShift::findOrFail($id);
        $updateShift->name = $request->name;
        $updateShift->update();

        $notification = array(
            "message" => "Student Shift Updated",
            "alert_type" => "success"
        );

        return redirect()->route('student.view')->with($notification);


    }


    public function DeleteShift($id) {
        $deleteItem = StudentShift::findOrFail($id);
        $deleteItem->delete();

        $notification = array(
            "message" => "Student Shift Deleted",
            "alert_type" => "info"
        );

        return redirect()->route('student.view')->with($notification);

    }
}
