@extends('admin-layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/vertical-carousel.css') }}">
    <div class="container mt-5">

        <h5 style="text-align:center">Заказ №{{ $order->id }}</h5>
        <table class="table">

            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название товара</th>
                <th scope="col">Количество товара</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->gty }}</td>
                    <td>{{ $product->price  }} рублей</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
   <a class="dropdown-item" href="{{route('admin.orders-table')}}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
            </svg></a>
@endsection
