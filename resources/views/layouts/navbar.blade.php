<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
<nav class="navbar navbar-expand-lg  navbar-light  sticky-top" stlye="opacity: 0.1; ">
    <!--Logo -->
    <div class="navbar-brand" ></div>
    <a href="{{route('home')}}"><img  src="/public/assets/img/logo-invinsibule-1.png" class="logo" style="  width: 130px; height: 100px;"></a>
    <!-- Burger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--Menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="    margin: auto;">
            <li class="nav-item active">
			<button onclick="getCatalog ( '{{route( 'catalog' ) }}' )" type="button" class="btn btn-outline-dark" style=" border-radius: 100px;" >Каталог Игр</button>
            </li>
              <form method="get" action="{{ route('products.serach') }}" class="form-inline align-self-end">
            <input class="form-control mr-sm-2  search-form" style="border-radius: 100px;" type="search" name="s" placeholder="Search" value="{{ isset($s) ? $s : null }}">
            </input><button class="btn btn-outline-dark my-2 my-sm-0" style=" border-radius: 100px;"  type="submit">Search</button></form>
             <li>
              @guest
              <li>
              <div class="col-lg"><button type="button" class="btn  btn-primary btn-auth" ><a class="dropdown-item" href="{{route('login.create')}}">Вход</a></button>

		<button type="button" class="btn btn-auth btn-primary " ><a class="dropdown-item" href="{{route('register.create')}}"><i class="fa-solid fa-user-pen"></i>Регистрация</a></button>
</li>
    @endguest
	
			<button onclick="getCart ( '{{route( 'cart.show' ) }}' )" type="button" class="btn" style=" border-radius: 100px;" >
        <i class="fa-solid fa-cart-shopping" > <span class="badge badge-black cart-gty-number mini-cart-gty"> {{ session('cart_gty') ?? 0 }} </span> </i>  
        </button>
        @auth
			  <a href="{{ route('profile') }}">
				<i class="fa fa-user" aria-hidden="true"></i></a>
        @endauth
        @auth
			  <a href="{{ route('logout') }}">
			  <i class="fa-solid fa-door-closed icon" ></i></a>
			@endauth
            </li>
        </ul>
    </div>
	<div>
</nav>

