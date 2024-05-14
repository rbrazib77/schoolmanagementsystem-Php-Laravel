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

class EmployeeRegistrationController extends Controller
{
    public function EmployeeView(){
        $allEmployee=User::where('usertype','Employee')->get();
        return view('backend.employee.employee_registration.view_employee_registration',compact('allEmployee'));
    }

    public function EmployeeAdd(){
        $allDesignation=Designation::all();
        return view('backend.employee.employee_registration.add_employee_registration',compact('allDesignation'));
    }

    public function EmployeeStore(Request $request){
        DB::transaction(function() use($request){
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();

            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }
            }else{
         $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id;
             $employeeId = $employee+1;
             if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }
        } //end else
        $final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Employee';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->mother_name = $request->mother_name;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
        $user->salary = $request->salary;
        $user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	$user->join_date = date('Y-m-d',strtotime($request->join_date));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $employee_salary = new EmployeeSalaryLog();
          $employee_salary->employee_id = $user->id;
          $employee_salary->effected_salary =  date('Y-m-d',strtotime($request->join_date));
          $employee_salary->previous_salary = $request->salary;
          $employee_salary->present_salary = $request->salary;
          $employee_salary->increment_salary = '0';
          $employee_salary->save();
       });
       $notification=array('messege'=>'Employee Registration Success!','alert-type'=>'success');
       return Redirect()->route('employee.registration.view')->with($notification);
    }//End Method


    public function EmployeeEdit($id){
        $editData=User::find($id);
        $allDesignation=Designation::all();
        return view('backend.employee.employee_registration.edit_employee_registration',compact('editData','allDesignation'));
    }

    public function EmployeeUpdate(Request $request,$id){
    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->mother_name = $request->mother_name;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
        $user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
            @unlink(public_path('upload/employee_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

       $notification=array('messege'=>'Employee Registration Update Successfully!','alert-type'=>'success');
       return Redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeDetails($id){
        $details=User::find($id);
        return view('backend.employee.employee_registration.employee_details',compact('details'));
    }
    public function EmployeePdf($id){
        $employeepdf=User::find($id);
        $data=[
            'title'=>"Rb Dev's",
            'date'=>date('m/d/y'),
            'details'=>$employeepdf
         ];
         $pdf = Pdf::loadView('backend.employee.employee_registration.employee_registration_pdf',$data);
         return $pdf->stream('employee.pdf');
    }
}
