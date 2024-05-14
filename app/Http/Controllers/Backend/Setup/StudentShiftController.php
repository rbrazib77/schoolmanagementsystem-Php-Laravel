<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;
use Carbon\Carbon;

class StudentShiftController extends Controller
{
    public function StudentShiftView(){
       $allShift= StudentShift::all();
       return view('backend.setup.student_shift.view_shift',compact('allShift'));
    }

    public function StudentShiftAdd(){
        return view('backend.setup.student_shift.add_shift');
    }
    public function StudentShiftStore(Request $request){
        $request->validate([
            'name'=>'required|unique:student_shifts'
        ]);
        StudentShift::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Shift Add Success!','alert-type'=>'success');
        return Redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftEdit($id){
        $allShift=StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift',compact('allShift'));
    }

    public function StudentShiftUpdate(Request $request,$id){
        StudentShift::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Shift Update Success!','alert-type'=>'success');
        return Redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id){
        StudentShift::find($id)->delete();
        $notification=array('messege'=>'Student Shift Delete Success!','alert-type'=>'error');
        return Redirect()->route('student.shift.view')->with($notification);
     }

}
