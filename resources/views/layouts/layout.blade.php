<!doctype html>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title', 'Laravel Shop')</title>
<head>
    
 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/front/css/vertical-carousel.css') }}">

</head>
<body>

@include('layouts.navbar')


            @yield('content')
                
        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /wrapper -->

<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-cart-product" data-bs-dismiss="modal">Закрыть</button>
                <a href="{{route('cart.checkout')}}" class="btn btn-primary btn-cart   @if (empty(session(' cart ' ))) d-none @endif" >Оплата Заказа</a>
                <button type="button" onclick="clearCart(' {{ route('cart.clear') }} ')" class="btn btn-danger btn-cart  @if (empty(session(' cart ' ))) d-none @endif" >Очистить корзину</button>
            </div>
        </div>
    </div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
</html>
