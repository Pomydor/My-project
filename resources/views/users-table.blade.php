   
@extends('layouts.layout')

@section('content')
<div class="container mt-5">
   <table class="table">
      <h1 style="text-align:center">Пользователи</h1>
      <thead>
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Роль</th>
            <th scope="col">Функция</th>
         </tr>
      </thead>
      <tbody>
         @foreach($users as $user)
            <tr>
               <th scope="row">{{ $user->id }}</th>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->is_admin ? 'Администратор' : 'Пользователь' }}</td>
               <td>
                  @if($user->id != auth()->user()->id)
                     <a class="btn btn-primary" href="{{ route('admin.user.change-role', ['user' => $user]) }}">{{ $user->is_admin ? 'Сделать пользователем' : 'Сделать админом' }}</a>
                     @else
                     <a class="btn btn-success" disabled>Вы</a>
                  @endif
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
   {{ $users->links() }}
</div>
@endsection