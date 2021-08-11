<?php

namespace App\Http\Controllers;

use App\Models\AssignSubject;
use App\Models\StudentAttendance;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use PDF;
use Illuminate\Support\Facades\Hash;

class MyStudentController extends Controller
{
    public function ViewProfile() {
        $id = Auth::user()->id;
        $data['user'] = User::find($id);
        
        return view('student.mydata.view_profile', $data);
    }

    public function ViewPassword() {
        $id = Auth::user()->id;
        $data['user'] = User::find($id);

        return view('student.mydata.view_password', $data);
    }

    public function UpdatePassword(Request $request) {
        $valiadateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ],
            
        [
            'password.confirmed' => 'Password does not match'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else {
            return redirect()->back();
        }
        
    }

    public function StudentLogout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function ViewSubject() {
        $class_id = Auth::user()->class_id;
        $data['allData'] = AssignSubject::where('class_id', $class_id)->get();
        // dd($data['allData']->toArray());
        return view('student.myclass.view_subjects', $data);
    }

    public function ViewAttendance() {
        $user_id = Auth::user()->id;
        $data['allData'] = StudentAttendance::where('student_id', $user_id)->orderBy('id', 'ASC')->get();
        //dd($data['allData']->toArray());
        return view('student.myclass.view_attendance', $data);
    }

    public function MyDetailsAttendance($date) {
        $user_id = Auth::user()->id;
        $data['allData'] = StudentAttendance::where('date', $date)->where('student_id', $user_id)->get();
        //dd($data['details']->toArray()); 
        return view('student.myclass.view_attendance_detail', $data);
    }

    public function ViewMyResult() {
        $my_id = Auth::user()->id_no;
        $data['allData'] = StudentGrade::where('id_no', $my_id)->get();
        //dd($data['allData']->toArray());
        return view('student.myclass.view_result', $data);
    }

    public function ViewMyResultPdf(){

        // $my_id = Auth::user()->id_no;
        // $class_id = Auth::user()->class_id;
        // $data['allData'] = StudentGrade::where('id_no', $my_id)->where('class_id', $class_id)->get();
        // dd($data['allData']->toArray());
        // $pdf = PDF::loadView('student.myclass.view_result_pdf', $data);
        // $pdf->SetProtection(['copy', 'print'], '', 'pass');
        // return $pdf->stream('document.pdf');
        
    }
}
