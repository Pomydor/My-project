@extends('layouts.layout')

@section('content')
 <!-- Carousel  -->
 
 
 <div id="myCarousel" class="vertical carousel slide" data-bs-ride="carousel" >

 
  <div class="carousel-inner" >
  <div class="carousel-item active " >
    <img src="https://www.powergamingnetwork.com/wp-content/uploads/2021/08/rg.jpg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
        <h1 class="Menu" >Resender Evil 4 предзаказ</h1>
        <h1 class="Menu">2999р.</h1>
      </div>
    </div>
    <div class="carousel-item">
    <img src="https://i.playground.ru/e/jAhGTJ4vcbAdcyNw4kfsWA.jpeg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
        <h1 class="Menu">God of War Ragranor</h1>
        <h2 class="Menu">2999р.</h2>
      </div>  
  </div>
    <div class="carousel-item">
    <img src="https://gamemag.ru/images/cache/News/News167763/f44725b154-3_2780x1200.jpg" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
        <h1>Calisto Protocol</h1>
        <h2>2999р.</h2>
      </div>  
  </div>
  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <div class="carousel-indicators" >
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 2"></button>
 </div>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
       

<div class="wrapper mt-5">
<div class="container">
	<div class="row">
  <div class="col-md-4" style="display: contents;">
 


  @yield('content')
    <div class="product-cards mb-5">

    @foreach ($products as $product)
        <div class="product-card">
            <div class="offer">
                @if($product->hit)
                <div class="offer-hit">Hit</div>
                @endif
                @if($product->sale)
                <div class="offer-sale">Sale</div>
                @endif
            </div>

            <form action="{{route('cart.add')}}" method="post" class="addtocart">
                 @csrf 
            <div class="profile-card-2"><div class="hover-effect-btn">
              
                <a href="{{route('products.show',['slug'=>$product->slug])}}"><img src="{{$product->getImage()}}" alt=""></a> 
               
                <div class="card-caption">
                <div class="card-title">
                    <a href="{{route('products.show',['slug'=>$product->slug])}}" >{{$product->title}}</a>
                </div>
                 
                 <div class="overlay"></div>
                  <div class="button">   <button type="submit" class="btn btn-card-buy btn-block cart-addtocart">
                    <i class="fas fa-cart-arrow-down"></i> Купить
                </button></div>
</div> 
            </div>
            
                 @auth
                 
                <div class="card-price text-center">
                    @if($product->old_price)
                    <del>{{$product->old_price}} руб.</del>
                    @endif
                    
                    {{$product->price}} руб.
                </div>

                
              
                 <div class="input-group" >
                    <input type="hidden" class="form-control" name="gty" value="1">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="input-group-append">
                    </div>
                    
 
                 </div>
                 @endauth
                </form>
                @if($product->status)
                    <p class="text-success">В наличии</p>
                @else
                    <p class="text-danger">Нет в наличии</p>    
                @endif
            </div>
            
        </div><!-- /product-card -->

@endforeach

 


    </div><!-- /product-cards -->
</div>
      
      <div class="pagination-admin">
        <nav aria-label="Page navigation example">
            {{$products->links()}}
    </nav>
    
    </div>

  <!-- Footer -->
    <div class="container">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <p class="text-muted">© 2022</p>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>
  </footer>
</div>@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

 <!-- Back to top button -->

  <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="fas fa-arrow-up"></i>
</button>