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

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

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

                                    <a href="{{ url('admin/add-product') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>افزودن محصول</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/show-products') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>مشاهده محصولات</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/category') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>دسته بندی ها</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/slides') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>اسلایدر</p>

                                    </a>

                                </li>

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

                                    <a href="{{ url('admin/sit/setting') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>تنظیمات</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/reserved') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>میزر های رزرو شده</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item has-treeview">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa fa-users"></i>

                                <p>

                                    مدیریت کاربران

                                    <i class="right fa fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ url('admin/manage-users') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>کاربران عادی</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/manage-special-users') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>کاربران ویژه</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/manage-dev-users') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>بازی سازان</p>

                                    </a>

                                </li>

                            </ul>

                        </li>

                        <li class="nav-item has-treeview">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa fa-shopping-bag"></i>

                                <p>

                                    خرید ها

                                    <i class="right fa fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ url('admin/manage-pays') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>لیست خرید</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item has-treeview">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa fa-area-chart"></i>

                                <p>

                                    تبلیغات

                                    <i class="right fa fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ url('admin/advertise') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>ثابت</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/advertise/dynamic') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>ابتدای بازی</p>

                                    </a>

                                </li>
                                <li class="nav-item">

                                    <a href="{{ url('admin/advertise/zirnevis') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>تبلیغات زیرنویس</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item has-treeview">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa fa-gamepad"></i>

                                <p>

                                    بازی ها

                                    <i class="right fa fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ url('admin/games') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>مدیریت بازی ها</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/users-games') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>بازی های ارسالی</p>

                                    </a>

                                </li>

                            </ul>

                        </li>


                        <li class="nav-item has-treeview">

                            <a href="#" class="nav-link">

                                <i class="nav-icon fa fa-gears"></i>

                                <p>

                                    تنظیمات سایت

                                    <i class="right fa fa-angle-left"></i>

                                </p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="{{ url('admin/detail-REs') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>امکانات رستوران</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/about-us') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>درباره ما</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="{{ url('admin/benefits') }}" class="nav-link">

                                        <i class="fa fa-circle-o nav-icon"></i>

                                        <p>مزایای عضویت</p>

                                    </a>

                                </li>

                            </ul>

                        </li>
                        <li class="nav-item has-treeview">

                            <a href="http://go.iranbaguette.com/admin" class="nav-link">

                                <i class="nav-icon fa fa-comments"></i>

                                <p>

                                    پنل مدیریت چت آنلاین

                                </p>

                            </a>

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

                            <a href="{{ url() }}" class="nav-link">

                                <i class="nav-icon fa fa-th"></i>

                                <p>

                                    مشاهده سایت

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

    @yield('content')

    <!-- /.content -->

    </div>

</div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

</body>

</html>

