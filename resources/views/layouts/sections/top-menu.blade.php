
<nav class="main-header navbar navbar-expand bg-white navbar-dark border-bottom topMenu" >
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/dashboard" class="nav-link">داشبورد</a>
        </li>
    </ul>

    <!-- Right navbar user menu -->
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{auth()->user()->username}}
                <i class="fa fa-user-circle "></i>
                <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">منوی کاربری</span>
                <div class="dropdown-divider"></div>

                @can('isAccess',\App\Models\Permission::query()->where('title','create_user')->first())

                    <a href="{{route('signup')}}" class="dropdown-item">
                        <i class="fa fa-user ml-2"></i>تعریف کاربر
                    </a>
                @endcan


                @can('isAccess',\App\Models\Permission::query()->where('title','change_password')->first())
                    @php
                        $user = auth()->user()->id;
                    @endphp
                    <a href="{{route('users.edit',[auth()->user()->id])}}" class="dropdown-item">
                        <i class="nav-icon fa fa-lock"></i>
                        تغییر رمز عبور
                    </a>
                @endcan

                <a href="{{route('logout')}}" class="dropdown-item">
                    <i class="fa fa-sign-out ml-2"></i>خروج
                </a>

            </div>
        </li>
    </ul>
</nav>
