<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
<nav class="navbar navbar-expand-lg navbar-white   sticky-top" style="background-color: white ;">
<button  type="button" class="btn btn-outline-default"  ><a class="navbar-brand" href="{{route('home')}}" style="color: black"  >Shop</a></button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse nav-bar-main navbar-collapse" id="navbarColor01">
 
        <ul class="navbar-nav mr-right">
            <li class="nav-item active">
                <button   href="{{ route('home') }}" type="button" class="btn  nav-link button-main rounded-pill" href="index.html">Главная <span class="sr-only">(current)</span></button>
            </li>
            <li>
            <form method="get" action="{{ route('products.serach') }}" class="form-inline align-self-end">
            <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search" value="{{ isset($s) ? $s : null }}">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form> 
            </li>
            <!-- @foreach($categories as $category)
            <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.show' , ['slug' => $category->slug]) }}">{{ $category -> title }}</a>
            </li>
            @endforeach -->
            <li class="nav-item">
            <button onclick="getCart ( '{{route( 'cart.show' ) }}' )" type="button" class="btn btn-outline-danger" >
                    Корзина <span class="badge badge-black mini-cart-gty"> {{ session('cart_gty') ?? 0 }} </span> 
                </button>
            </li>
            
        </ul>
        
 
       

      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="fa-solid fa-bars"></i>
</button>


    <!-- <div class="row-cols-sm-2"> -->
            <!-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
            @if(session()->has('success'))
                <div class="alert alert-success" style="margin-left: 640px;">
                    {{session('success')}}
                </div>
            @endif
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
   @guest
    <button type="button" class="btn  btn-primary" ><a class="dropdown-item" href="{{route('login.create')}}">Login</a></button>
    <button type="button" class="btn  btn-primary" ><a class="dropdown-item" href="{{route('register.create')}}"><i class="fa-solid fa-user-pen"></i>Register</a></button>
    @endguest
    @auth
          <a href="{{ url('profile') }}">
            <i class="fa fa-user" aria-hidden="true"></i></a>
        <!-- <i class="fa fa-sign-out" aria-hidden="true"></i></a> -->
          <a href="{{ url('logout') }}">
          <i class="fa-solid fa-door-closed icon" ></i></a>
        @endauth

    
    <div class="dropdown mt-3">
      <button  class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Other
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
        <li><a class="dropdown-item" href="{{route('home')}}">Main</a></li>
      </ul>
    </div>
  </div>
</div>
