<?php

namespace App\Http\Controllers;

use App\Imports\StudentGradeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\StudentGrade;
use Validator;
use Auth;
class StudentGradeImportController extends Controller
{
    public function ImportGrade(Request $request) {
        // $validator = Validator::make($request->all(), [
        //     'file' => 'required|max:5000|mimes:xlsx,xls,cvs'
        // ]);

        $file = $request->file('file');
        $term = $request->term;
        // dd($term);
        // $fileName = date('Y-m-d').$file->getClientOriginalName();
        // $path = public_path('grade_upload/grades/');
        // $file->move($path, $fileName);
        
        Excel::import(new StudentGradeImport($term), $file);

        $notification = array(
            "message" => "File uploded successfully",
            "alert-type" => "success"
        );
        return redirect()->back()->with($notification);


    }

    public function ViewResult() {
        $class_id = Auth::user()->class_id;
        $data['allData'] = StudentGrade::where('class_id', $class_id)->get();

        //dd($data['allData']->toArray());
        return view('teacher.mclass.view_results', $data);
    }


}
