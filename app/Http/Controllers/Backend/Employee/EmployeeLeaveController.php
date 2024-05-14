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
use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;


class EmployeeLeaveController extends Controller
{

    public function EmployeeLeaveView(){
        $allData=EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.employee_leave.view_employee_leave',compact('allData'));
    }
     public function EmployeeLeaveAdd(){
        $allEmployee=User::where('usertype','Employee')->get();
        $leave_purpose=LeavePurpose::all();
        return view('backend.employee.employee_leave.add_employee_leave',compact('allEmployee','leave_purpose'));
    }

    public function EmployeeLeaveStore(Request $request){

        if ($request->leave_purpose_id == "0") {
    		$leavepurpose = new LeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id;
    	}else{
    		$leave_purpose_id = $request->leave_purpose_id;
    	}
        
    	$data = new EmployeeLeave();
    	$data->employee_id = $request->employee_id;
    	$data->leave_purpose_id = $leave_purpose_id;
    	$data->start_date = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date = date('Y-m-d',strtotime($request->end_date));
    	$data->save();
        $notification=array('messege'=>'Employee Leave Successfull!','alert-type'=>'success');
        return Redirect()->route('employee.leave.view')->with($notification);
    }
}
