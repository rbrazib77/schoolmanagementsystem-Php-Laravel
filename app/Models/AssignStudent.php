<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;

class AssignStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'student_class_id',
        'student_year_id',
        'student_group_id',
        'student_shift_id',
    ];

    public function student(){
    	return $this->belongsTo(User::class,'student_id','id');
    }
     public function discount(){
    	return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
    public function studentClass(){
    	return $this->belongsTo(StudentClass::class,'student_class_id','id');
    }
    public function studentYear(){
    	return $this->belongsTo(StudentYear::class,'student_year_id','id');
    }
    public function studentGroup(){
    	return $this->belongsTo(StudentGroup::class,'student_group_id','id');
    }
    public function studentShift(){
    	return $this->belongsTo(StudentShift::class,'student_shift_id','id');
    }
}
