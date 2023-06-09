@extends('admin')




    <div class="container mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Сумма</th>
                <th scope="col">Количество товаров</th>
                <th scope="col">Почта</th>
                <th scope="col">Создан</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->total }} рублей</td>
                    <td>{{ $order->gty }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->note }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a class="btn btn-primary"
                           href="{{ route('admin.show-order', ['order' => $order]) }}">Просмотр</a>
                        <a class="btn btn-danger"
                           href="{{ route('admin.delete-order', ['order' => $order]) }}">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>

