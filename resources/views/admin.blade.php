<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/front/fontawesome-free/css/all.min.css') }}">


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/front/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/front/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">


<!-- Гланый Контейнре Боковой панели -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: black">
    <!-- Названия -->
    <a href="{{route('home')}}" class="brand-link">
        <span class="brand-text font-weight-light">На главную</span>
    </a>
    <a href="{{route('admin')}}" class="brand-link">
        <span class="brand-text font-weight-light">Панель Админа</span>
    </a>
    <!-- Боковая панель -->
    <div class="sidebar">

        <!-- Имя Админа) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <p style="color: #bbbdbf">Name: <b>{{Auth::user()->name}}</b></p>

            </div>

        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <p class="lead fw-normal mb-1" style="color: #bbbdbf">Роль</p>


                @if(Auth::user()->is_admin = 1  )
                    <b style="color: #bbbdbf"> Администратор </b>
                @endif
                @if(Auth::user()->is_admin == 0  )
                    <b style="color: #bbbdbf"> пользователь </b>
                @endif
                @if(Auth::user()->is_admin == -1  )
                    <b style="color: #bbbdbf"> Модератор </b>
                @endif

            </div>

        </div>

        <!-- Боковая панель меню -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('create')}}" class="nav-link">
                        <p>
                            Добавить Товар
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('edit')}}" class="nav-link">
                        <p>
                            Изменение товара
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders-table')}}" class="nav-link">
                        <p>
                            Заказы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users-table')}}" class="nav-link">
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->


        <!-- /.control-sidebar -->
    </div>


    <!-- ./wrapper -->


    <script src="{{ asset('assets/front/jquery/jquery.min.js') }}"></script>


    <script src="{{ asset('assets/front/jquery-ui/jquery-ui.min.js') }}"></script>

</body>
</html>
