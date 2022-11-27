@if(!empty(session('cart')))
<div class="table-responsive">
<table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Фото</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Кол-во</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $item)
                    <tr>
                <td><a href="{{ route('products.show',['slug'=>$item['slug']]) }}">
                    <img src="{{$item['img']}}" alt="{{$item['title']}}"></a>
                </td>
                        <td><a href="{{ route('products.show',['slug'=>$item['slug']]) }}">{{$item['title']}}</a></td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['gty']}}</td>
                                                <td>
                            <span class="text-danger del-item" data-action="{{ route ('cart.del.item', ['product_id'=>$item['product_id']]) }}">
                            <i class="fas fa-times"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    
                    <tr>
                        <td colspan="4" align="right"> Итого:  {{session('cart_gty')}}</td>
                    </tr>

                    <tr>
                        <td id="modal-cart-gty" colspan="4" align="right">   {{session('cart_gty')}}</td>
                    </tr>

                    <tr>
                        <td colspan="4" align="right">На сумму: {{session('cart_total')}}</td>
                    </tr>
                    </tbody>
                </table>
</div>
@else
<h3>Корзина пуста</h3>
@endif