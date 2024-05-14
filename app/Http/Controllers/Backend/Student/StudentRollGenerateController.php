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
use PDF;

class StudentRollGenerateController extends Controller
{
    public function StudentRollGenerateView(){
        $allClass=StudentClass::all();
        $allYear=StudentYear::all();
        $allShift=StudentShift::all();
        $allGroup=StudentGroup::all();
        return view('backend.student.student_roll_generate.view_student_roll_generate',compact('allClass','allYear','allShift','allGroup'));
    }

    public function GetStudents(Request $request){
        $allData = AssignStudent::with(['student'])->where('student_year_id',$request->student_year_id)->where('student_class_id',$request->student_class_id)->get();
        return response()->json($allData);
    }

    public function StudentsRollGenerate(Request $request){
        $student_year_id = $request->student_year_id;
    	$student_class_id = $request->student_class_id;
    	if ($request->student_id !=null) {
    		for ($i=0; $i < count($request->student_id); $i++) {
    			AssignStudent::where('student_year_id',$student_year_id)->where('student_class_id',$student_class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
    		} // end for loop
    	}else{
            $notification=array('messege'=>'Sorry there are no student','alert-type'=>'error');
    	   return redirect()->back()->with($notification);
    	} // End IF Condition

        $notification=array('messege'=>'Well Done Roll Generated Successfully','alert-type'=>'success');
        return Redirect()->route('student.roll.generate.view')->with($notification);
    }
}
