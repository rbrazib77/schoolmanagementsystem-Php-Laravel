<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use Carbon\Carbon;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
        //   $allAssignSubject=AssignSubject::all();
          $allAssignSubject=AssignSubject::select('student_class_id')->groupBy('student_class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',compact('allAssignSubject'));
    }
    public function AssignSubjectAdd(){
          $allSchoolSubject=SchoolSubject::all();
          $allStudentClass=StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',compact('allSchoolSubject','allStudentClass'));
    }

    public function AssignSubjectStore(Request $request){
        $countSubject=count($request->student_subject_id);
        if($countSubject!=NULL){
            for($i=0; $i<$countSubject; $i++){
                AssignSubject::insert([
                    'student_class_id'=>$request->student_class_id,
                    'student_subject_id'=>$request->student_subject_id[$i],
                    'full_mark'=>$request->full_mark[$i],
                    'pass_mark'=>$request->pass_mark[$i],
                    'subjective_mark'=>$request->subjective_mark[$i],
                    'created_at'=>Carbon::now(),
                ]);
            }
        }
        $notification=array('messege'=>'Assign Subject Add Success!','alert-type'=>'success');
        return Redirect()->route('assign.subject.view')->with($notification);
    }


    public  function AssignSubjectDetails($student_class_id){
        $detailsData=AssignSubject::where('student_class_id',$student_class_id)->orderBy('student_subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',compact('detailsData'));
    }

}
