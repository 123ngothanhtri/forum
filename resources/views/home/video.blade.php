@extends('home.layout')
@section('content')
    <style type="text/css">
        #preloader {
            position: fixed;
            top:0;
            background: lightgrey;
            height: 100vh;
            width: 100%;
            z-index: 9999
        }
        #yi{
            animation: example 1s linear infinite;
            font-size: 50px
        }
        #spinner1 {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        @keyframes example {
            0% {
                transform: rotate(0deg),
            }

            100% {
                transform: rotate(360deg)
            }
        }

    </style>
    <div id="preloader">
        <div id="spinner1" >
            <i class="fas fa-yin-yang" id="yi"></i>
        </div>
    </div>
    <div class="container">
        <div style="width:100%;height:0px;position:relative;padding-bottom:56.206%;"><iframe src="https://streamable.com/e/6fmq80?autoplay=1&nocontrols=1" frameborder="0" width="100%" height="100%" allowfullscreen allow="autoplay"
                style="width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;"></iframe></div>
    </div>
    <script>
        let loa = document.getElementById('preloader');
        window.addEventListener('load', () => {
            loa.style.display = 'none';
        })
    </script>
@endsection
