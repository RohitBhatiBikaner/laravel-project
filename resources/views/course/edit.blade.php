@extends('layouts.app')
@section('content')
    
<div class="container border border-dark " style="box-shadow: 1px 2px 10px">
    <form method="post" action="/course/{{$info['id']}}">
    @csrf
    @method('patch')
    <div class="mb-3">
        <h4><label for="name" style="color: #960dad" >Course Name:</label></h4>
        <input type="text" class="form-control"name="name" id="name" placeholder="Enter Course Name" required value="{{$info['name']}}">
    </div>
    
    <div class="mb-3">
        <h4><label for="fees" style="color: #960dad" > Course Fee:</label></h4>
        <input type="number" class="form-control"name="fees" id="fees" placeholder="Enter Fees" required value="{{$info['fees']}}">
    </div>
    
    <div class="mb-3">
        <h4><label for="discount" style="color: #960dad" > Discount:</label></h4>
        <input type="number" class="form-control"name="discount" id="discount" placeholder="Enter Discount" value="{{$info['discount']}}">
    </div>
    
    <div class="mb-3 text-center ">
        <button class="btn btn-success">SAVE</button>
    </div>
    
</form>
</div>
@endsection