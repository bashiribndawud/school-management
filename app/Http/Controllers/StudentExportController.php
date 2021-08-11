<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentExport;
use App\Exports\MyStudentExport;
class StudentExportController extends Controller
{
    public function ExportStudent() {
        return Excel::download(new StudentExport, 'student.xlsx');
    }

    public function ExportMyStudent() {
        return Excel::download(new MyStudentExport, 'mystudent.xlsx');
    }
}
