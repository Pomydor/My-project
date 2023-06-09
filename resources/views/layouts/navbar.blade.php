<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
<nav class="navbar navbar-expand-lg  navbar-light  sticky-top" stlye="opacity: 0.1; ">
    <!--Logo -->
    <div class="navbar-brand"></div>
    <a href="{{route('home')}}"><img src="/public/assets/img/logo-invinsibule-1.png" class="logo"
                                     style="  width: 130px; height: 100px;"></a>
    <!-- Burger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--Menu -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="    margin: auto;">

            <li class="nav-item active">

                <button onclick="getCatalog ( '{{route( 'catalog' ) }}' )" type="button" class="btn btn-outline-dark"
                        style=" border-radius: 100px;">Каталог Игр
                </button>
            </li>
            <form method="get" action="{{ route('products.serach') }}" class="form-inline align-self-end">
                <input class="form-control mr-sm-2  search-form" style="border-radius: 100px;" type="search" name="s"
                       placeholder="Search" value="{{ isset($s) ? $s : null }}">
                </input>
                <button class="btn btn-outline-dark my-2 my-sm-0" style=" border-radius: 100px;" type="submit">Search
                </button>
            </form>
            <li>
                @guest
                    <ul>
                        <div class="col-lg">
                            <button type="button" class="btn  btn-primary btn-auth"><a class="dropdown-item"
                                                                                       href="{{route('login.create')}}">Вход</a>
                            </button>

                            <button type="button" class="btn btn-auth btn-primary "><a class="dropdown-item"
                                                                                       href="{{route('register.create')}}"><i
                                        class="fa-solid fa-user-pen"></i>Регистрация</a></button>

                        </div>
                        @endguest

                        <button onclick="getCart ( '{{route( 'cart.show' ) }}' )" type="button" class="btn"
                                style=" border-radius: 100px;">
                            <i class="fa-solid fa-cart-shopping"> <span
                                    class="badge badge-black cart-gty-number mini-cart-gty"> {{ session('cart_gty') ?? 0 }} </span>
                            </i>
                        </button>

                        @auth
                            <a href="{{ route('profile') }}">
                                <i class="fa fa-user" aria-hidden="true"></i></a>
                        @endauth

                        @auth
                            <a href="{{ route('logout') }}">
                                <i class="fa-solid fa-door-closed icon"></i></a>
                        @endauth
                        @if(Auth::check() && Auth::user()->is_admin )
                            <a class="text-black " style="text-decoration: none" href="{{route('admin')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-tools" viewBox="0 0 16 16">
                                    <path
                                        d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                                </svg>
                            </a>
                            </p>
                        @endif
                    </ul>

                    <div>

                    </div>
            </li>
        </ul>
    </div>
</nav>

