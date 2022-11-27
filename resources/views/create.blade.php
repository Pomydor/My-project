@extends('layouts.layout')

@section('title', 'Laravel Shop :: Home')

@section('content')

<form action="{{route('store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-4 ">
        <div class="col">
            <div class="form-outline">  
                <input type="text" id="title" name="title" placeholder="Название" class="form-control" />

            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="slug" >Описание</label>
            <textarea class="form-control" name="slug" id="slug" cols="30" rows="10"></textarea>
            <div id="errorDescription" class="text-danger"></div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="content" >Контент</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            <div id="errorDescription" class="text-danger"></div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="category" placeholder="Категории">Категория</label>
            <select name="category" id="category" class="form-select">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <div class="text-danger" id="errorCategory"></div>
        </div>
    </div>

<div class="mb-3">
    <label for="user" class="form-label"></label>
    <input type="hidden" id="user" name="user" placeholder="" class="form-control" value="{{auth()->user()->id}}">
    <div id="errorUser" class="text-danger"></div>
    <div class="mb-3">
        <label class="form-label" for="image">Фотография</label>
        <input class="form-control" name="image" id="img" type="file">
        <div id="errorImage" class="text-danger"></div>
    </div>
    <div class="row mb-4 ">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="price">Цена</label>
                <input type="text" id="price" name="price" class="form-control" />

            </div>
        </div>
    </div>

    <div class="mb-3 text-end">
        <button id="btnAddPost" type="submit" class="text-black btn btn-outline-warning">Отправить</button>
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

@endsection














<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</nav>
</div>
</div>
</body>
</html>
