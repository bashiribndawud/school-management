<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }


    public function AddGroup(){
        return view('backend.setup.group.add_group');
    }

    public function StoreGroup(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notifications = array(
            "message" => "Student Group Successfully Added",
            "alert-type" => "info"
        );

        return redirect()->route('student.group.view')->with($notifications);
    }

    public function EditGroup($id){
        $groupEdit = StudentGroup::findOrFail($id);
        return view('backend.setup.group.edit_group', compact('groupEdit'));

    }

    public function UpdateGroup(Request $request, $id) {
  
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $updateGroup = StudentGroup::findOrFail($id);
        $updateGroup->name = $request->name;
        $updateGroup->save();

        $notifications = array(
            "message" => "Student Group Successfully Updated",
            "alert-type" => "success"
        );

        return redirect()->route('student.group.view')->with($notifications);

    }


    public function DeleteGroup($id){
        $delete = StudentGroup::findOrFail($id);
        $delete->delete();

        $notifications = array(
            "message" => "Student Group Successfully Deleted",
            "alert-type" => "success"
        );

        return redirect()->route('student.group.view')->with($notifications);
    }



}
