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
use DB;
use PDF;


class StudentRollController extends Controller
{
    public function RollView() {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.roll_generate.roll_view', $data);
    }
}
