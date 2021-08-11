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
use DB;
use PDF;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use Auth;

class EmployeeSalaryController extends Controller
{
    public function SalaryView() {
        $data['allData'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function SalaryIncrement($id) {
        $data['editData'] = User::find($id);

        return view('backend.employee.employee_salary.employee_salary_increment', $data);
    }

    public function SalaryIncrementUpdate(Request $request, $id) {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salary_log = EmployeeSalaryLog::where('employee_id', $id)->first();
        $salary_log->employee_id = $id;
        $salary_log->previous_salary = $previous_salary;
        $salary_log->present_salary = $present_salary;
        $salary_log->increment_salary = $request->increment_salary;
        $salary_log->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $salary_log->save();

        $notification = array(
            "message" => "Employee Salary Updated",
            "alert_type" => "success"
        );

        return redirect()->route('employee.salary.view')->with($notification);

    }

    public function EmployeeSalaryDetail($id) {
        $details = User::find($id);
        $salary_logs = EmployeeSalaryLog::where('employee_id', $id)->get();
        // dd($salary_log->toArray());
        return view('backend.employee.employee_salary.employee_salary_details', compact('details', 'salary_logs'));
    }
}
