<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use Carbon\Carbon;

class StudentYearController extends Controller
{
    public function StudentYearView(){
        $allYear=StudentYear::all();
        return view('backend.setup.student_year.view_year',compact('allYear'));
    }
    public function StudentYearAdd(){
        return view('backend.setup.student_year.add_year');
    }

    public function StudentYearStore(Request $request){
        $request->validate([
            'name'=>'required|unique:student_years'
        ]);
        StudentYear::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Year Add Success!','alert-type'=>'success');
        return Redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYearEdit($id){
        $allYear=StudentYear::find($id);
        return view('backend.setup.student_year.edit_year',compact('allYear'));
    }
     public function StudentYearUpdate(Request $request,$id){
        StudentYear::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Year Update Success!','alert-type'=>'success');
        return Redirect()->route('student.year.view')->with($notification);
    }
    public function StudentYearDelete($id){
        StudentYear::find($id)->delete();
        $notification=array('messege'=>'Student Year Delete Success!','alert-type'=>'error');
        return Redirect()->route('student.year.view')->with($notification);
     }
}
