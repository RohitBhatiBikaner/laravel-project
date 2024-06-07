@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container border border-dark" style="box-shadow: 1px 2px 10px">
        <h1 class="text-center ">Student Information</h1>
        @if ($gt = Session::get('grt'))
            <div class="alert alert-success">
                {{ $gt }}
            </div>
        @endif
        @if ($gt = Session::get('err'))
            <div class="alert alert-danger text-center">
                {{ $gt }}
            </div>
        @endif

        <div><a href="/student/create" class="btn btn-primary">New Student</a></div> <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Fees</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Date Of Joining</th>
                    <th>Courses</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $info)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @php
                            $allcourse=[];
                            $allcourseid=[];
                            $firstcourse="";
                            foreach($info->allcourse as $cid){
                    if(isset($cid['courseId']['name'])){
                        if(!$firstcourse){
                            $firstcourse=$cid['courseId'];
                        }
                         $allcourse[]=$cid['courseId']['name'];
                         $allcourseid[$cid['courseId']['id']]=$cid['courseId']['name'];
                    }
                
                }
                     $allcourse=implode(',',$allcourse);
                            @endphp
                    
           
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$info['id']}}">
    Fee Structure
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modal_{{$info->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$info['name']}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="/studentcourse/{{$info['id']}}" id="frm_{{$info['id']}}">
        <div class="modal-body">
          

            <div class="container borderd" style="box-shadow: 1px 2px 10px">
                <h1 class="text-center">Course</h1>
                @foreach ($errors->all() as $e)
                    <div class="alert alert-danger">{{ $e }}</div>
                @endforeach
                    @csrf
                    <div class="mb-3">

                        <label for="cname">Select Course</label>
                        {{$firstcourse}}
                          <select  name="name"  class="form-select"  onchange="loadInfo(frm_{{$info['id']}})" id="name" required >
                           @foreach($allcourseid as $key=>$value)
                           <option value="{{$key}}">{{$value}}</option>
                           @endforeach
           
           
                       </select>
                        </div>
        
                    <div class="mb-3">
                        <h4><label for="fees" style="color: #960dad"> Course Fees:</label></h4>
 <input type="number" class="form-control" readonly   name="fees" id="fees"  required>
                    </div>
        
                    <div class="mb-3">
                        <h4><label for="discount" style="color: #960dad"> Discount:</label></h4>
                        <input type="number" class="form-control"                       onchange="changefees(frm_{{$info['id']}})"1 onkeyup="changefees(frm_{{$info['id']}})"
                        min="0" max="100"
                        name="discount" id="discount" placeholder="Enter Discount">
                    </div><br>
        
                    <div class="mb-3">
                        <h4><label for="finalprice" style="color: #960dad">Final Fee</label></h4>
                        <input type="number" 
                        {{-- value=""{{$firstcourse['fees']-$firstcourse['fees']*$firstcourse['discount']/100}} --}}
                        onchange="changefees(frm_{{$info['id']}})"
                        class="form-control" name="finalfees" id="finalfees" placeholder="Enter Final Fees">
                    </div>
                   
        
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </form>

    </div>
    </div>
  </div>


                     </td>
                        <td>
                            <a href="/student/{{ $info['id'] }}/edit"class="link-offset-2 link-underline-opacity-0">
                                {{ $info['name'] }}
                            </a>
                        </td>
                       
                        <td><a href="tel:{{ $info['mobile'] }}">{{ $info['mobile'] }} </a> </td>
                      
                      
                        <td>{{ $info['doj'] }}</td>
                        {{-- <td>
                          @foreach($info->allcourse as $cid )
                          {{$cid['courseId']['name']."  , "}}
                              
                          @endforeach
                          </td> --}}
                          <td>
                            {{$allcourse}}
                          </td>

                        {{-- <td>
                    <form method="post" action="/student/{{$info['id']}}">
                        @csrf
                    @method('delete')
                    <button class="button-82-pushable" role="button" onclick="return confirm('Do You Really Want To Delete')" >
                        <span class="button-82-shadow"></span>
                        <span class="button-82-edge"></span>
                        <span class="button-82-front text">
                          Delete
                        </span>
                      </button>
                          --}}
                        </form>
                        {{-- </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <style>
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


        /* CSS */
        .button-82-pushable {
            position: relative;
            border: none;
            background: transparent;
            padding: 0;
            cursor: pointer;
            outline-offset: 4px;
            transition: filter 250ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-82-shadow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: hsl(0deg 0% 0% / 0.25);
            will-change: transform;
            transform: translateY(2px);
            transition:
                transform 600ms cubic-bezier(.3, .7, .4, 1);
        }

        .button-82-edge {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: linear-gradient(to left,
                    hsl(340deg 100% 16%) 0%,
                    hsl(340deg 100% 32%) 8%,
                    hsl(340deg 100% 32%) 92%,
                    hsl(340deg 100% 16%) 100%);
        }

        .button-82-front {
            display: block;
            position: relative;
            padding: 12px 27px;
            border-radius: 12px;
            font-size: 1.1rem;
            color: white;
            background: hsl(345deg 100% 47%);
            will-change: transform;
            transform: translateY(-4px);
            transition:
                transform 600ms cubic-bezier(.3, .7, .4, 1);
        }

        @media (min-width: 768px) {
            .button-82-front {
                font-size: 1.25rem;
                padding: 12px 42px;
            }
        }

        .button-82-pushable:hover {
            filter: brightness(110%);
            -webkit-filter: brightness(110%);
        }

        .button-82-pushable:hover .button-82-front {
            transform: translateY(-6px);
            transition:
                transform 250ms cubic-bezier(.3, .7, .4, 1.5);
        }

        .button-82-pushable:active .button-82-front {
            transform: translateY(-2px);
            transition: transform 34ms;
        }

        .button-82-pushable:hover .button-82-shadow {
            transform: translateY(4px);
            transition:
                transform 250ms cubic-bezier(.3, .7, .4, 1.5);
        }

        .button-82-pushable:active .button-82-shadow {
            transform: translateY(1px);
            transition: transform 34ms;
        }

        .button-82-pushable:focus:not(:focus-visible) {
            outline: none;
        }
    </style>
    <script>
       function loadInfo(frm){

        
        $.ajax({
            url:'/course/'+frm.name.value,
            type:"get",
            success:function(r){

                // console.log(r);
                  frm.fees.value=r.fees;
                  frm.discount.value=r.discount; 
                  frm.finalfees.value=r.fees-r.fees*r.discount/100;
            }
        });
    }
    function changefees(frm){
        frm.finalfees.value=frm.fees.value-frm.fees.value*frm.discount.value/100; 
        //frm.discount.value=frm.fees.value/frm.finalfees.value*100; 
    }
    function changefees2(frm){
        frm.discount.value=(frm.fees.value-frm.finalfees.value)*100/frm.fees.value;
    }
  
    </script>
@endsection
{{-- value="{{$firstcourse['fees']}}" --}}