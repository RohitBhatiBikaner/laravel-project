@extends('layouts.app')
@section('content')
    <style>
        .dgird{
            border: 1px solid #ddd;
            padding: 5px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
    </style>
<div class="container borderd" style="box-shadow: 1px 2px 10px">
    <h1 class="text-center " >Student Form</h1>
   @foreach($errors->all() as $e)
   <div class="alert alert-danger">{{$e}}</div>
   @endforeach
    <form method="post" action="/student/" enctype="multipart/form-data" >
    @csrf
    <div class="mb-3">
      <h4>  <label for="name" style="color:#960dad">Select Courses:</label></h4>
        <div class="dgird"  style="box-shadow: 2px 1px 5px">
        
            @foreach ($cdata as $cinfo)
                <div>
        <input type="checkbox" name="course_id[]" id="c{{$cinfo['id']}}" value="{{$cinfo['id']}}">
        <label for="c{{$cinfo['id']}}">
            {{$cinfo['name']}}
        </label>
        </div>
        @endforeach
                </div>
    </div>
    <div>
        <h4><label for="name" style="color: #960dad">Name:</label></h4> 
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"  required>
    </div> <br>
    <div>
        <h4><label for="mobile" style="color:#960dad ">Mobile:</label></h4>
        <input type="text" name="mobile" id="mobile" class="form-control" accept="[0-9]{10}" placeholder="Enter Your Mobile Number" required>
    </div>
    <br> 
    <div>
        <h4><label for="pname" style="color:#960dad">Parent Name:</label></h4>
        <input type="text" name="parent_name" placeholder="Enter your Parent Name" id="pname" class="form-control" >   </div>
    <br>
        <div>
        <h4><label for="pmobile" style="color:#960dad" >Parent Mobile:</label></h4>
        <input type="text" name="parent_mobile" placeholder="Enter Parent Mobile Number" id="pmobile" class="form-control" accept="[0-9]{10}" >
    </div>
    <br>
    <div>
        <h4><label for="gender" style="color:#960dad" >Gender:</label></h4>
        <div class="form-control">
        <input type="radio" value="male" name="gender" id="m">&nbsp <label for="m">Male</label>
        <input type="radio" value="female" name="gender"  id="f"> <label for="f">Female</label>
    </div>
    <br>
    </div>


    <div>
        <h4><label for="email" style="color:#960dad" >Email:</label></h4>
        <input type="email" name="email" class="form-control"  placeholder="Enter Email ID" id="email">
    </div>
    <br>
    <div>
        <h4><label for="referance_by" style="color:#960dad" >Referance By:</label></h4>
        <input type="text" name="referance_by" placeholder="Who Tell You About Axixa" id="referance_by" class="form-control">
    </div>
    <br>
    <div>

        <h4><label for="dob" style="color:#960dad" >Date Of Birth:</label></h4>
        <input type="date" name="dob"  id="dob" class="form-control" max="{{date('Y-m-d',time()-(86400*365.25*6))}}" required>
    </div>
    <br>
    <h4><label for="doj" style="color:#960dad" >Date Of Joining:</label></h4>
        <input type="date" name="doj"  id="doj" value="{{date('Y-m-d')}}" class="form-control" max="{{date('Y-m-d',)}}" required>
        <div>
           <h4> <label for="address" style="color:#960dad" >Address:</label> </h4>
            <textarea name="address"  rows="5" class="form-control" placeholder="Enter Address Here"></textarea>
        </div>
   <br> 
   <div>
        <h4><label for="photo" style="color:#960dad" > Photo:</label></h4>
        <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg,image/jpg" >
    </div>
    <br>    
   <div class="mb-3 text-center " id="btn" >
       <button class="button-73">SUBMIT</button>
   
   <br> </div>
    
<br> </div>
    

    
</form>
</div>
<style>
.button-73 {
  appearance: none;
  background-color: #FFFFFF;
  border-radius: 40em;
  border-style: none;
  box-shadow: #ADCFFF 0 -12px 6px inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: -.24px;
  margin: 0;
  outline: none;
  padding: 1rem 1.3rem;
  quotes: auto;
  text-align: center;
  text-decoration: none;
  transition: all .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-73:hover {
  background-color: #FFC229;
  box-shadow: #FF6314 0 -6px 8px inset;
  transform: scale(1.125);
}

.button-73:active {
  transform: scale(1.025);
}

@media (min-width: 768px) {
  .button-73 {
    font-size: 1.5rem;
    padding: .75rem 2rem;
  }
}

 h1 {
  font-size: 70px;
  font-weight: 600;
  font-family: 'Roboto', sans-serif;
  color: #b393d3;
  text-transform: uppercase;
  text-shadow: 1px 1px 0px #957dad,
               1px 2px 0px #957dad,
               1px 3px 0px #957dad,
               1px 4px 0px #957dad,
               1px 5px 0px #957dad,
               1px 6px 0px #957dad,
               1px 10px 5px rgba(16, 16, 16, 0.5),
               1px 15px 10px rgba(16, 16, 16, 0.4),
               1px 20px 30px rgba(16, 16, 16, 0.3),
               1px 25px 50px rgba(16, 16, 16, 0.2);
}
</style>
@endsection
    