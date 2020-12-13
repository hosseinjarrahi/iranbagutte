<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/custom-style.css') }}">
    <style>
        .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link {
            background: #333;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <span class="brand-link">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </span>
        <div class="sidebar">
            <div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-item has-treeview">
                            <a href="{{ route('user.dashboard.advertise') }}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    حذف تبلیغات
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ url('/edit') }}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    ویرایش
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ url('/status') }}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    خریدها
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ url('/user/myCood') }}" class="nav-link">
                                <i class="nav-icon fa fa-gamepad"></i>
                                <p>
                                    بازی های من
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="{{ url('/buycodes') }}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    کد های شما
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('') }}" target="_blank" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    مشاهده سایت
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    خروج
                                </p>
                            </a>
                        </li>

                    </ul>

                </nav>

            </div>
        </div>
    </aside>


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div>
                </div>
            </div>
        </div>
         @yield('content')
    </div>
</div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

</body>
</html>

