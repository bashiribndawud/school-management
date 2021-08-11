<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use Auth;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentAttendance;
use PDF;

class ManageStudentController extends Controller
{
    public function ViewStudent() {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $id = Auth::user()->class_id;
        $data['allData'] = AssignStudent::where('class_id', $id)->get();
        // dd($data['allData']->toArray());
        return view('teacher.student.student_view', $data);
    }

    public function ViewClassSubject() {
        $id = Auth::user()->class_id;
        $data['allData'] = AssignSubject::where('class_id', $id)->get();
        //  dd($data['allData']->toArray());
        return view('teacher.mclass.view_subject', $data);
    }

    public function ViewClassAttendance() {
        $data['allData'] = StudentAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
         //dd($data['allData']->toArray());
        return view('teacher.mclass.view_attendance', $data);
    }

    public function AddClassAttendance() {
        $id = Auth::user()->class_id;
        $data['allData'] = User::where('class_id', $id)->where('usertype', 'student')->get();

        return view('teacher.mclass.add_attendance', $data);
    }

    public function StoreClassAttendance(Request $request) {
        $countstudent = count($request->student_id);
        // dd($request->all());
        // dd($countstudent);
        for($i = 0; $i < $countstudent; $i++) {
            $status = 'status'.$i;
            $attend = new StudentAttendance();
            $attend->student_id = $request->student_id[$i];
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->status = $request->$status;
            $attend->save();
        }

        $notification = array(
            "message" => "Student Attendance data Created",
            "alert_type" => "success"
        );

        return redirect()->route('teacher.class.attendance.view')->with($notification);
    }

    public function EditClassAttendance($date) {
        $data['editData'] = StudentAttendance::where('date', $date)->get();
        // dd($data['allData']->toArray());
        return view('teacher.mclass.edit_attendance', $data);
    }

    public function UpdateClassAttendance(Request $request, $date) {
        StudentAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $countstudent = count($request->student_id);
        for($i =0; $i < $countstudent; $i++) {
            $status = 'status'.$i;
            $attendupdate = new StudentAttendance();
            $attendupdate->student_id = $request->student_id[$i];
            $attendupdate->date = date('Y-m-d', strtotime($request->date));
            $attendupdate->status = $request->$status;
            $attendupdate->save();
        }

        $notification = array(
            "message" => "Student Attendance updated successfully",
            "alert-type" => "success"
        );

        return redirect()->route('teacher.class.attendance.view')->with($notification);
        
    }

    public function DetailClassAttendance($date) {
        $data['present'] = StudentAttendance::where('date', $date)->where('status', 'present')->get();
        $data['absent'] = StudentAttendance::where('date', $date)->where('status', 'absent')->get();
        $data['allData'] = StudentAttendance::where('date', $date)->get();

        return view('teacher.mclass.detail_attendance', $data);
    }

    public function DetailClassAttendancepPDF($date) {
        $id = Auth::user()->class_id;
        $data['class'] = StudentClass::where('id', $id)->first('name');
        $data['details'] = StudentAttendance::where('date', $date)->with(['user'])->get();
        dd($data['details']->toArray());
        $pdf = PDF::loadView('teacher.mclass.detail_attendance_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
       
    }
}
