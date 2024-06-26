<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentcourses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            // $table->primary(['student_id','course_id']);
            $table->string('name');
            $table->string('fees');
            $table->string('discount')->nullable();
            $table->string('finalprice');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();   
        });
    }  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentcourses');
    }
};
