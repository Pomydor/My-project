@extends('layouts.layout')

@section('title', 'Laravel Shop :: Home')

@section('content')

<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Dark card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  
<div class="col-md-12">
    <h1>Оформление заказа</h1>
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
                        <H3  align="right">Кол : {{session('cart_gty')}}</h3>
                    </tr>
             
</div>
</div>
</div>
        <form method="post" action="{{route('cart.checkout')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="text" class="form-control" id="note" name="note" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @else
        <h4>Корзина пуста</h4>
        @endif
</div>
@endsection