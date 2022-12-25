@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">


<div class="container justify-content-center">
    <h2 class="my-4">{{ $title ?? 'Заявки' }}</h2>
    <div class="row justify-content-center">
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
        @foreach($products as $product)
        <div class="col-3 d-flex flex-column m-3">
            <a href="{{route('products.show',['slug'=>$product->slug])}}"><img class="img-cover" src="{{$product->getImage()}}" alt=""></a>
            <h5 class="mt-2 mb-1">{{$product -> title}}</h5>
            <p class="mb-1">{{$product -> price}} руб.</p>
            <hr class="m-1">
            <p>{{$product->updated_at}}</p>
            <p class="fw-bold mb-1 mt-auto">Статус:
                @if($product->status)
                <span class="text-success">В наличии</span>
                @else
                <span class="text-danger">Нет в наличии</span>
                @endif
               
            </p> 
            <p class="m-0">
                <a href="{{route('admin.post.accept', ['id'=>$product->id])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-check"></i></a>
                <a href="{{route('admin.post.cancel', ['id'=>$product->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a>
            </p>
            <div class="mt-2 d-flex flex-wrap gap-2">
                <a class="btn btn-primary offer-admin-hit" href="{{ route('admin.post.changeHit', ['product' => $product]) }}">
                    {{$product->hit ? 'Убрать из хитов' : 'Добавить в хиты'}}
                </a>
                <a class="btn btn-primary offer-admin-sale" href="{{ route('admin.post.changeSale', ['product' => $product]) }}">
                    {{$product->sale ? 'Убрать из скидок' : 'Добавить в скидки'}}
                </a>
                <a class="btn btn-primary offer-admin-dlc" href="{{ route('admin.post.changeDlc', ['product' => $product]) }}">
                    {{$product->dlc ? 'Убрать из Длс' : 'Добавить в Длс'}}
                </a>
            </div>
        </div>
        @endforeach
    </div class="pagination-admin">
    <nav class="container mb-3 ">
        
        {{ $products->links() }}
    </nav>
    @endsection