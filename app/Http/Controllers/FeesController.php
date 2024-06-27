<?php

namespace App\Http\Controllers;

use App\Models\fees;
use App\Models\studentcourse;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('fees.create',['scinfo'=>studentcourse::find($id)]);
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
        $info=['student_course_id'=>$request->student_course_id,'student_id'=>$request->student_id,'fees'=>$request->fees,'dateofsubmit'=>$request->dateofsubmit];
        Fees::create($info);
        return redirect('/student')->with('grt','Fees Submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function show(fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function edit(fees $fees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fees $fees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fees  $fees
     * @return \Illuminate\Http\Response
     */
    public function destroy(fees $fees)
    {
        //
    }
}
