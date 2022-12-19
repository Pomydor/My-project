@extends('layouts.layout')

@section('title')@parent :: {{ $product->title }}
@endsection

@section('content')
  
<form action="{{route('cart.add')}}" method="post" class="addtocart">
                 @csrf 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
            <img src="{{$product->getImage()}}" alt="{{$product->title}}" class="img-thumbnail"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
            </div>
            <div class="ms-3" style="margin-top: 130px;">
            <h1>{{$product->title}}</h1>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #fffff;">
            <div class="col col-lg-9 col-xl-7">
              <div>
                <p>Категория: <a href="{{route('categories.show',['slug'=>$product->category->slug]) }}">{{$product->category->title}}</a></p>
              </div>
              <div>
                <p>Разработчик: <a href="{{route('categories.show',['slug'=>$product->category->slug]) }}">{{$product->razrab}}</a></p>
              </div>
              <div>
                <p>Издатель: <a href="{{route('categories.show',['slug'=>$product->category->slug]) }}">{{$product->izdatel}}</a></p>
              </div>
              <div class="px-3">
              @if($product->status)
                    <p class="text-success">В наличии</p>
                @else
                    <p class="text-danger">Нет в наличии</p>    
                @endif
              </div>
              <div>
       
        </span></li>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1"> </p>
              <div class="p-4" style="background-color: #fffff;">
                 <button type="submit" class="btn btn-card-buy btn-block cart-addtocart">В корзину</button>
                 <p>Цена: <span class="card-price text-center">
            @if($product->old_price)
            <del><small>@price_format($product->old_price) руб.</small></del>
            @endif
            @price_format($product->price) руб.
              </div>
            </div>

            <p>{{$product->content}}</p>
            
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent photos</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row g-2">
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>










   
<!-- Footer -->
<div class="container">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <p><img src="/public/assets/img/logo-invinsibule-1.png" style="width:200px;" ></p>

    </div>
 
    <div class="col mb-3">
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ЛИДЕРЫ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">НОВИНКИ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПРЕДЗАКАЗЫ</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПОДБОРКИ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">СКИДКИ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПОДАРОЧНЫЕ КАРТЫ</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПОДДЕРЖКА</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">БЛОГ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">О КОМПАНИИ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">КОНТАКТЫ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ВАКАНСИИ</a></li>
      </ul>
    </div>
  </footer>
</div>
@endsection
