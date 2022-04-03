@extends('layouts.backendapp')
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;

        }

        .conterner {
            width: 100%;
            height: 100vh;
            background: #2b323c;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .conterner h2 {
            font-size: 50px;
            font-weight: 600;
            color: rgba(238, 255, 0, 0.897);
            color: #fff;
        }

        .conterner > h2 > span {
            color: #fff724;
        }

    </style>
@endsection

@section('content')
    <div class="conterner">
        <h2> {{ Auth::user()->name }} <span class="auto-type"></span> </h2>
    </div>
@endsection

@section('cos.js')
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".auto-type", {
            strings: ["welcome to our Dashboard"],
            typeSpeed: 150,
            backSpeed: 100,
            loop: true
        });
    </script>
@endsection
