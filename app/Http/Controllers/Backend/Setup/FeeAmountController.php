<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Carbon\Carbon;


class FeeAmountController extends Controller
{

    public function FeeAmountView(){
        // $AllFeeCategoryAmount=FeeCategoryAmount::all();
        $AllFeeCategoryAmount=FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',compact('AllFeeCategoryAmount'));
    }
    public function FeeAmountAdd(){
        $FeeCategory=FeeCategory::all();
        $StudentClass=StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',compact('FeeCategory','StudentClass'));
    }
    public function FeeAmountStore(Request $request){
        $countClass=count($request->student_class_id);
        if($countClass!=NULL){
            for($i=0; $i<$countClass; $i++){
                FeeCategoryAmount::insert([
                    'fee_category_id'=>$request->fee_category_id,
                    'student_class_id'=>$request->student_class_id[$i],
                    'amount'=>$request->amount[$i],
                    'created_at'=>Carbon::now(),
                ]);
            }
        }
        $notification=array('messege'=>'Fee Amount Add Success!','alert-type'=>'success');
        return Redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountEdit($fee_category_id){
       $editData=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('student_class_id','asc')->get();
       $FeeCategory=FeeCategory::all();
       $StudentClass=StudentClass::all();
       return view('backend.setup.fee_amount.edit_fee_amount',compact('FeeCategory','StudentClass','editData'));
    }

    public  function FeeAmountDetails($fee_category_id){
        $detailsData=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('student_class_id','asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount',compact('detailsData'));
    }
}
