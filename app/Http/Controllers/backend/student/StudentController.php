<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\Disability;
use DB;
use PDF;

class StudentController extends Controller
{
    public function StudentRegView(){
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        

        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        // dd($data['year_id']->toArray());

        $data['allData'] = AssignStudent::where('year_id', $data['year_id']
        )->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.reg_student_view', $data);
    }

    public function StudentSearch(Request $request){
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();

        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        // dd($request->year_id);
        // search student where class_id AND year_id matches
        $data['allData'] = AssignStudent::where('class_id', $request->class_id)
            ->where('year_id', $request->year_id)->get();
            return view('backend.student.student_reg.reg_student_view', $data);
    }



    public function StudentRegAdd(){
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['disabilities'] = Disability::all();
        return view('backend.student.student_reg.reg_student_add', $data);
    }

    public function StudentRegStore(Request $request) {
        
        DB::transaction(function() use($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            if($student == NULL){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student+1;
                if($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'student';
            $user->role = 'student';
            $user->email = $request->email;
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->class_id = $request->class_id;
            $user->mobile = $request->mobile;
            $user->blood_group = $request->blood_group;
            $user->genotype = $request->genotype;
            $user->special_ability = $request->special_ability;
            $user->disability = $request->disability;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if($request->file('image')){
                $file = $request->file('image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/upload/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $assignStudent = new AssignStudent();
            // parse id of user table to student_id
            $assignStudent->student_id = $user->id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();


            $discount_student = new DiscountStudent();
            $discount_student->assign_students_id = $assignStudent->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            "message" => "Student Successfully Created",
            "alert_type" => "success"
        );

        return redirect()->route('student.reg.view')->with($notification);


    }

    public function StudentRegEdit($student_id){
        $data['editData'] = AssignStudent::where('student_id', $student_id)->with(['user', 'discount'])->first();
        // dd($data['editData']->toArray());
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['disabilities'] = Disability::all();
        return view('backend.student.student_reg.reg_student_edit', $data);

    }

    public function StudentRegUpdate(Request $request, $student_id){

        DB::transaction(function() use($request, $student_id) {
            
            $user = User::where('id', $student_id)->first();
            $user->blood_group = $request->blood_group;
            $user->special_ability = $request->special_ability;
            $user->genotype = $request->genotype;
            $user->disability = $request->disability;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if($request->file('image')){
                $file = $request->file('image');
                // delete existing image
                @unlink(public_path('upload/student_images/'.$user->image));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/upload/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $assignStudent = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            
            $discount_student =DiscountStudent::where('assign_students_id', $request->id)->first();
            
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            "message" => "Student Registration Updated Successfully",
            "alert_type" => "success"
        );

        return redirect()->route('student.reg.view')->with($notification);




    }

    public function StudentPromote($student_id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::where('student_id', $student_id)->first();

        return view('backend.student.student_reg.student_promote', $data);

    }

    public function StudentPromoteUpdate(Request $request, $student_id){
        DB::transaction(function() use($request, $student_id) {

            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if($request->file('image')){
                $file = $request->file('image');
                // delete existing image
                @unlink(public_path('upload/student_images/'.$user->image));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('/upload/student_images'), $fileName);
                $user->image = $fileName;
            }
            $user->save();

            $assignStudent = new AssignStudent();
            $assignStudent->student_id = $student_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->group_id = $request->group_id;
            $assignStudent->shift_id = $request->shift_id;
            $assignStudent->save();

            
            $discount_student = new DiscountStudent();
            $discount_student->assign_students_id = $assignStudent->id;
            $discount_student->fee_category_id = '1'; 
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            "message" => "Student Promoted successfully",
            "alert-type" => "info"
        );

        return redirect()->route('student.reg.view')->with($notification);


    }

    public function StudentPromoteDetail($student_id){
        $data['details'] = AssignStudent::where('student_id', $student_id)->with(['user', 'discount'])->first();
        // dd($data['viewDetail']->toArray());
        $pdf = PDF::loadView('backend.student.student_reg.student_detail_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    

    



}
