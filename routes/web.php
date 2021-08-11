<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\Account\StudentFeeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\FeeCategoryController;
use App\Http\Controllers\backend\Setup\FeeAmountCategoryController;
use App\Http\Controllers\backend\Setup\ExamTypeController;
use App\Http\Controllers\backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\AssignSubjectController;
use App\Http\Controllers\backend\Setup\DesignationController;
// student controller
use App\Http\Controllers\backend\student\StudentController;
use App\Http\Controllers\backend\student\StudentRollController;
// Export student
use App\Http\Controllers\StudentExportController;

// Registartion fee controller
use App\Http\Controllers\backend\student\RegistrationFeeController;


// employye reg controller
use App\Http\Controllers\backend\employee\EmployeeController;
use App\Http\Controllers\backend\employee\EmployeeSalaryController;
use App\Http\Controllers\backend\employee\EmployeeLeaveController ;
use App\Http\Controllers\backend\employee\EmployeeAttendanceController ;
use App\Http\Controllers\backend\employee\MonthlySalaryController ;

// Marks Controller
use App\Http\Controllers\backend\Marks\MarksController;
use App\Http\Controllers\backend\DefaultController;

// Teacher Controller methods
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\Teacher\ManageStudentController;

//student controller
use App\Http\Controllers\MyStudentController;
use App\Http\Controllers\StudentGradeImportController;
use App\Http\Controllers\backend\report\ReportController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');



Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// user management all routes

// Route::middleware(['auth'])->group(function () {

// });
Route::any('/register', function() {
    return redirect('/login');
});

Route::group(['middleware' => 'auth', 'middleware' => 'adminrole'], function() {

    Route::prefix('users')->group(function (){

        Route::get('/view/all', [UserController::class, 'Userview'])->name('user.view');
        Route::get('/add', [UserController::class, 'UserAdd'])->name('add.user');
        Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    
    
    });

    Route::prefix('profile')->group(function () {
    
        Route::get('/view', [ProfileController::class, 'ViewProfile'])->name('profile.view');
        Route::get('/edit/{id}', [ProfileController::class, 'EditProfile'])->name('edit.profile');
        Route::get('/edit/{id}', [ProfileController::class, 'EditProfile'])->name('edit.profile');
        Route::post('/update', [ProfileController::class, 'UpdateProfile'])->name('profile.update');
        Route::get('/password-view', [ProfileController::class, 'PasswordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    
    });


    
// Student Class route -- Setup Route
Route::prefix('setup')->group(function (){

    Route::get('/student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class, 'AddStudent'])->name('add.class');
    Route::post('/student/class/store', [StudentClassController::class, 'StoreClass'])->name('store.student.class');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'EditClass'])->name('class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'UpdateClass'])->name('update.student.class');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'DeleteClass'])->name('class.delete');

    // Manage student Year
    Route::get('/student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class, 'StoreYear'])->name('store.student.year');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'EditYear'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'UpdateYear'])->name('update.student.year');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'DeleteYear'])->name('student.year.delete');


    // student group routes
    Route::get('/student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class, 'StoreGroup'])->name('store.student.group');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'EditGroup'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'UpdateGroup'])->name('update.student.group');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'DeleteGroup'])->name('student.group.delete');

    // manage student shift

    Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');
    Route::post('student/shift/store', [StudentShiftController::class, 'StoreShift'])->name('store.student.shift');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'EditShift'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'UpdateShift'])->name('update.student.shift');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'DeleteShift'])->name('student.shift.delete');

    // Manage student Fee

    Route::get('/student/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('student.fee.view');
    Route::get('/student/Add', [FeeCategoryController::class, 'AddFeeCategory'])->name('add.fee.category');
    Route::post('/student/Store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee.category');
    Route::get('/student/edit/{id}', [FeeCategoryController::class, 'EditFeeCategory'])->name('fee.category.edit');
    Route::post('/student/update/{id}', [FeeCategoryController::class, 'UpdateFeeCategory'])->name('update.fee.category');
    Route::get('/student/delete/{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('fee.category.delete');

   
//    Student Fee Amount Routes
    Route::get('/fee/amount/view', [FeeAmountCategoryController::class, 'FeeAmountView'])->name('student.fee_amount.view');
    Route::get('/fee/amount/add', [FeeAmountCategoryController::class, 'AddFeeAmount'])->name('add.fee.amount');
    Route::post('/fee/amount/store', [FeeAmountCategoryController::class, 'StoreFeeAmount'])->name('store.fee.amount');
    Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountCategoryController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountCategoryController::class, 'UpdateFeeAmount'])->name('update.fee.amount');
    Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountCategoryController::class, 'GetDetails'])->name('fee.amount.details');


    // Exam Route
    Route::get('/exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');
    Route::get('/exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
    Route::post('/exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('store.exam.type');
    Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
    Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('exam.type.update');
    Route::get('/exam/type/update/{id}', [ExamTypeController::class, 'DeleteExamType'])->name('exam.type.delete');


    // School subject Routes
    Route::get('/view/school/subject', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
    Route::get('/add/school/subject', [SchoolSubjectController::class, 'AddSchoolSubject'])->name('add.subject');
    Route::post('/store/school/subject', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('store.school.subject');
    Route::get('/edit/school/subject/{id}', [SchoolSubjectController::class, 'EditSchoolSubject'])->name('subject.edit');
    Route::post('/update/school/subject/{id}', [SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('update.school.subject');
    Route::get('/delete/school/subject/{id}', [SchoolSubjectController::class, 'DeleteSchoolSubject'])->name('subject.delete');


    // Assign Subject Routes
    Route::get('/assign/subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');
    Route::get('/add/assign/subject', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
    Route::post('/store/assign/subject', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');
    Route::get('/edit/assign/subject/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('edit.assign.subject');
    Route::post('/update/assign/subject/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
    Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailAssignSubject'])->name('details.assign.subject');
    Route::get('/delete/assign/subject/{class_id}', [AssignSubjectController::class, 'Delete'])->name('delete.assign.subject');


    // Designation Route
    Route::get('/designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');
    Route::get('/designation/Add', [DesignationController::class, 'Add'])->name('add.designation');
    Route::post('/designation/Store', [DesignationController::class, 'Store'])->name('store.designation');
    Route::get('/edit/{id}', [DesignationController::class, 'Edit'])->name('edit');
    Route::post('/update/{id}', [DesignationController::class, 'Update'])->name('update.dasignation');
    Route::get('/student/delete/{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('delete');

});
// End of Setup Route


        // student registration route
Route::prefix('student')->group(function (){
    Route::get('/registration/view', [StudentController::class, 'StudentRegView'])->name('student.reg.view');
    Route::get('/registration/add', [StudentController::class, 'StudentRegAdd'])->name('student.reg.add');
    Route::post('/registration/store', [StudentController::class, 'StudentRegStore'])->name('store.student.reg');
    // search route
    Route::get('/student/year/class/search', [StudentController::class, 'StudentSearch'])->name('student.year.class.search');
    Route::get('/student/registration/edit/{student_id}', [StudentController::class, 'StudentRegEdit'])->name('student.registration.edit');
    Route::post('/student/registration/update/{student_id}', [StudentController::class, 'StudentRegUpdate'])->name('update.student.reg');
    Route::get('/student/promote/{student_id}', [StudentController::class, 'StudentPromote'])->name('student.promote');
    Route::post('/student/promote/update/{student_id}', [StudentController::class, 'StudentPromoteUpdate'])->name('promote.student.reg');
    Route::get('/student/promote/detail/{student_id}', [StudentController::class, 'StudentPromoteDetail'])->name('student.promote.detail');
    // Export Student Routes
    Route::get('/export_excel', [StudentExportController::class, 'ExportStudent'])->name('student.reg.export');

    // Student roll generate routes
    Route::get('/roll/generate/view', [StudentRollController::class, 'RollView'])->name('roll.generate.view');



    // Registration Fee route
    Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');



   
});

        
// Enployee Route
Route::prefix('employees')->group(function() {

    Route::get('employee/reg/view', [EmployeeController::class, 'EmplyeeRegView'])->name('employee.reg.view');
    Route::get('employee/reg/add', [EmployeeController::class, 'EmplyeeRegAdd'])->name('add.employee');
    Route::post('employee/reg/store', [EmployeeController::class, 'EmplyeeRegStore'])->name('store.employee.reg');
    Route::get('employee/reg/edit/{id}', [EmployeeController::class, 'EmplyeeRegEdit'])->name('employee.reg.edit');
    Route::post('employee/reg/update/{id}', [EmployeeController::class, 'EmplyeeRegUpdate'])->name('update.employee.reg');
    Route::get('employee/reg/detail/{id}', [EmployeeController::class, 'EmplyeeRegDetail'])->name('employee.reg.details');

    // Employee salary  management
    Route::get('employee/salary/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
    Route::get('employee/salary/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
    Route::post('employee/update/salary/increment/{id}', [EmployeeSalaryController::class, 'SalaryIncrementUpdate'])->name('update.salary.increment');
    Route::get('employee/salary/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetail'])->name('employee.salary.details');

    // Employee Leave Route
    Route::get('employee/leave/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
    Route::get('employee/leave/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('add.leave');
    Route::post('employee/leave/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');
    Route::get('employee/leave/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('edit.employee.leave');
    Route::post('employee/leave/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
    Route::get('employee/leave/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('delete.employee.leave');

    // Employee Attenadance Route
    Route::get('employee/attendance/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
    Route::get('employee/attendance/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('add.attendance');
    Route::post('employee/attendance/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attandance');
    Route::get('employee/attendance/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attend.edit');
    Route::post('employee/attendance/update/{date}', [EmployeeAttendanceController::class, 'AttendanceUpdate'])->name('update.employee.attandance');
    Route::get('employee/attendance/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attend.detail');

    // Monthly Salary Routes
    Route::get('employee/monthly_salary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('montly.salary.view');
    Route::get('employee/monthly_salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
    Route::get('employee/monthly_salary/pay_slip', [MonthlySalaryController::class, 'MonthlySalaryPaySlip'])->name('employee.monthly.salary.payslip');

});


        Route::prefix('marks')->group(function() {

            Route::get('mark/entry/add', [MarksController::class, 'MarkAdd'])->name('mark.entry.add');
        });
        Route::get('mark/subjectget', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
        



        Route::prefix('accounts')->group(function() {
            Route::get('student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
        });

        Route::prefix('report')->group(function() {
            Route::get('teacher/attendance/report/view', [ReportController::class, 'TeacherAttendanceReportView'])->name('teacher.attendance.report');
            Route::get('teacher/attendance/report/get', [ReportController::class, 'TeacherAttendanceReportGet'])->name('teacher.report.attendance.get');
        });

});
// End of Auth middleware



Route::middleware(['student', 'auth'])->get('/dashboard_student', function() {
    return view('student.index');
})->name('dashboard_student');

Route::middleware(['auth', 'student'])->group(function() {
    //Student View Profile
    Route::get('student/view-profile', [MyStudentController::class, 'ViewProfile'])->name('student.view.profile');
    Route::get('student/view-password', [MyStudentController::class, 'ViewPassword'])->name('student.changepassword');
    Route::post('student/update-password', [MyStudentController::class, 'UpdatePassword'])->name('student.password.update');
    Route::get('student/logout', [MyStudentController::class, 'StudentLogout'])->name('student.logout');

    // My class Routes
    Route::get('student/view/subject', [MyStudentController::class, 'ViewSubject'])->name('student.view.subjects');
    Route::get('student/view/attendance', [MyStudentController::class, 'ViewAttendance'])->name('student.view.attendance');
    Route::get('mydetail/attendance/{date}', [MyStudentController::class, 'MyDetailsAttendance'])->name('mydetails.attend');
    Route::get('student/view/result', [MyStudentController::class, 'ViewMyResult'])->name('student.view.result');
    Route::get('student/view/result/pdf', [MyStudentController::class, 'ViewMyResultPdf'])->name('student.view.result.pdf');
});

Route::middleware(['teacher', 'auth'])->get('/dashboard_teacher', function() {
    return view('teacher.index');
})->name('dashboard_teacher');

Route::middleware(['auth', 'teacher'])->group(function() {

    Route::prefix('teacher_profile')->group(function() {
        Route::get('/view', [TeacherProfileController::class, 'ProfileView'])->name('teacher.profile');
        Route::get('/edit/{id}', [TeacherProfileController::class, 'ProfileEdit'])->name('teacher.profile.edit');
        Route::post('/update/{id}', [TeacherProfileController::class, 'ProfileUpdate'])->name('teacher.profile.update');
        Route::get('/logout', [TeacherProfileController::class, 'Logout'])->name('teacher.logout');
        Route::get('/password_view', [TeacherProfileController::class, 'PasswordView'])->name('teacher.password.view');
        Route::post('/password_update', [TeacherProfileController::class, 'PasswordUpdate'])->name('teacher.password.update');
    });

    Route::prefix('teacher')->group(function() {
        Route::get('view/all/student', [ManageStudentController::class, 'ViewStudent'])->name('teacher.student.view');
        Route::get('view/class/subject', [ManageStudentController::class, 'ViewClassSubject'])->name('teacher.class.subject.view');
        Route::get('view/class/attendance', [ManageStudentController::class, 'ViewClassAttendance'])->name('teacher.class.attendance.view');
        Route::get('add/class/attendance', [ManageStudentController::class, 'AddClassAttendance'])->name('student.add.attendance');
        Route::post('store/class/attendance', [ManageStudentController::class, 'StoreClassAttendance'])->name('store.student.attandance');
        Route::get('edit/class/attendance/{date}', [ManageStudentController::class, 'EditClassAttendance'])->name('student.attend.edit');
        Route::post('update/class/attendance/{date}', [ManageStudentController::class, 'UpdateClassAttendance'])->name('update.student.attandance');
        Route::get('detail/class/attendance/{date}', [ManageStudentController::class, 'DetailClassAttendance'])->name('student.attend.detail');
        Route::get('detail/class/attendance/pdf/{date}', [ManageStudentController::class, 'DetailClassAttendancepPDF'])->name('teacher.class.attendance.view.pdf');
        //view student in my class excec
        Route::get('/view/excel/myclass', [StudentExportController::class, 'ExportMyStudent'] )->name('viewstudent.myclass');

        //manage mark route
        Route::get('mark/entry/add', [MarksController::class, 'MarkAdd'])->name('mark.entry.add');
        Route::post('import/student/grade', [StudentGradeImportController::class, 'ImportGrade'])->name('import.student.grade');
        Route::get('view/student/results', [StudentGradeImportController::class, 'ViewResult'])->name('view.student.result');
    });

    Route::get('mark/subjectget/getstudent', [DefaultController::class, 'GetStudent'])->name('student.marks.getstudents');

});















