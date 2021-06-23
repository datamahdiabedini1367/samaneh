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
@php
    use App\Models\Permission;
@endphp
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>

            @guest()
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('loginForm')}}" class="nav-link">ورود</a>
                </li>
            @endguest
            @can('isAccess',Permission::query()->where('title','create_user')->first() )
                {{--            @can('isAccess','create_user' )--}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('signup')}}" class="nav-link">تعریف کاربر </a>
                </li>
            @endcan

            @auth()
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('logout')}}" class="nav-link">خروج</a>
                </li>
            @endauth
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">

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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->


                        @guest
                            <li class="nav-item">
                                <a href="{{route('loginForm')}}" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        ورود
                                    </p>
                                </a>
                            </li>
                        @endguest

                        @can('isAccess',Permission::query()->where('title','create_user')->first())
                            <li class="nav-item">
                                <a href="{{route('signup')}}" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        تعریف کاربر
                                    </p>
                                </a>
                            </li>
                        @endcan


                        @can('isAccess',Permission::query()->where('title','list_users')->first())
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        لیست کاربران
                                    </p>
                                </a>
                            </li>
                        @endcan



                        @can('isAccess',Permission::query()->where('title','list_projects')->first())
                            <li class="nav-item">
                                <a href="{{route('projects.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        لیست پروژه
                                        {{--                                    <span class="right badge badge-danger">جدید</span>--}}
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('isAccess',Permission::query()->where('title','list_roles')->first())

                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    لیست نقش ها
                                </p>
                            </a>
                        </li>
                        @endcan

                        @can('isAccess',Permission::query()->where('title','my_project')->first())
                            <li class="nav-item">
                                <a href="{{route('user.projects')}}" class="nav-link">
                                    <i class="nav-icon fa fa-th"></i>
                                    <p>
                                        لیست پروژه های من
                                    </p>
                                </a>
                            </li>
                        @endcan

                        @can('isAccess',Permission::query()->where('title','list_companies')->first())

                        <li class="nav-item">
                            <a href="{{route('companies.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    لیست شرکت ها
                                </p>
                            </a>
                        </li>
                        @endcan


                        @can('isAccess',Permission::query()->where('title','change_password')->first())

                        <li class="nav-item">
                            @php
                            $user = auth()->user()->id;
                            @endphp

                            <a href="{{route('users.edit',[auth()->user()->id])}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    تغییر رمز عبور
                                </p>
                            </a>
                        </li>
                        @endcan

                        @can('isAccess',Permission::query()->where('title','list_persons')->first())
                        <li class="nav-item">
                            <a href="{{route('persons.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    لیست افراد ها
                                </p>
                            </a>
                        </li>
                        @endcan


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
