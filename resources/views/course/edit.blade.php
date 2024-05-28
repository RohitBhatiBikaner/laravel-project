@extends('layouts.app')
@section('content')
    
<div class="container border border-dark " style="box-shadow: 1px 2px 10px">
    <h1 class="text-center" >Course Edit</h1>
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
        <button class="button-82-pushable" role="button">
            <span class="button-82-shadow"></span>
            <span class="button-82-edge"></span>
            <span class="button-82-front text">
              UPDATE
            </span>
          </button>
         
    </div>
    
</form>
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
        transform
        600ms
        cubic-bezier(.3, .7, .4, 1);
    }
    
    .button-82-edge {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 12px;
      background: linear-gradient(
        to left,
        hsl(340deg 100% 16%) 0%,
        hsl(340deg 100% 32%) 8%,
        hsl(340deg 100% 32%) 92%,
        hsl(340deg 100% 16%) 100%
      );
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
        transform
        600ms
        cubic-bezier(.3, .7, .4, 1);
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
        transform
        250ms
        cubic-bezier(.3, .7, .4, 1.5);
    }
    
    .button-82-pushable:active .button-82-front {
      transform: translateY(-2px);
      transition: transform 34ms;
    }
    
    .button-82-pushable:hover .button-82-shadow {
      transform: translateY(4px);
      transition:
        transform
        250ms
        cubic-bezier(.3, .7, .4, 1.5);
    }
    
    .button-82-pushable:active .button-82-shadow {
      transform: translateY(1px);
      transition: transform 34ms;
    }
    
    .button-82-pushable:focus:not(:focus-visible) {
      outline: none;
    }
    </style>
@endsection