@extends('admin-layout')

@section('title', 'KVINTO')

@section('content')
<div class="container mt-5">
   <h4>Заказ №{{ $order->id }}</h4>
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
               <td>{{ $product->price  }} рублей </td>
            </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection