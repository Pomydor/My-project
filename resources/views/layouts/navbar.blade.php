<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">

<nav class="navbar navbar-panel navbar-expand-lg   sticky-top"><a class="navbar" href="{{route('home')}}" style="color: black"  ><img src="/public/assets/img/logo-invinsibule-1.png" class="logo" ></a>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Каталог Игр</button>
            </li>
            <!-- @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.show', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
            </li>
            @endforeach -->
            
        </ul>
        <form method="get" action="{{ route('products.serach') }}" class="form-inline align-self-end">
            <input class="form-control mr-sm-2  search-form" type="search" name="s" placeholder="Search" value="{{ isset($s) ? $s : null }}">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button></input>
        </form>
        
  <button onclick="getCart ( '{{route( 'cart.show' ) }}' )" type="button" class="btn btn-outline-danger" style="    margin-top: -15px" >
        <i class="fa-solid fa-cart-shopping" > <span class="badge badge-black mini-cart-gty"> {{ session('cart_gty') ?? 0 }} </span> </i>
      </button>
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="fa-solid fa-bars"></i>
</button>
       

    </div>
</div>
</nav>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
	  <div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	  </div>
	  <div class="offcanvas-body">
	   @guest
		<button type="button" class="btn  btn-primary" ><a class="dropdown-item" href="{{route('login.create')}}">Вход</a></button>
		<button type="button" class="btn  btn-primary" ><a class="dropdown-item" href="{{route('register.create')}}"><i class="fa-solid fa-user-pen"></i>Регистрация</a></button>
		@endguest
		@auth
			  <a href="{{ route('profile') }}">
				<i class="fa fa-user" aria-hidden="true"></i></a>
			<!-- <i class="fa fa-sign-out" aria-hidden="true"></i></a> -->
			  <a href="{{ route('logout') }}">
			  <i class="fa-solid fa-door-closed icon" ></i></a>
			@endauth
		</div>
	  </div>
	</div>


</html>