@extends('layouts.app')
@section('content')


    <div class="container borderd" style="box-shadow: 1px 2px 10px">
        <h1 class="text-center">Course</h1>
        @foreach ($errors->all() as $e)
            <div class="alert alert-danger">{{ $e }}</div>
        @endforeach
        <form method="post" action="/course/">
            @csrf
            {{$scinfo}}
            <div class="mb-3">
                <h4><label for="name" style="color: #960dad">Course Name:</label></h4>
                <input type="text" class="form-control" readonly id="name" placeholder="Enter Course Name"
                    required value="{{$scinfo['name']}}">
            </div>

            <div class="mb-3">
                <h4><label for="fees" style="color: #960dad"> Course Fees:</label></h4>
                <input type="number" class="form-control" id="fees" value="{{$scinfo['fees']}}" placeholder="Enter Fees" required>
            </div>

            <div class="mb-3">
                <h4><label for="discount" style="color: #960dad"> Discount:</label></h4>
                <input type="number" class="form-control" id="discount" value="{{$scinfo['discount']}}" readonly placeholder="Enter Discount">
            </div>

            <div class="mb-3">
                <h4><label for="deposite" style="color: #960dad">Deopsite:</label></h4>
                <input type="number" class="form-control" id="deposite" value="{{$scinfo['']}}"  placeholder="Enter Depostie Amount">
            </div>
            <div class="mb-3">
                <h4><label for="finalprice" style="color: #960dad">Fees to Be Submitted:</label></h4>
                <input type="number" class="form-control" id="finalprice" disabled value="{{$scinfo['finalprice']}}" >
            </div>
            @php
                $feestobesubmitted=$scinfo['finalprice'];
                @endphp
                @foreach ($scubfo->submittedFees as $feesinfo )
                @php
                    $feestobesybmitted-=$feesinfo['fees']
                @endphp
                <div class="mb-3">
                    <label for="submitedfees">Submited Fees({{$feesinfo->dateofsubmit}})</label>
                    <input type="number" class="form-control" disabled value="{{$feesinfo['fees']}}">
                </div>
               @endforeach
               <div class="mb-3">
                <label for="">Deposite</label>
                <input type="number" class="form-control" placeholder="Enter Deposite Amount" id="dp" onchange="df.value=finalprice.value-this.value-{{$feestobesubmitted}}" onkeyup="df.value=finalprice.value-this.value-{{$feestobesubmitted}}" max="{{$scinfo['finalprice']}}" name="fees" >
               </div>
               <div class="mb-3">
                <label for="df">Due Fees:</label>
                <input type="number" placeholder="Due Fees" id="df" value="{{$feestobesubmitted}}" class="form-control" >
               </div>
               <div class="mb-3">Date Of Fees Submit:</div>
               <input type="date" class="form-control" placeholder="Dateofsubmit" value="{{date('Y-m-d')}}">
            </h4>
            <div class="mb-3 text-center " id="btn">
                </h4>
                <button class="button-73">SAVE</button>
            </div><br>

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
            font-family: -apple-system, sans-serif;
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
