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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('parent_name')->nullable();
            $table->string('parent_mobile')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender',['male','female'])->default('male')->nullable();
            $table->string('referance_by')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->date('doj')->nullable();
            $table->string('photo')->nullable();

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
        Schema::dropIfExists('students');
    }
};
