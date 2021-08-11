<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function AddExamType(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function StoreExamType(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $exam = new ExamType();
        $exam->name = $request->name;
        $exam->save();

        $notifications = array(
            "message" => "Exam Type Successfully Added",
            "alert-type" => "success"
        );

        return redirect()->route('exam.type.view')->with($notifications);
    }


    public function EditExamType($id) {
        $exam = ExamType::findorFail($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('exam'));

    }

    public function UpdateExamType(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ],
        [
            'name.required' => 'Field is required'
        ]);

        $exam = ExamType::find($id);
        $exam->name = $request->name;
        $exam->update();

        $notifications = array(
            "message" => "Exam Type Successfully Updated",
            "alert-type" => "success"
        );

        return redirect()->route('exam.type.view')->with($notifications);

    }

    public function DeleteExamType($id){
        $exam = ExamType::find($id);
        $exam->delete();

        $notifications = array(
            "message" => "Exam Type Successfully Deleted",
            "alert-type" => "success"
        );

        return redirect()->route('exam.type.view')->with($notifications);

    }
}
