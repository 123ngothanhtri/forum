<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Genshin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Nunito', sans-serif
        }
        #animatehello{
            position: fixed;
            left: 50%;
            transform: translate(-50%,-100%);
            padding: 16px;
            z-index: 2222;
            animation: example 6s ease;
        }
        @keyframes example {
            0% {transform: translate(-50%,-100%)}
            15%{transform: translate(-50%,0)}
            85%{transform: translate(-50%,0);opacity: 1}
            100%{transform: translate(-50%,-100%);opacity: 0}
        }
    </style>
</head>


<body style="background: rgb(230, 230, 230)">
    
    @if (session('msg'))
        <div id="animatehello" class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('msg') }}
        </div>
    @elseif(session('er'))
        <div id="animatehello" class="alert-warning">
            <i class="fas fa-exclamation-circle"></i> {{ session('er') }}
        </div>
    @else
        <span id="alerthome"></span>
    @endif
    <nav class="navbar navbar-expand-md navbar-light bg-info">
        <div class="container">
            <a href="{{ url('/') }}">
                <img src="{{ asset('genshin.png') }}" height="30px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><b><i class="fas fa-home"></i> Trang chủ</b></a>
                    </li>
                    @if (Auth::guard('web')->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/moi-nguoi') }}"><b><i class="fas fa-users"></i> Mọi người</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/following') }}"><b><i class="fas fa-user-check"></i> Đang follow</b></a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/video') }}"><i class="fas fa-play-circle"></i><b> Video</b></a>
                        </li>
                    @endif
                </ul>
                @if (Auth::guard('web')->check())
                    <a class="text-decoration-none text-dark " href="{{ url('profile-user') }}">
                        <b>{{ Auth::guard('web')->user()->name }}</b>
                        @if (Auth::guard('web')->user()->image)
                            <img src="{{ asset(Auth::guard('web')->user()->image) }}" class="rounded-circle" style="width: 30px;height:30px ;object-fit:cover" alt="">
                        @else
                            <img src="{{ asset('avt.jpg') }}" class="rounded-circle" style="width:50px;height:50px ;object-fit:cover" alt="">
                        @endif
                    </a>
                @else
                    <a class="btn btn-success" href="{{ url('login-user') }}"> Đăng nhập</a>
                @endif
            </div>
        </div>
    </nav>
    @yield('content')



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>

</html>
