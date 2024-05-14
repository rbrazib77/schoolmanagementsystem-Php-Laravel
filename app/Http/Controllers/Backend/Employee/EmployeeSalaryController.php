<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\FeeCategoryAmount;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeSalaryController extends Controller
{
    public function EmployeeSalaryView(){
        $allEmployee=User::where('usertype',"Employee")->get();
        return view('backend.employee.employee_salary.view_employee_salary',compact('allEmployee'));
    }
    public function EmployeeSalaryIncrement($id){
        $allEditData=User::find($id);
        return view('backend.employee.employee_salary.increment_employee_salary',compact('allEditData'));
    }

    public function EmployeeSalaryIncrementUpdate(Request $request,$id){
        $user=User::find($id);
        $previous_salary= $user->salary;
        $present_salary= (float)$previous_salary+(float)$request->increment_salary;
        $user->salary=$present_salary;
        $user->save();

        $salaryData=new EmployeeSalaryLog();
        $salaryData->employee_id=$id;
        $salaryData->previous_salary=$previous_salary;
        $salaryData->increment_salary=$request->increment_salary;
        $salaryData->present_salary=$present_salary;
        $salaryData->effected_salary=date('Y-m-d',strtotime($request->effected_salary));
        $salaryData->save();
        $notification=array('messege'=>'Employee Increment Successfully!','alert-type'=>'success');
        return Redirect()->route('employee.salary.view')->with($notification);
    }

    public function EmployeeSalaryDetails($id){
        $details=User::find($id);
        $salary_log=EmployeeSalaryLog::where('employee_id',$details->id)->get();
        return view('backend.employee.employee_salary.details_employee_salary',compact('salary_log','details'));
    }

}
