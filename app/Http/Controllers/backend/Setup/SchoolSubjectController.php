<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    //

    public function ViewSchoolSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function AddSchoolSubject(){
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function StoreSchoolSubject(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $exam = new SchoolSubject();
        $exam->name = $request->name;
        $exam->save();

        $notifications = array(
            "message" => "Subject Successfully Added",
            "alert-type" => "success"
        );

        return redirect()->route('school.subject.view')->with($notifications);
    }


    public function EditSchoolSubject($id) {

     $subject = SchoolSubject::findorFail($id);
     return view('backend.setup.school_subject.edit_school_subject', compact('subject'));
    
    }


    public function UpdateSchoolSubject(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $subject = SchoolSubject::find($id);
        $subject->name = $request->name;
        $subject->update();

        $notifications = array(
            "message" => "Subject Successfully Updated",
            "alert-type" => "success"
        );

        return redirect()->route('school.subject.view')->with($notifications);


    }

    public function DeleteSchoolSubject($id){
        $subject = SchoolSubject::find($id)->delete();

        $notifications = array(
            "message" => "Subject Successfully Deleted",
            "alert-type" => "success"
        );

        return redirect()->route('school.subject.view')->with($notifications);


    }

}
