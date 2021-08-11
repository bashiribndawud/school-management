<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;

class MonthlySalaryController extends Controller
{
    public function MonthlySalaryView() {
        return view('backend.employee.monthly_salary.view');
    }

    public function MonthlySalaryGet(Request $request) {

        $date = date('Y-m-d', strtotime($request->date)); 

        if ($date != '') {
            $where[] = ['date','like',$date.'%'];
        }
        
        $datas = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary for Month</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($datas as $key => $attend) {
            $totalAttend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->first();

            $absentCount = count($totalAttend->where('status', 'absent'));
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
 
            $salary = (float)$attend['user']['salary'];
            $salaryparday = (float)$salary/30;
            $totalsalaryminus = (float)$absentCount*(float)$salaryparday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;
            

            $html[$key]['tdsource'] .='<td>'.$totalsalary.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip", $attend->employee_id).'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);
    } //end method 

    public function MonthlySalaryPaySlip() {
        
    }
}
