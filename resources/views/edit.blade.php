@extends('admin')
@section('title', 'SmartOk')


<link rel="stylesheet" href="{{ asset('assets/front/css/admin-edit.css') }}">
<form action="{{route('update', ['product' => $product])}}" style="margin-left: 300px;" method="post"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-4 ">
        <div class="col">
            <div class="form-outline">
                <label class="form-label" for="title">Название</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="{{ $product->title }}"/>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="slug">Slug</label>
            <textarea class="form-control" name="slug" id="slug" cols="30" rows="10"
                      placeholder="{{ $product->slug }}"></textarea>
            <div id="errorDescription" class="text-danger"></div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="content">Контент</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"
                      placeholder="{{ $product->content }}"></textarea>
            <div id="errorDescription" class="text-danger"></div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <label class="form-label" for="category">Категория</label>
            <select name="category_id" id="category" class="form-select">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($product->category_id == $category->id) selected
                        @endif>{{$category->title}}</option>
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
            <img class="img-cover rounded mt-3" src="{{ asset($product->img) }}" alt="Photo">
        </div>
        <div class="row mb-4 ">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="price">Цена</label>
                    <input type="text" id="price" name="price" class="form-control"
                           placeholder="{{ $product->price }}"/>

                </div>
            </div>
        </div>


        <button id="btnAddPost" type="submit" class="text-black btn btn-outline-info">Отправить</button>
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
            <div class="edit-message">
                {{session('success')}}
            </div>
        @endif
    </div>
</div>



