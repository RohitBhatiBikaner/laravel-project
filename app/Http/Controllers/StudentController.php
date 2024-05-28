<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\studentcourse;
use Illuminate\Http\Request;
use App\Models\course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=student::all();
        return view('student.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cdata=course::all(['id','name']);
        return view('student.create',compact('cdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> "required|min:2|max:40",
            'mobile'=> 'required',
            'photo'=> 'required|file|image|mimes:jpeg,jpg|max:2048'
        ]);
        $fileName= time() . '_' . $request->photo->getClientOriginalName();
        

        
        $request->photo->move(public_path('photo'), $fileName);
        $info=[
            'name' => $request->name,
            'mobile'=>$request->mobile,
            'parent_name'=>$request->parent_name,
            'parent_mobile'=>$request->parent_mobile,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'referance_by'=>$request->referance_by,
            'address'=>$request->address,
            'dob'=>$request->dob,
            'doj'=>$request->doj,
            'photo'=>$request->photo
        ]; 
        $obj=Student::create($info);
        if(count($request->course_id)>0)
        foreach($request->course_id as $cid){
           echo $cid;
            $scinfo=[
                'course_id'=>$cid,
                'student_id'=>$obj->id
            ];
             StudentCourse::create($scinfo);
        }
        return redirect ('/student')->with('grt','Data Saved Successfully');
    }
        

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
        return view('student.edit',['sinfo'=>$student]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
        $student->name=$request->name;
        $student->mobile=$request->mobile;
        $student->course=$request->course;
        $student->$request->doj;
        $student->save();
        return redirect('/student')->with('grt','Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
