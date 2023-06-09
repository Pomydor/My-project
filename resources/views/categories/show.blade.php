@extends('layouts.layout')

@section('content')


    <div class="wrapper mt-5">
        <div class="container">
            <div class="row">

                <h1>Поиск по запросу {{ isset($s) ? $s : null }}</h1>
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
                                    @if($product->dlc)
                                        <div class="offer-dlc" style="background-color: #5a23e2;">Dlc</div>
                                    @endif
                                </div>

                                <form action="#" method="get" class="addtocart">
                                    @csrf
                                    <div class="profile-card-2" style="">
                                        <div class="hover-effect-btn">

                                            <a href="{{route('products.show',['slug'=>$product->slug])}}"><img
                                                    src="{{$product->getImage()}}" alt=""></a>

                                            <div class="card-caption">
                                                <div class="card-title">
                                                    <a href="{{route('products.show',['slug'=>$product->slug])}}">{{$product->title}}</a>
                                                </div>

                                                <div class="overlay"></div>
                                                <div class="button">
                                                    <button type="submit"
                                                            class="btn btn-card-buy btn-block cart-addtocart">
                                                        <i class="fas fa-cart-arrow-down"></i> Купить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        @auth

                                            <div class="card-price text-center">
                                                @if($product->old_price)
                                                    <del>{{$product->old_price}} руб.</del>
                                                @endif

                                                {{$product->price}} руб.
                                            </div>
                                            <div class="input-group">
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
                            <svg class="bi me-2" width="40" height="32">
                                <use xlink:href="#bootstrap"></use>
                            </svg>
                        </a>
                        <p><img src="/public/assets/img/logo-invinsibule-1.png" style="width:200px;"></p>

                    </div>

                    <div class="col mb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ЛИДЕРЫ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">НОВИНКИ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПРЕДЗАКАЗЫ</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПОДБОРКИ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">СКИДКИ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПОДАРОЧНЫЕ КАРТЫ</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ПОДДЕРЖКА</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">БЛОГ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">О КОМПАНИИ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">КОНТАКТЫ</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ВАКАНСИИ</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
            @endsection


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
                    crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
                    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
                    crossorigin="anonymous"></script>
            </body>

            <!-- Back to top button -->

            <button
                type="button"
                class="btn btn-danger btn-floating btn-lg"
                id="btn-back-to-top"
            >
                <i class="fas fa-arrow-up"></i>
            </button>
