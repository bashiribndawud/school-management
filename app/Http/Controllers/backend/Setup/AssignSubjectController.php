<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\SchoolSubject;
use App\Models\StudentGroup;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView() {

        // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject', $data);

    }

    public function AddAssignSubject() {
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_subject.add_assign_subject', $data);

    }

    public function StoreAssignSubject(Request $request) {
        // $subjectCount = count($request->subject_id);
        // dd($subjectCount);
        if($request->subject_id != NULL) {
            for($i = 0; $i < count($request->subject_id); $i++) {
                $assign = new AssignSubject();
                $assign->class_id = $request->class_id;
                $assign->subject_id = $request->subject_id[$i];
                $assign->full_mark = $request->full_mark[$i];
                $assign->pass_mark = $request->pass_mark[$i];
                $assign->subjective_mark = $request->subjective_mark[$i];
                $assign->save();

            }
        } else {
            $notifications = array(
                "message" => "Please Select subject and marks",
                "alert-type" => "error"
            );
    
            return redirect()->route('assign.subject.add')->with($notifications);
        }

        $notifications = array(
            "message" => "Subject Assigned Successfully",
            "alert-type" => "success"
        );

        return redirect()->route('assign.subject.view')->with($notifications);


    }

        public function EditAssignSubject($class_id){
            $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('class_id', 'asc')->get();
            // dd($data['editData']->toArray());
            $data['classes'] = StudentClass::all();
            $data['subjects'] = SchoolSubject::all();
            return view('backend.setup.assign_subject.edit_assign_subject', $data);
        }

        public function UpdateAssignSubject(Request $request, $class_id){
           if($request->subject_id == NULL) {
               $notifications = array(
                   "message" => "Sorry Please select a subject",
                   "alert-type" => "error"
               );

               return redirect()->route('edit.assign.subject', $class_id)->with($notifications);
           }else {
               AssignSubject::where('class_id', $class_id)->delete();
               for($i = 0; $i < count($request->subject_id); $i++){
                   $assignSubject = new AssignSubject();
                   $assignSubject->class_id = $request->class_id;
                   $assignSubject->subject_id = $request->subject_id[$i];
                   $assignSubject->full_mark = $request->full_mark[$i];
                   $assignSubject->pass_mark= $request->pass_mark[$i];
                   $assignSubject->subjective_mark= $request->subjective_mark[$i];
                   $assignSubject->save();

               }
           }

           $notifications = array(
            "message" => "Assigned Subject successfully updated",
            "alert-type" => "success"
        );

        return redirect()->route('assign.subject.view')->with($notifications);


        }

    public function DetailAssignSubject($class_id) {
        $data['detailDatas'] = AssignSubject::where('class_id', $class_id)->orderBy('class_id', 'asc')->get();
        // dd( $data['detailDatas']->toArray());
        return view('backend.setup.assign_subject.detail_assign_subject', $data);
    }

    public function Delete($class_id) {
        $delete = AssignSubject::where('class_id', $class_id);
        $delete->delete();
        // dd($delete['allRows']->toArray());
        $notifications = array(
            "message" => "Assigned Subject successfully deleted",
            "alert-type" => "success"
        );

        return redirect()->route('assign.subject.view')->with($notifications);
    }



}
