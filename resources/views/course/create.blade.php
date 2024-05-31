@extends('layouts.app')
@section('content')


    <div class="container borderd" style="box-shadow: 1px 2px 10px">
        <h1 class="text-center">Course</h1>
        @foreach ($errors->all() as $e)
            <div class="alert alert-danger">{{ $e }}</div>
        @endforeach
        <form method="post" action="/course/">
            @csrf
            <div class="mb-3">
                <h4><label for="name" style="color: #960dad">Course Name:</label></h4>
                <input type="text" class="form-control"name="name" id="name" placeholder="Enter Course Name"
                    required>
            </div>

            <div class="mb-3">
                <h4><label for="fees" style="color: #960dad"> Course Fees:</label></h4>
                <input type="number" class="form-control"name="fees" id="fees" placeholder="Enter Fees" required>
            </div>

            <div class="mb-3">
                <h4><label for="discount" style="color: #960dad"> Discount:</label></h4>
                <input type="number" class="form-control"name="discount" id="discount" placeholder="Enter Discount">
            </div>

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

        @mixin dots($count) {
  $text-shadow: ();
  @for $i from 0 through $count {
    $text-shadow: $text-shadow,
      (-0.5+ (random()) * 3) +
        em
        (-0.5+ (random()) * 3) +
        em
        7px
        hsla(random() * 360, 100%, 50%, 0.9);
  }
  text-shadow: $text-shadow;
}

html {
  font: 5vmin/1.3 Serif;
  overflow: hidden;
  background: #123;
}

body,
head {
  display: block;
  font-size: 52px;
  color: transparent;
}

head::before,
head::after,
body::before,
body::after {
  position: fixed;
  top: 50%;
  left: 50%;
  width: 3em;
  height: 3em;
  content: ".";
  mix-blend-mode: screen;
  animation: 44s -27s move infinite ease-in-out alternate;
}

body::before {
  @include dots(40);
  animation-duration: 44s;
  animation-delay: -27s;
}

body::after {
  @include dots(40);
  animation-duration: 43s;
  animation-delay: -32s;
}

head::before {
  @include dots(40);
  animation-duration: 42s;
  animation-delay: -23s;
}

head::after {
  @include dots(40);
  animation-duration: 41s;
  animation-delay: -19s;
}

@keyframes move {
  from {
    transform: rotate(0deg) scale(12) translateX(-20px);
  }
  to {
    transform: rotate(360deg) scale(18) translateX(20px);
  }
}

        
        
    </style>
@endsection
