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
use Auth;


class EmployeeLeaveController extends Controller
{
    public function LeaveView() {
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc')->get();
         //dd($data['allData']->toArray());
        return view('backend.employee.employee_leave.leave_view', $data);
    }

    public function LeaveAdd() {
        $data['employees'] = User::where('usertype', 'employee')->where('role', 'teacher')->get();
        $data['leaves'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.leave_add', $data);
    }

    public function LeaveStore(Request $request) {
       
        if($request->leave_purposes_id === '0') {
            $leave = new LeavePurpose();
            $leave->name = $request->name;
            $leave->save();
            $leaveid = $leave->id;
        }else {
            $leaveid = $request->leave_purposes_id;
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purposes_id = $leaveid;
        $data->leave_start_date = date('Y-m-d' ,strtotime($request->leave_start_date));
        $data->leave_end_date = date('Y-m-d' ,strtotime($request->leave_end_date));
        $data->save();
        
        $notification = array(
            "message" => "Employee Leave Data Inserted Succcessfully",
            "alert-type" => "success"
        );

        return redirect()->route('employee.leave.view')->with($notification);

    }

    public function LeaveEdit($id) {
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype', 'employee')->get();
        $data['leaves'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.leave_edit', $data);
    }

    public function LeaveUpdate(Request $request, $id) {
        if($request->leave_purposes_id === '0') {
            $leave = new LeavePurpose();
            $leave->name = $request->name;
            $leave->save();
            $leaveid = $leave->id;
        } else {
            $leaveid = $request->leave_purposes_id;
        }

        $editLeave = EmployeeLeave::find($id);
        $editLeave->employee_id = $request->employee_id;
        $editLeave->leave_purposes_id = $leaveid;
        $editLeave->leave_start_date = date('Y-m-d', strtotime($request->leave_start_date));
        $editLeave->leave_end_date = date('Y-m-d', strtotime($request->leave_end_date));
        $editLeave->update();

        $notification = array(
            "message" => "Employee Leave Data Updated Succcessfully",
            "alert-type" => "success"
        );

        return redirect()->route('employee.leave.view')->with($notification);
    }

    public function LeaveDelete($id) {
        $delete = EmployeeLeave::findOrFail($id);
        $delete->delete();

        $notification = array(
            "message" => "Employee Leave Data Delected Succcessfully",
            "alert-type" => "info"
        );

        return redirect()->route('employee.leave.view')->with($notification);

    }
}
