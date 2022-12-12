@extends('layouts.layout')

@section('title')@parent :: {{ $category->title }}
@endsection

@section('content')
    <div class="product-cards mb-5">

    <div class="col-md-12">
       <h1>Список Гитар</h1>
    @forelse ($products as $product)
        <div class="product-card">
            <div class="offer">
                @if($product->hit)
                <div class="offer-hit">Hit</div>
                @endif
                @if($product->sale)
                <div class="offer-sale">Sale</div>
                @endif
                @if($product->dlc)
                <div class="offer-sale">Dlc</div>
                @endif
            </div>
            <div class="card-thumb">
                <a href="{{route('products.show',['slug'=>$product->slug])}}">
                    <img src="{{$product->getImage()}}" alt="">
                </a>
            </div>
            <div class="card-caption">
                <div class="card-title">
                    <a href="{{route('products.show',['slug'=>$product->slug])}}">{{$product->title}}</a>
                </div>
                <div class="card-price text-center">
                    @if($product->old_price)
                    <del><smal>{{$product->old_price}} реб.</smal></del>
                    @endif
                    
                    {{$product->price}} руб.
                </div>

                <form action="{{route('cart.add')}}" method="post" class="addtocart">
                 @csrf 
                 <div class="input-group">
                    <input type="text" class="form-control" name="gty" value="1">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-block cart-addtocart" type="submit">
                            <i class="fas fa-cart-arrow-down"></i> Купить
                        </button>
                    </div>
                 </div>
                </form>
               
                <div class="item-status"><i class="{{$product->status->icon}}"></i>{{$product->status->title}}</div>
            </div>
        </div><!-- /product-card -->
        @empty
        <p>В этой категории пусто...</p>
@endforelse
       
</div>

</div><!-- /product-cards -->

@if (count($products))
<div class="col-md-12">
    <nav aria-label="Page navigation example">
        {{ $products->links() }}
    </nav>
</div>
@endif
    
@endsection
