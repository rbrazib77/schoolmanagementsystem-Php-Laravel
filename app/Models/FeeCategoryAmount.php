<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeeCategory;
use App\Models\StudentClass;
class FeeCategoryAmount extends Model
{
    use HasFactory;
    protected $fillable = [
        'fee_category_id',
        'student_class_id',
        'amount',
    ];

    public function feecategoryname(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }
    public function studentclassname(){
        return $this->belongsTo(StudentClass::class,'student_class_id','id');
    }

}
