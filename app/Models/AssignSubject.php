<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentClass;
use App\Models\SchoolSubject;
class AssignSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_class_id',
        'student_subject_id',
        'full_mark',
        'pass_mark',
        'subjective_mark',
    ];

    public function studentclassname(){
        return $this->belongsTo(StudentClass::class,'student_class_id','id');
    }
    public function studentsubjectname(){
        return $this->belongsTo(SchoolSubject::class,'student_subject_id','id');
    }


}
