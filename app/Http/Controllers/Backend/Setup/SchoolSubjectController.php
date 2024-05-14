<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use Carbon\Carbon;

class SchoolSubjectController extends Controller
{
    public function SchoolSubjectView(){
        $allSchoolSubject=SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',compact('allSchoolSubject'));
    }
     public function SchoolSubjectAdd(){
        return view('backend.setup.school_subject.add_school_subject');
    }
    public function SchoolSubjectStore(Request $request){
        $request->validate([
            'name'=>'required|unique:school_subjects'
        ]);
        SchoolSubject::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'School Subject Add Success!','alert-type'=>'success');
        return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectEdit($id){
        $allSchoolSubjectEdit=SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('allSchoolSubjectEdit'));
    }

    public function SchoolSubjectUpdate(Request $request,$id){
        SchoolSubject::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'School Subject Update Success!','alert-type'=>'success');
        return Redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectDelete($id){
        SchoolSubject::find($id)->delete();
        $notification=array('messege'=>'School Subject Delete Success!','alert-type'=>'error');
        return Redirect()->route('school.subject.view')->with($notification);
     }
}
