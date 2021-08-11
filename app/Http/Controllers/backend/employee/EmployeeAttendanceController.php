<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use DB;
use PDF;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeAttendance;
use Auth;

class EmployeeAttendanceController extends Controller
{
    public function AttendanceView() {
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
        // $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC')->get();
        return view('backend.employee.employee_attandance.view_attandance', $data);
    }

    public function AttendanceAdd() {
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_attandance.add_attandance', $data);
    }

    public function AttendanceStore(Request $request) {

        $countemployeeid = count($request->employee_id);
        // dd($countemployeeid);
        for($i = 0;  $i < $countemployeeid; $i++) {
            $status = 'status'.$i;
            $attend = new EmployeeAttendance();
            $attend->employee_id = $request->employee_id[$i];
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->status = $request->$status;
            $attend->save();
        }

        $notification = array(
            "message" => "Employee Attendance data Created",
            "alert_type" => "success"
        );

        return redirect()->route('employee.attendance.view')->with($notification);
    }

    public function AttendanceEdit($date) {
        $data['employees'] = User::where('usertype', 'employee')->get();
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();

        return view('backend.employee.employee_attandance.edit_attandance', $data);

    }

    public function AttendanceUpdate(Request $request, $date){
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();

        $countemployeeid = count($request->employee_id);
        for($i =0; $i < $countemployeeid; $i++) {
            $status = 'status'.$i;
            $attend = new EmployeeAttendance();
            $attend->employee_id = $request->employee_id[$i];
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->status = $request->$status;
            $attend->save();



        }

        $notification = array(
            "message" => "Employee Attendance Updated",
            "alert_type" => "success"
        );

        return redirect()->route('employee.attendance.view')->with($notification);
    }

    public function AttendanceDetails($date) {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();

        return view('backend.employee.employee_attandance.details_attandance', $data);

    }
}
