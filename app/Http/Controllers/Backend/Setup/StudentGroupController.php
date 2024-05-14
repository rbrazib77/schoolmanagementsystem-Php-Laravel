<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;
use Carbon\Carbon;

class StudentGroupController extends Controller
{
    public function StudentGroupView(){
        $allGroup=StudentGroup::all();
        return view('backend.setup.student_group.view_group',compact('allGroup'));

    }
    public function StudentGroupAdd(){
        return view('backend.setup.student_group.add_group');
    }
    public function StudentGroupStore(Request $request){
        $request->validate([
            'name'=>'required|unique:student_groups'
        ]);
        StudentGroup::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Group Add Success!','alert-type'=>'success');
        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupEdit($id){
        $allGroup=StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group',compact('allGroup'));
    }

    public function StudentGroupUpdate(Request $request,$id){
        StudentGroup::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Student Group Update Success!','alert-type'=>'success');
        return Redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id){
        StudentGroup::find($id)->delete();
        $notification=array('messege'=>'Student Group Delete Success!','alert-type'=>'error');
        return Redirect()->route('student.group.view')->with($notification);
     }


}
