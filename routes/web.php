<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
route::middleware('auth')->group(function(){

    route::resource('/student',StudentController::class);
    route::resource('/course',CourseController::class);
    // Route::get('/course',[CourseController::class,'index']);
    // Route::get('/course/create',[CourseController::class,'create']);
    // Route::post('/course',[CourseController::class,'store']);
    // Route::get('/course/{id}/edit',[CourseController::class,'edit']);
    // Route::patch('/course/{id}',[CourseController::class,'update']);
    
    // route::delete('/course/{id}',[CourseController::class,'destroy']);
    
    Route::get('/course/{id}/{sid}',[CourseController::class,'show']);
    
    route::get('/studentcourse/{id}',[StudentController::class,'studentcourse']);
});
route::get('fees/{id}',[FeesController::class,'create']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\StudentController::class, 'index'])->name('home');
Route::get('fees/{id}',[FeesController::class,'create']);
Route::post('fees/',[FeesController::class,'store']);
