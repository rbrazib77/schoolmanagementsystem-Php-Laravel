<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\FeeCategoryAmount;
use App\Models\User;
use App\Models\DiscountStudent;
use Carbon\Carbon;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlyFeeController extends Controller
{
     public function MonthlyFeeView(){
        $allClass=StudentClass::all();
        $allYear=StudentYear::all();
        return view('backend.student.student_monthly_fee.view_student_monthly_fee',compact('allClass','allYear'));
     }

     public function MonthlyFeeClassWise(Request $request){
        $student_year_id = $request->student_year_id;
        $student_class_id = $request->student_class_id;
        if ($student_year_id !='') {
            $where[] = ['student_year_id','like',$student_year_id.'%'];
        }
        if ($student_class_id !='') {
            $where[] = ['student_class_id','like',$student_class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Action</th>';
        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','2')->where('student_class_id',$v->student_class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.monthly.fee.payslip").'?student_class_id='.$v->student_class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
       return response()->json(@$html);

   }// end method

   public function MonthlyFeePayslip(Request $request){
    $student_id = $request->student_id;
    	$student_class_id = $request->student_class_id;
        $data['month']=$request->month;
    	$data['details']= AssignStudent::with(['student','discount'])->where('student_id',$student_id)->where('student_class_id',$student_class_id)->first();
         $pdf = Pdf::loadView('backend.student.student_monthly_fee.monthly_fee_pdf',$data);
         return $pdf->stream('StudentMonthlyFee.pdf');
    }
}
