<?php

namespace App\Http\Controllers\backend\report;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\User;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function TeacherAttendanceReportView() {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('backend.report.teacher_attend_report', $data);
    }

    public function TeacherAttendanceReportGet(Request $request){

        $employee_id = $request->employee_id;
    	if ($employee_id != '') {
    		$where[] = ['employee_id',$employee_id];
    	}
    	$date = date('Y-m', strtotime($request->date));
    	if ($date != '') {
    		$where[] = ['date','like',$date.'%'];
    	}

        $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();
        // dd($singleAttendance);
        if ($singleAttendance == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
            //dd($data['allData']->toArray());
    
            $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('status','absent')->get()->count();
    
            $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('status','leave')->get()->count();
    
            $data['month'] = date('m-Y', strtotime($request->date));
    
        $pdf = PDF::loadView('backend.report.attend_report_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    
        }else{
            
            $notification = array(
                'message' => 'Sorry These Criteria Donse not match',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    

    }



}
