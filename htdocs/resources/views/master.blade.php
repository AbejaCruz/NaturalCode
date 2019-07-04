<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styleSmall.css') }}" rel="stylesheet" type="text/css">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="images/favicon.png" />

    <!--notificaciones-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="push.min.js"></script>
    <script src="java.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

</head>

<body>

    <header id="header" class="header">
        <img src="{{ asset('img/logoC.png') }}" alt="" id="imgLogo">
        <div class="header-right">
            <a class="active" href="index.html">INICIO</a>
            <a href="#contact">CONTACTO</a>
            <a href="#about">ACERCA DE</a>
            
        </div>
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </header>

    @yield('content');

</body>

</html>