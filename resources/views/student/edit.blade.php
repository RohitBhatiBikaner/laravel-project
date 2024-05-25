@extends('layouts.app')
@section('content')
    
<div class="container border border-dark " style="box-shadow: 1px 2px 10px">
    <form method="post" action="/course/{{$info['id']}}">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="name">Course Name:</label>
        <input type="text" class="form-control"name="name" id="name" placeholder="Enter Category Name" required value="{{$info['name']}}">
    </div>
    
    <div class="mb-3">
        <label for="fees"> Course Fee:</label>
        <input type="number" class="form-control"name="fees" id="fees" placeholder="Enter Fees" required value="{{$info['fees']}}">
    </div>
    
    <div class="mb-3">
        <label for="discount"> Discount:</label>
        <input type="number" class="form-control"name="discount" id="discount" placeholder="Enter Discount" value="{{$info['discount']}}">
    </div>
    
    <div class="mb-3 text-center ">
        <button class="btn btn-success">SAVE</button>
    </div>
    
</form>
</div>
@endsection