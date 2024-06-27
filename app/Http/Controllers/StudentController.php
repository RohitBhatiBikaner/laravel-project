<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\studentcourse;
use Illuminate\Http\Request;
use App\Models\course;
use App\Models\student_media;
use Illuuminate\Support\Facades\DB;
use phpunit\Framework\MockObject\Builder\Stub;
use Intervention\Image\Image;

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
            // 'photo'=> 'required|file|image|mimes:jpeg,jpg|max:2048'
        ]);
            // if($request->photo){
            // $filename= time() . '_' . $request->photo->getClientOriginalName();
            // Image::make($requset->photo)->save(public_path('photo'.$filename));
            // Image::make($requset->photo)->resize(150,150)->save(public_path('thumbnail'));

        // }
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
        foreach($request->photo as $image){
            $filename=[];
            $imagename=$image->getClientOriginalName();
            $image->move(public_path('photo'),$imagename);
        }
        $images= json_encode($filename);
        foreach($request->photo as $img){
            $isave=[
                'student_id'=>$obj->id,
                'image'=>$img

            ];
            student_media::create($isave);
        }
        
        if(count($request->course_id)>0)
        {
            foreach($request->course_id as $cid)
            {
                $cdtl=course::find($cid);
              $csinfo=[
                    'course_id'=>$cid,
                    'student_id'=>$obj->id,
                    'name'=>$cdtl->name,
                    'fees'=>$cdtl->fees,
                    'discount'=>$cdtl->discount,
                    'finalprice'=>$cdtl->discount?$cdtl->fees-$cdtl->fees*$cdtl->discount/100:$cdtl->fees

                    ];

                StudentCourse::create($csinfo);

            }

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
        // $sdata=course::all(['id','name']);
        $course=array_column($student->allcourse->toArray(),'course_id');
        return view('student.edit',['info'=>$student,'cdata'=>course::all(['id','name']),'course'=>$course]);

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
        $request->validate([
            'name'=> "required|min:2|max:40",
            'mobile'=> 'required',
            // 'photo'=> 'file|image|mimes:jpeg,jpg|max:2048'
        ]);
        $fileName=$student->photo;
        if ( $request->photo){
            if($fileName){
                unlink("\photo\$fileaName");
            }
            $fileName=time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('photo'),$fileName);
        }
            $student->name= $request->name;
            $student->mobile=$request->mobile;
            $student->parent_name=$request->parent_name;
            $student->parent_mobile=$request->parent_mobile;
            $student->gender=$request->gender;
            $student->email=$request->email;
            $student->referance_by=$request->referance_by;
            $student->address=$request->address;
            $student->dob=$request->dob;
            $student->doj=$request->doj;
            // $student->photo=$request->photo;
            $student->save();

        if(count($request->course_id)>0)
        $sid=$student->id;
        studentcourse::where('student_id',$sid)->delete();
        foreach($request->course_id as $cid){
            $cdtl=course::find($cid);
             $scinfo=[
                 'course_id'=>$cid,
                 'student_id'=>$student->id,
                 'name'=>$cdtl->name,
                 'fees'=>$cdtl->fees,
                 'discount'=>$cdtl->discount,
                 'finalprice'=>$cdtl->discount?$cdtl->fees-$cdtl->fees*$cdtl->discount/100:$cdtl->fees,

             ];
              StudentCourse::create($scinfo);
         }
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
        $student->delete();
        return redirect('/student')->with('err','Data Deleted Successfully');
    }
    public function studentcourse(){
            $cid=request('name');
           $sc= StudentCourse::find(request('scid'));
            if($sc){
           $sc->discount=request("discount");
           $sc->finalprice=request('finalfees');
           $info=$sc->toArray();
           unset($info['student_id'],$info['course_id'],$info['created_at'],$info['updated_at']);
           $sc->update($info);
           return redirect('/student')->with('grt','fees Updated Successfully');
    }
    return redirect('/student')->with('error','Student Course Not Found');

}
}