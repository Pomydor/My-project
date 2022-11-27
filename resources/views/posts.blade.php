<!doctype html>
<html lang=ru>
<head><!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet"  href="public/css/app.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">    
   
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



            @guest
            <a href="#" class="text-black btn btn-outline-warning" style="text-decoration: none" > О на нас </a>
<a href="{{ url('register') }}" class="text-black btn btn-outline-warning" style="text-decoration: none"> Регистрация </a>
<a href="{{ route('login') }}" class="text-black btn btn-outline-warning" style="text-decoration: none"> Авторизация </a>
            @endguest
            @auth
<a href="#" class="text-black btn btn-outline-warning" style="text-decoration: none"> Создать пост </a>
<a href="{{ url('logout') }}" class="text-black btn btn-outline-warning" style="text-decoration: none"> Выход </a>
            @endauth




</div>
</div>
</header>
<br>

<form action="{{route('post')}}" method="post">
    @csrf
    <div class="row mb-4 ">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="name" name="name" class="form-control" />
                <label class="form-label" for="form6Example1">Название</label>
            </div>
        </div>
    </div>
        <br>
        <div class="mb-3">
            <div class="form-outline">
                <label class="form-label" for="description">Описание</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                <div id="errorDescription" class="text-danger"></div>
            </div>
        </div>
    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="category">Категория</label>
            <select name="category" id="category" class="form-select">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div class="text-danger" id="errorCategory"></div>
        </div>
    </div>

    <div class="mb-3">
            <label class="form-label" for="image">Фотография</label>
            <input class="form-control" name="image" id="image" type="file">
            <div id="errorImage" class="text-danger"></div>
        </div>

    <div class="mb-3 text-end">
        <button id="btnAddPost" type="submit" class="btn btn-dark">Отправить</button>
    </div>
    </div>

</form>
<br>
<div class="container ">
    <div class="row">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success" style="margin-left: -180px">
                {{session('success')}}
            </div>
        @endif
    </div>
</div>
@yield('content')















<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</nav>
</div>
</div>
</body>
</html>
