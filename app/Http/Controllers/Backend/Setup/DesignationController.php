<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Carbon\Carbon;
class DesignationController extends Controller
{
    public function DesignationView(){
        $allDesignation=Designation::all();
        return view('backend.setup.designation.view_designation',compact('allDesignation'));
    }
    public function DesignationAdd(){
        return view('backend.setup.designation.add_designation');
    }

    public function DesignationStore(Request $request){
        $request->validate([
            'name'=>'required|unique:designations'
        ]);
        Designation::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Designation Add Success!','alert-type'=>'success');
        return Redirect()->route('designation.view')->with($notification);
    }

    public function DesignationEdit($id){
        $allDesignationEdit=Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('allDesignationEdit'));
    }

    public function DesignationUpdate(Request $request,$id){
        Designation::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Designation Update Success!','alert-type'=>'success');
        return Redirect()->route('designation.view')->with($notification);
    }

    public function DesignationDelete($id){
        Designation::find($id)->delete();
        $notification=array('messege'=>'Designation Delete Success!','alert-type'=>'error');
        return Redirect()->route('designation.view')->with($notification);
     }


}
