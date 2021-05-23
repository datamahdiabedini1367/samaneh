<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>    @yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @yield('stylesheet')

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
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('loginForm')}}" class="nav-link">ورود</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('signup')}}" class="nav-link">ثبت نام</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('logout')}}" class="nav-link">خروج</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
{{--                <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--                    <div class="image">--}}
{{--                        <img src="/image/picProfile.png" class="img-circle elevation-2" alt="User Image">--}}
{{--                    </div>--}}
{{--                    <div class="info">--}}
{{--                        <a href="#" class="d-block">حسام موسوی</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->


                        <li class="nav-item">
                            <a href="{{route('signup')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    تعریف کاربر
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                   لیست کاربران
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('loginForm')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    ورود
                                </p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{route('projects.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    لیست پروژه
{{--                                    <span class="right badge badge-danger">جدید</span>--}}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                     لیست پروژه های من
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('companies.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    لیست شرکت ها
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('persons.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    لیست افراد ها
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
        @yield('content')
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@yield('scripts')

</body>
</html>
