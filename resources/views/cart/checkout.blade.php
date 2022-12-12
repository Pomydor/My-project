@extends('admin-layout')

@section('content')

<div class="card text-white bg-dark mb-3" >
  <div class="card-header">    <h1>ОПЛАТА ЗАКАЗА</h1></div>
  <div class="card-body">
  
<div class="col-md-12">
    @if($errors->any())
    <div class="alert alert-danger" >
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(!empty(session('cart')))
<div class="table-responsive">
<table class="table table-hover">
                

                    <tr>
                        <H2  align="right">Общая сумма : {{session('cart_total')}}</h2>
                        <H3  align="right">МОЙ ЗАКАЗ  : {{session('cart_gty')}}</h3>
                        
                    </tr>
                    
</div>
</div>
</div>
        <form method="post" action="{{route('cart.checkout')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" style="max-width: 300px" class="form-control" id="email" name="email" required>
            </div>
            <div class="b-cart__left-side" bis_skin_checked="1">
<h2> оплата заказа</h2>
<a class="btn btn-primary" href="">Система быстрых платежей</a>
<a class="btn btn-primary" >Банковские карты</a>
<a class="btn btn-primary">QIWI</a>
<a class="btn btn-primary" data-tab-index="417" bis_skin_checked="1">ЮMONEY</a>
</div>
            <button type="submit" class="btn btn-primary">Оформить</button>
            
        </form>
        @else
        <h4>Корзина пуста</h4>
        @endif
</div>
@endsection




