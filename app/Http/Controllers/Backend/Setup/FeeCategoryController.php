<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use Carbon\Carbon;
class FeeCategoryController extends Controller
{
    public function FeeCategoryView(){
        $allFeeCategory=FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category',compact('allFeeCategory'));
    }
    public function FeeCategoryAdd(){
        return view('backend.setup.fee_category.add_fee_category');
    }

    public function FeeCategoryStore(Request $request){
        $request->validate([
            'name'=>'required|unique:fee_categories'
        ]);
        FeeCategory::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Fee Category Add Success!','alert-type'=>'success');
        return Redirect()->route('fee.category.view')->with($notification);
    }
    public function FeeCategoryEdit($id){
        $allFeeCategory=FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category',compact('allFeeCategory'));
    }


    public function FeeCategoryUpdate(Request $request,$id){
        FeeCategory::find($id)->update([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array('messege'=>'Fee Category Update Success!','alert-type'=>'success');
        return Redirect()->route('fee.category.view')->with($notification);
    }

    public function FeeCategoryDelete($id){
        FeeCategory::find($id)->delete();
        $notification=array('messege'=>'Fee Category Delete Success!','alert-type'=>'error');
        return Redirect()->route('fee.category.view')->with($notification);
     }


}
