<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\User;
use App\Models\DiscountStudent;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentRegistrationController extends Controller
{
    public function StudentRegistrationView(){
        $allClass=StudentClass::all();
        $allYear=StudentYear::all();
        $student_year_id=StudentYear::orderBy('id','desc')->first()->id;
        $student_class_id=StudentClass::orderBy('id','desc')->first()->id;
        $allData=AssignStudent::where('student_year_id',$student_year_id)->where('student_class_id',$student_class_id)->get();
        return view('backend.student.student_registration.view_student_registration',compact('allData','allClass','allYear','student_year_id','student_class_id'));
    }


    public function StudentClassYearWise(Request $request){
        $allClass=StudentClass::all();
        $allYear=StudentYear::all();
        $student_year_id=$request->student_year_id;
        $student_class_id=$request->student_class_id;
        $allData=AssignStudent::where('student_year_id',$request->student_year_id)->where('student_class_id',$request->student_class_id)->get();
        return view('backend.student.student_registration.view_student_registration',compact('allData','allClass','allYear','student_year_id','student_class_id'));
    }



    public function StudentRegistrationAdd(){
        $allClass=StudentClass::all();
        $allShift=StudentShift::all();
        $allYear=StudentYear::all();
        $allGroup=StudentGroup::all();
        return view('backend.student.student_registration.add_student_registration',compact('allClass','allShift','allYear','allGroup'));
    }
    public function StudentRegistrationStore(Request $request){
        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->student_year_id)->name;
            $student = User::where('usertype','Student')->orderBy('id','DESC')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
            }else{
         $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
             $studentId = $student+1;
             if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
        } //end else
        $final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'Student';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->mother_name = $request->mother_name;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $assign_student = new AssignStudent();
          $assign_student->student_id = $user->id;
          $assign_student->student_year_id = $request->student_year_id;
          $assign_student->student_class_id = $request->student_class_id;
          $assign_student->student_group_id = $request->student_group_id;
          $assign_student->student_shift_id = $request->student_shift_id;
          $assign_student->save();

          $discount_student = new DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();
       });
       $notification=array('messege'=>'Student Registration Success!','alert-type'=>'success');
       return Redirect()->route('student.registration.view')->with($notification);
    }//end Method

    public function StudentRegistrationEdit($student_id){
        $allClass=StudentClass::all();
        $allShift=StudentShift::all();
        $allYear=StudentYear::all();
        $allGroup=StudentGroup::all();
        $allDataEdit=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_registration.edit_student_registration',compact('allDataEdit','allClass','allYear','allGroup','allShift'));
    }

    public function StudentRegistrationUpdate(Request $request,$student_id){
        DB::transaction(function() use($request,$student_id){
    	$user =User::where('id',$student_id)->first();
    	$user->name = $request->name;
    	$user->father_name = $request->father_name;
    	$user->mother_name = $request->mother_name;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
            @unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();
          $assign_student =AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
          $assign_student->student_year_id = $request->student_year_id;
          $assign_student->student_class_id = $request->student_class_id;
          $assign_student->student_group_id = $request->student_group_id;
          $assign_student->student_shift_id = $request->student_shift_id;
          $assign_student->save();

          $discount_student =DiscountStudent::where('assign_student_id',$request->id)->first();
          $discount_student->discount = $request->discount;
          $discount_student->save();
       });
       $notification=array('messege'=>'Student Registration Update Success!','alert-type'=>'success');
       return Redirect()->route('student.registration.view')->with($notification);
    }


    public function StudentRegistrationPromation($student_id){
        $allClass=StudentClass::all();
        $allShift=StudentShift::all();
        $allYear=StudentYear::all();
        $allGroup=StudentGroup::all();
        $allPromationEdit=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_registration.promation_student_registration',compact('allPromationEdit','allClass','allYear','allGroup','allShift'));
    }

    public function StudentRegistrationPromationUpdate(Request $request,$student_id){
        DB::transaction(function() use($request,$student_id){
            $user =User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
             $user->save();

              $assign_student = new AssignStudent();
              $assign_student->$student_id=$student_id;
              $assign_student->student_year_id = $request->student_year_id;
              $assign_student->student_class_id = $request->student_class_id;
              $assign_student->student_group_id = $request->student_group_id;
              $assign_student->student_shift_id = $request->student_shift_id;
              $assign_student->save();

              $discount_student = new DiscountStudent();
              $discount_student->assign_student_id = $assign_student->id;
              $discount_student->fee_category_id = '1';
              $discount_student->discount = $request->discount;
              $discount_student->save();
           });
           $notification=array('messege'=>'Student Promation Updated Success!','alert-type'=>'success');
           return Redirect()->route('student.registration.promation')->with($notification);
    }

    public function StudentRegistrationDetails($student_id){
     $details=AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
     $data=[
        'title'=>"Rb Dev's",
        'date'=>date('m/d/y'),
        'details'=>$details
     ];
     $pdf = Pdf::loadView('backend.student.student_registration.student_details_pdf', $data);
     return $pdf->stream('student.pdf');
    }



}
