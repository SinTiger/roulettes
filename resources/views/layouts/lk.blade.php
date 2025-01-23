<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Рулетки | Тестовое задание</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <style>
        /* замена правой части на полях с добавлением файла */
        .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "...";
        }
    </style>
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-outline-primary" type="submit" value="Выйти">
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Рулетки</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <!-- <a href="#" class="d-block">Alexander Pierce</a> -->
                        @guest
                        @if (Route::has('login'))
                        <!-- <li class="nav-item"> -->
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        <!-- </li> -->
                        @endif

                        @if (Route::has('register'))
                        <!-- <li class="nav-item"> -->
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        <!-- </li> -->
                        @endif
                        @else

                        <a id="navbarDropdown" class="" style="padding-left: 0;" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        @endguest
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <a href="{{ route('main.index') }}" class="nav-link <?= $link == 'main' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-home"></i>&nbsp; <p>Главная</p>
                        </a>

                        <a href="{{ route('supply.index') }}" class="nav-link <?= $link == 'supply' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-parachute-box"></i></i>&nbsp; <p>Поставки</p>
                        </a>

                        <a href="{{ route('warehouse.index') }}" class="nav-link <?= $link == 'warehouse' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-cash-register"></i></i>&nbsp; <p>Продажи</p>
                        </a>

                        <a href="{{ route('warehouse.index') }}" class="nav-link <?= $link == 'warehouse' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-warehouse"></i></i>&nbsp; <p>Склады</p>
                        </a>

                        <a href="{{ route('product.index') }}" class="nav-link <?= $link == 'product' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-ruler"></i>&nbsp; <p>Товары</p>
                        </a>

                        <a href="{{ route('supplier.index') }}" class="nav-link <?= $link == 'supplier' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-people-carry"></i>&nbsp; <p>Поставщики</p>
                        </a>

                        <a href="{{ route('buyer.index') }}" class="nav-link <?= $link == 'buyer' ? 'active' : '' ?>">
                            <i class="nav-icon far fa-smile"></i>&nbsp; <p>Покупатели</p>
                        </a>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>




        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            @yield('content')


        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <strong>Copyright &copy; 2025 <a href="https://vdedov.ru" target="_blank">Vadim Dedov</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- InputMask -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="/dist/js/pages/dashboard.js"></script> --}}

    <!-- ChartJS -->
        <script src="/plugins/chart.js/Chart.min.js"></script>

    <script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })

        // для форм с файлами
        bsCustomFileInput.init();

    })
    </script>

    @yield('scripts')

    {{-- свои скрипты --}}
    <script src="/dist/js/main.js"></script>

    <script>
        // подтверждение на удаление записи, где их много и надо понять какая именно удаляется
        function deleteItem(name, id) {
            let cofirm = confirm('Вы уверены, что хотите удалить "' + name + '"?');
            if (cofirm == true) {
                // alert('пора удалять');
                document.getElementById('js-click-delete-item-' + id).click();
            } else {
                // alert('отмена');
            }
        }
    </script>

    @livewireScripts

</body>

</html>
