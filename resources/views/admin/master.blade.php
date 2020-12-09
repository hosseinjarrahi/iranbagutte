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
    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->

    <link rel="stylesheet" href="{{ asset('admin/dist/css/bootstrap-rtl.min.css') }}">

    <!-- template rtl version -->

    <link rel="stylesheet" href="{{ asset('admin/dist/css/custom-style.css') }}">

    <style>
        .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link {
            background: #333;
        }
    </style>
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
                        @if(auth()->user()->hasRole('posts') || auth()->user()->hasRole('tables'))
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-edit"></i>
                                    <p>
                                        مدیریت رستوران من
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                @if(auth()->user()->hasRole('posts'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa fa-edit"></i>
                                                <p>
                                                    مدیریت محصولات
                                                    <i class="right fa fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ url('manager/add-food') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>افزودن محصول</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ url('manager/show-foods') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>مشاهده محصولات</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ url('manager/category') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>دسته بندی ها</p>
                                                    </a>

                                                </li>
                                            </ul>
                                    </ul>
                                @endif

                                @if(auth()->user()->hasRole('tables'))
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fa fa-table"></i>
                                                <p style="border-radius: 10px">
                                                    مدیریت میزها
                                                    <i class="right fa fa-angle-left"></i>
                                                </p>
                                            </a>

                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ url('manager/sit/setting') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>تنظیمات</p>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="{{ url('manager/reserved') }}" class="nav-link">
                                                        <i class="fa fa-circle-o nav-icon"></i>
                                                        <p>میزر های رزرو شده</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endif

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('manager/detail-res') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>اطلاعات رستوران</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('payments'))
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
                                        <a href="{{ url('manager/manage-pays') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست خرید</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(auth()->user()->hasRole('events'))
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-trophy"></i>
                                    <p>
                                        رويداد
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('event.show') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>رويداد</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(auth()->user()->hasRole('advertise'))
                            <li class="nav-item has-treeview">
                                <a href="{{url('manager/advertise')}}" class="nav-link">
                                    <i class="nav-icon fa fa-area-chart"></i>
                                    <p>
                                        تبلیغات
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('manager/advertise') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ثابت</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ url('manager/advertise/dynamic') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ابتدای بازی</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('manager/advertise/zirnevis') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تبلیغات زیرنویس</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if(auth()->user()->hasRole('developer'))
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-gamepad"></i>
                                    <p>
                                        مدیریت بازی ها
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('manager/send-game') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>ارسال بازی</p>
                                        </a>
                                    </li>
                                    @if(auth()->user()->hasRole('checkGame'))
                                        <li class="nav-item">
                                            <a href="{{ url('manager/games') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>مدیریت بازی ها</p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(auth()->user()->hasRole('settings'))
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-gears"></i>
                                    <p>
                                        تنظیمات سایت
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fa fa-edit"></i>
                                            <p>
                                                صفحات خانه
                                                <i class="right fa fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ url('manager/WorkWithUs') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> همکاری با ما</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('manager/HowToOrder') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> نحوه سفارش
                                                    </p>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{ url('manager/benefits') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>مزایای عضویت</p>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{ url('manager/ContactUs') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>ارتباط با ما</p>
                                                </a>

                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('manager/CollaborateWithGameMakers') }}"
                                                   class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> همکاری با بازی سازان</p>
                                                </a>

                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('manager/MakeAGameForUs') }}" class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p> برای ما بازی بسازيد
                                                    </p>
                                                </a>

                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('manager/CooperationWithFastFoods') }}"
                                                   class="nav-link">
                                                    <i class="fa fa-circle-o nav-icon"></i>
                                                    <p>همکاری با فست فودی ها</p>
                                                </a>

                                            </li>
                                        </ul>
                                </ul>

                                <ul class="nav nav-treeview">
                                    @if(auth()->user()->hasRole('adminSetting'))
                                        <li class="nav-item">
                                            <a href="{{ route('admin.cyberspace') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>فضای مجازی و اپلیکیشن</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('adver.price') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>تبلیغات</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('manager/about-us') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>درباره ما</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('manager/delivery') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>نحوه ارسال</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('manager/call') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>تماس با فروشگاه</p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('users'))
                            <li class="nav-item has-treeview">
                                <a href="{{ url('manager/manage-users') }}" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        مدیریت کاربران
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('chat'))
                            <li class="nav-item has-treeview">
                                <a href="http://go.iranbaguette.ir/admin" class="nav-link">
                                    <i class="nav-icon fa fa-comments"></i>
                                    <p>
                                        پنل مدیریت چت آنلاین
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('comments'))
                            <li class="nav-item">
                                <a href="{{route('admin.comments')}}" class="nav-link">
                                    <i class="nav-icon fa fa-comment"></i>
                                    <p>
                                        نظرات
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if(auth()->user()->hasRole('buycode'))

                            <li class="nav-item">

                                <a href="{{route('buycode.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-percent"></i>
                                    <p>
                                        تخفیف ها
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if(auth()->user()->hasRole('buycode'))

                            <li class="nav-item">

                                <a href="{{route('user.myCode')}}" class="nav-link">
                                    <i class="nav-icon fa fa-gamepad"></i>
                                    <p>
                                        بازی های من
                                    </p>
                                </a>
                            </li>
                        @endif

{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('admin.advertiseUser')}}" class="nav-link">--}}
{{--                                <i class="nav-icon fa fa-comment"></i>--}}
{{--                                <p>--}}
{{--                                    حذف تبلیغات--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        @if(auth()->user()->hasRole('slides'))
                            <li class="nav-item">
                                <a href="{{ url('manager/slides') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اسلایدر</p>
                                </a>
                            </li>
                        @endif

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

