<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollGenerateController;
use App\Http\Controllers\Backend\Student\StudentRegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;

use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

// Middleware Auth Route
Route::group(['middleware'=>'auth'],function(){

// User Management All Routes
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});

// Profile Management All Routes
Route::prefix('profiles')->group(function(){
    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
    Route::get('password/view',[ProfileController::class,'passwordView'])->name('password.view');
    Route::post('password/view',[ProfileController::class,'PasswordChange'])->name('password.change');
});
// Setups Management All Routes
Route::prefix('setups')->group(function(){
    // Student Class Routes
    Route::get('student/class/view',[StudentClassController::class,'StudentClassView'])->name('student.class.view');
    Route::get('student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('student/class/store',[StudentClassController::class,'StudentClassStore'])->name('student.class.store');
    Route::get('student/class/edit{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update{id}',[StudentClassController::class,'StudentClassUpdate'])->name('student.class.update');
    Route::get('student/class/delete{id}',[StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');
   // Student Year Routes
    Route::get('student/year/view',[StudentYearController::class,'StudentYearView'])->name('student.year.view');
    Route::get('student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add');
    Route::post('student/year/store',[StudentYearController::class,'StudentYearStore'])->name('student.year.store');
    Route::get('student/year/edit{id}',[StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update{id}',[StudentYearController::class,'StudentYearUpdate'])->name('student.year.update');
    Route::get('student/year/delete{id}',[StudentYearController::class,'StudentYearDelete'])->name('student.year.delete');
    // Student Group Routes
    Route::get('student/group/view',[StudentGroupController::class,'StudentGroupView'])->name('student.group.view');
    Route::get('student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
    Route::post('student/group/store',[StudentGroupController::class,'StudentGroupStore'])->name('student.group.store');
    Route::get('student/group/edit{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('student.group.update');
    Route::get('student/group/delete{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');
    // Student Shift Routes
    Route::get('student/shift/view',[StudentShiftController::class,'StudentShiftView'])->name('student.shift.view');
    Route::get('student/shift/add',[StudentShiftController::class,'StudentShiftAdd'])->name('student.shift.add');
    Route::post('student/shift/store',[StudentShiftController::class,'StudentShiftStore'])->name('student.shift.store');
    Route::get('student/shift/edit{id}',[StudentShiftController::class,'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('student/shift/update{id}',[StudentShiftController::class,'StudentShiftUpdate'])->name('student.shift.update');
    Route::get('student/shift/delete{id}',[StudentShiftController::class,'StudentShiftDelete'])->name('student.shift.delete');
    // Student Fee Category Routes
    Route::get('fee/category/view',[FeeCategoryController::class,'FeeCategoryView'])->name('fee.category.view');
    Route::get('fee/category/add',[FeeCategoryController::class,'FeeCategoryAdd'])->name('fee.category.add');
    Route::post('fee/category/store',[FeeCategoryController::class,'FeeCategoryStore'])->name('fee.category.store');
    Route::get('fee/category/edit{id}',[FeeCategoryController::class,'FeeCategoryEdit'])->name('fee.category.edit');
    Route::post('fee/category/update{id}',[FeeCategoryController::class,'FeeCategoryUpdate'])->name('fee.category.update');
    Route::get('fee/category/delete{id}',[FeeCategoryController::class,'FeeCategoryDelete'])->name('fee.category.delete'); // Student Fee Category Route
  // Student Fee Category Amount Routes
    Route::get('fee/amount/view',[FeeAmountController::class,'FeeAmountView'])->name('fee.amount.view');
    Route::get('fee/amount/add',[FeeAmountController::class,'FeeAmountAdd'])->name('fee.amount.add');
    Route::post('fee/amount/store',[FeeAmountController::class,'FeeAmountStore'])->name('fee.amount.store');
    Route::get('fee/amount/edit{fee_category_id}',[FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');
    Route::get('fee/amount/details{fee_category_id}',[FeeAmountController::class,'FeeAmountDetails'])->name('fee.amount.details');
    // Route::post('fee/amount/update{id}',[FeeAmountController::class,'FeeCategoryUpdate'])->name('fee.category.update');
    // Route::get('fee/amount/delete{id}',[FeeAmountController::class,'FeeCategoryDelete'])->name('fee.category.delete');

     // Exam Type Routes
     Route::get('exam/type/view',[ExamTypeController::class,'ExamTypeView'])->name('exam.type.view');
     Route::get('exam/type/add',[ExamTypeController::class,'ExamTypeAdd'])->name('exam.type.add');
     Route::post('exam/type/store',[ExamTypeController::class,'ExamTypeStore'])->name('exam.type.store');
     Route::get('exam/type/edit{id}',[ExamTypeController::class,'ExamTypeEdit'])->name('exam.type.edit');
     Route::post('exam/type/update{id}',[ExamTypeController::class,'ExamTypeUpdate'])->name('exam.type.update');
     Route::get('exam/type/delete{id}',[ExamTypeController::class,'ExamTypeDelete'])->name('exam.type.delete');// Exam Type Route

     // School Subject Routes
     Route::get('school/subject/view',[SchoolSubjectController::class,'SchoolSubjectView'])->name('school.subject.view');
     Route::get('school/subject/add',[SchoolSubjectController::class,'SchoolSubjectAdd'])->name('school.subject.add');
     Route::post('school/subject/store',[SchoolSubjectController::class,'SchoolSubjectStore'])->name('school.subject.store');
     Route::get('school/subject/edit{id}',[SchoolSubjectController::class,'SchoolSubjectEdit'])->name('school.subject.edit');
     Route::post('school/subject/update{id}',[SchoolSubjectController::class,'SchoolSubjectUpdate'])->name('school.subject.update');
     Route::get('school/subject/delete{id}',[SchoolSubjectController::class,'SchoolSubjectDelete'])->name('school.subject.delete'); // School Subject Route
    // assign Subject Routes
     Route::get('assign/subject/view',[AssignSubjectController::class,'AssignSubjectView'])->name('assign.subject.view');
     Route::get('assign/subject/add',[AssignSubjectController::class,'AssignSubjectAdd'])->name('assign.subject.add');
     Route::post('assign/subject/store',[AssignSubjectController::class,'AssignSubjectStore'])->name('assign.subject.store');
     Route::get('assign/subject/edit{id}',[AssignSubjectController::class,'AssignSubjectEdit'])->name('assign.subject.edit');
     Route::get('assign/subject/details{student_class_id}',[AssignSubjectController::class,'AssignSubjectDetails'])->name('assign.subject.details');
     Route::post('assign/subject/update{id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('assign.subject.update');

     //Designation Routes
     Route::get('designation/view',[DesignationController::class,'DesignationView'])->name('designation.view');
     Route::get('designation/add',[DesignationController::class,'DesignationAdd'])->name('designation.add');
     Route::post('designation/store',[DesignationController::class,'DesignationStore'])->name('designation.store');
     Route::get('designation/edit{id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');
     Route::post('designation/update{id}',[DesignationController::class,'DesignationUpdate'])->name('designation.update');
     Route::get('designation/delete{id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');
});
// Students Management All Routes
Route::prefix('students')->group(function(){
    // Student Management  Routes
    Route::get('student/registration/view',[StudentRegistrationController::class,'StudentRegistrationView'])->name('student.registration.view');
    Route::get('student/registration/add',[StudentRegistrationController::class,'StudentRegistrationAdd'])->name('student.registration.add');
    Route::post('student/registration/store',[StudentRegistrationController::class,'StudentRegistrationStore'])->name('student.registration.store');
    Route::get('student/registration/edit{student_id}',[StudentRegistrationController::class,'StudentRegistrationEdit'])->name('student.registration.edit');
    Route::post('student/registration/update{student_id}',[StudentRegistrationController::class,'StudentRegistrationUpdate'])->name('student.registration.update');
    Route::get('student/registration/promation{student_id}',[StudentRegistrationController::class,'StudentRegistrationPromation'])->name('student.registration.promation');
    Route::post('student/registration/promation/update{student_id}',[StudentRegistrationController::class,'StudentRegistrationPromationUpdate'])->name('student.registration.promation.update');
    Route::get('student/registration/details{student_id}',[StudentRegistrationController::class,'StudentRegistrationDetails'])->name('student.registration.details');
    Route::get('year/class/wise',[StudentRegistrationController::class,'StudentClassYearWise'])->name('student.year.class.wise');

    // Student Roll Generate  Route
    Route::get('roll/generate/view',[StudentRollGenerateController::class,'StudentRollGenerateView'])->name('student.roll.generate.view');
    Route::get('roll/getstudents',[StudentRollGenerateController::class,'GetStudents'])->name('student.registration.getstudents');
    Route::post('roll/store',[StudentRollGenerateController::class,'StudentsRollGenerate'])->name('roll.generate.store');

    // Student Registration Fee  Routes
    Route::get('registration/fee/view',[StudentRegistrationFeeController::class,'RegistrationFeeView'])->name('registration.fee.view');
    Route::get('registration/fee/classwisedata',[StudentRegistrationFeeController::class,'RegistrationFeeClassWise'])->name('student.registration.fee.classwise.get');
    Route::get('registration/fee/payslip',[StudentRegistrationFeeController::class,'RegistrationFeePayslip'])->name('student.registration.fee.payslip');

    // Student Monthly Fee  Routes
    Route::get('monthly/fee/view',[MonthlyFeeController::class,'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('monthly/fee/classwisedata',[MonthlyFeeController::class,'MonthlyFeeClassWise'])->name('student.monthly.fee.classwise.get');
    Route::get('monthly/fee/payslip',[MonthlyFeeController::class,'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
    // Student Exam Fee  Routes
    Route::get('exam/fee/view',[ExamFeeController::class,'ExamFeeView'])->name('exam.fee.view');
    Route::get('exam/fee/classwisedata',[ExamFeeController::class,'ExamFeeClassWise'])->name('student.exam.fee.classwise.get');
    Route::get('exam/fee/payslip',[ExamFeeController::class,'ExamFeePayslip'])->name('student.exam.fee.payslip');

});

// Employee Management All Routes
Route::prefix('employees')->group(function(){
    // Employee Registration  Routes
    Route::get('registration/view',[EmployeeRegistrationController::class,'EmployeeView'])->name('employee.registration.view');
    Route::get('registration/add',[EmployeeRegistrationController::class,'EmployeeAdd'])->name('employee.registration.add');
    Route::post('registration/store',[EmployeeRegistrationController::class,'EmployeeStore'])->name('employee.registration.store');
    Route::get('registration/edit/{id}',[EmployeeRegistrationController::class,'EmployeeEdit'])->name('employee.registration.edit');
    Route::post('registration/update/{id}',[EmployeeRegistrationController::class,'EmployeeUpdate'])->name('employee.registration.update');
    Route::get('registration/delatils/{id}',[EmployeeRegistrationController::class,'EmployeeDetails'])->name('employee.registration.delatils');
    Route::get('registration/pdf/{id}',[EmployeeRegistrationController::class,'EmployeePdf'])->name('employee.registration.pdf');

    // Employee salary  Routes
    Route::get('salary/view',[EmployeeSalaryController::class,'EmployeeSalaryView'])->name('employee.salary.view');
    Route::get('salary/increment/{id}',[EmployeeSalaryController::class,'EmployeeSalaryIncrement'])->name('employee.salary.increment');
    Route::post('salary/increment/update/{id}',[EmployeeSalaryController::class,'EmployeeSalaryIncrementUpdate'])->name('employee.salary.increment.update');
    Route::get('salary/details/{id}',[EmployeeSalaryController::class,'EmployeeSalaryDetails'])->name('employee.salary.delatils');

    // Employee Leave  Routes
    Route::get('leave/view',[EmployeeLeaveController::class,'EmployeeLeaveView'])->name('employee.leave.view');
    Route::get('leave/add',[EmployeeLeaveController::class,'EmployeeLeaveAdd'])->name('employee.leave.add');
    Route::post('leave/store',[EmployeeLeaveController::class,'EmployeeLeaveStore'])->name('employee.leave.store');


});//End Employees  Management

});//End Middleware Auth Route




