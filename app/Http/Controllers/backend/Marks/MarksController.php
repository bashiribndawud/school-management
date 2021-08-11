<?php

namespace App\Http\Controllers\backend\Marks;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\StudentMark;
use App\Models\StudentYear;
use App\Models\ExamType;
use App\Models\SchoolSubject;
use App\Models\AssignSubject;
use App\Models\StudentMarks;


class MarksController extends Controller
{
    public function MarkAdd() {
        $user = Auth::user()->class_id;
        $data['years'] = StudentYear::all();
        $data['examtypes'] = ExamType::all();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        $data['assign_subject'] = AssignSubject::where('class_id', $user)->get();

        
        return view('teacher.mclass.mark_add', $data, compact('user'));
    }
}
