<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>پنل مدیریت | شروع سریع</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/custom-style.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <span class="brand-link">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </span>

        <!-- Sidebar -->
        <div class="sidebar">
            <div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-edit"></i>
                                <p>
                                     مدیریت پست ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('restaurant/add-product') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>افزودن محصول</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('restaurant/show-products') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>مشاهده محصولات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('restaurant/category') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>دسته بندی ها</p>
                                    </a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('restaurant/slides') }}" class="nav-link">--}}
{{--                                        <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                        <p>اسلایدر</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-table"></i>
                                <p>
                                    مدیریت میزها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('restaurant/sit/setting') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>تنظیمات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('restaurant/reserved') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>میزر های رزرو شده</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-info"></i>
                                <p>
                                    اطلاعات رستوران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('restaurant/detail-Res') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>تنظیمات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-comment"></i>
                                <p>
                                    نظرات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-comment"></i>
                                <p>خرید ها </p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('restaurant/event') }}" class="nav-link">
                                <i class="nav-icon fa fa-hourglass-end"></i>
                                <p>رویداد ویژه</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('restaurants/'.\Cookie::get('id')) }}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    مشاهده صفحه شما
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('restaurant/logout') }}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    خروج
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
