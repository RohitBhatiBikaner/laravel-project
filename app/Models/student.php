<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable=['name','mobile','parent_name','parent_mobile','gender','email','referance_by','address','dob','doj'];

        function allcourse(){
            return $this->hasMany(studentcourse::class,'student_id','id');
        }
        function course(){
            return $this->hasOne(studentcourse::class,'student_id','id');
        }
}
