<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;
use Carbon\Carbon;

class ExamTypeController extends Controller
{
    public function ExamTypeView(){
        $allExamType=ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',compact('allExamType'));
    }
    public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function ExamTypeStore(Request $request){
        $request->validate([
            'name'=>'required|unique:exam_types'
        ]);
        ExamType::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Exam Type Add Success!','alert-type'=>'success');
        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeEdit($id){
        $allExamTypeEdit=ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type',compact('allExamTypeEdit'));
    }

    public function ExamTypeUpdate(Request $request,$id){
        ExamType::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Exam Type Update Success!','alert-type'=>'success');
        return Redirect()->route('exam.type.view')->with($notification);
    }

    public function ExamTypeDelete($id){
        ExamType::find($id)->delete();
        $notification=array('messege'=>'Exam Type Delete Success!','alert-type'=>'error');
        return Redirect()->route('exam.type.view')->with($notification);
     }
}
