<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Carbon\Carbon;
class StudentClassController extends Controller
{
    public function StudentClassView(){
        $allClass=StudentClass::all();
        return view('backend.setup.student_class.view_class',compact('allClass'));
    }
    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    }
     public function StudentClassStore(Request $request){
        $request->validate([
            'name'=>'required|unique:student_classes'
        ]);
        StudentClass::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Class Add Success!','alert-type'=>'success');
        return Redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit($id){
        $allClass=StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('allClass'));
    }

    public function StudentClassUpdate(Request $request,$id){
        StudentClass::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Class Update Success!','alert-type'=>'success');
        return Redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id){
        StudentClass::find($id)->delete();
        $notification=array('messege'=>'Student Class Delete Success!','alert-type'=>'error');
        return Redirect()->route('student.class.view')->with($notification);
     }

}
