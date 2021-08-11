<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function Add(){
        return view('backend.setup.designation.add_designation');
    }

    public function Store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "Designation Successfully Added",
            "alert-type" => "success"
        );

        return redirect()->route('designation.view')->with($notifications);
    }

    public function Edit($id){
        $Edit = Designation::findOrFail($id);
        return view('backend.setup.designation.edit_designation', compact('Edit'));
    }


    public function Update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $updateGroup = Designation::findOrFail($id);
        $updateGroup->name = $request->name;
        $updateGroup->save();

        $notifications = array(
            "message" => "Designation Successfully Updated",
            "alert-type" => "success"
        );

        return redirect()->route('designation.view')->with($notifications);
    }
}
