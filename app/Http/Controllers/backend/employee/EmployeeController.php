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
use App\Models\Disability;
use App\Models\EmployeeSalaryLog;
use Auth;


class EmployeeController extends Controller
{
    public function EmplyeeRegView() {
        $data['allData'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_view', $data);
    }

    public function EmplyeeRegAdd() {
        $data['classes'] = StudentClass::all();
        $data['designations'] = Designation::all();
        $data['disabilities'] = Disability::all();
        return view('backend.employee.employee_add', $data);
    }

    public function EmplyeeRegStore(Request $request) {
        DB::transaction(function() use($request) {
            $checkDate = date('Ym', strtotime($request->join_date));
            // dd($checkDate);
            $employee = User::where('usertype', 'employee')->orderBy('id', 'desc')->first();

            if($employee == NULL){
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }else {
                $employee = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee+1;
                if($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }

            $final_id_no = $checkDate.$id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->role = 'teacher';
            $user->class_id = $request->class_id;
            $user->email = $request->email;
            $user->qualification = $request->qualification;
            $user->discipline = $request->discipline;
            $user->blood_group = $request->blood_group;
            $user->genotype = $request->genotype;
            $user->disability = $request->disability;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->address = $request->address;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->designation_id = $request->designation_id;
            $user->salary = $request->salary;
            $user->join_date = date('Y-m-d', strtotime( $request->join_date));

            if($request->file('image')){
                $file = $request->file('image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images/'), $fileName);
                $user->image = $fileName;

            }
            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();


        });
        $notification = array(
            "message" => "Employee Successfully Created",
            "alert_type" => "success"
        );

        return redirect()->route('employee.reg.view')->with($notification);


    }

    public function EmplyeeRegEdit($id){
        $data['editData'] = User::find($id);
        $data['designations'] = Designation::all();

        return view('backend.employee.employee_edit', $data);
    }

    public function EmplyeeRegUpdate(Request $request, $id) {
        
        $user = User::findOrFail($id);
        $user->qualification = $request->qualification;
        $user->discipline = $request->discipline;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->designation_id = $request->designation_id;
        $user->salary = $request->salary;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/', $user->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images/'), $fileName);
            $user->image = $fileName;
        }
        $user->save();

        $notification = array(
            "message" => "Employee Data Updated Successfully",
            "alert-type" => "success"
        );

        return redirect()->route('employee.reg.view')->with($notification);
    }

    public function EmplyeeRegDetail($id) {
        $details = User::find($id);
        $pdf = PDF::loadView('backend.employee.employee_detail_pdf', compact('details'));
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }


}
