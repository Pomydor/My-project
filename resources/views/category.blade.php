<!doctype html>
<html lang=ru>
<head><!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"  href="public/css/app.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
<body>
<header>
    <div class="navbar shadow-sm">
        <div class="container">

            <a href="/public" class="navbar-brand d-flex align-items-center">
                <img src = "/img/bf.png" alt="" style="width: 15%; height: 15%">
                <strong class="text-black" style="text-decoration: none">Home</strong>
            </a>


            <a href="#">

                <img src="{"
                     alt="" height="40px">

            </a>



            {{--            @guest--}}
            <a href="#" class="text-black btn btn-outline-warning" style="text-decoration: none" > О на нас </a>
            <a href="{{ url('register') }}" class="text-black btn btn-outline-warning" style="text-decoration: none"> Регистрация </a>
            <a href="{{ route('login') }}" class="text-black btn btn-outline-warning" style="text-decoration: none"> Авторизация </a>
            {{--            @endguest--}}
            {{--            @auth--}}
            <a href="#" class="text-black btn btn-outline-warning" style="text-decoration: none"> Создать пост </a>
            <a href="{{ url('logout') }}" class="text-black btn btn-outline-warning" style="text-decoration: none"> Выход </a>
            {{--            @endauth--}}




        </div>
    </div>
</header>
<br>
<form action="{{route('storee')}}" method="post" enctype="multipart/form-data">
@csrf
