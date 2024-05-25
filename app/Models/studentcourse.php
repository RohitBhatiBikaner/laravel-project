<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentcourse extends Model
{
    use HasFactory;
    protected $fillable=['student_id','course_id'];
    function studentId(){
        return $this->belongsTo(student::class,'student_id','id');
    }
    function courseId(){
        return $this->belongsTo(course::class,'course_id','id');
    }
    function studentIds(){
        return $this->belongsToMany(student::class,'student_id','id');
    }
    function courseIds(){
        return $this->belongsToMany(course::class,'course_id','id');
    }
}
