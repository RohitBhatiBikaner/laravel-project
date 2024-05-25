<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable=['name','fees','discount'];
    function allstudent(){
        return $this->hasMany(studentcourse::class,'course_id','id');
    }
    function student(){
        return $this->hasOne(studentcourse::class,'course_id','id');
    }
}
