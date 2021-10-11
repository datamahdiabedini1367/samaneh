@php
    use App\Models\Permission;
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <a href="/" class="brand-link px-4">
        <span class="brand-text font-weight-bold">پنل مدیریت</span>
    </a>
    <div class="sidebar">
        <div >
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>داشبورد </p>
                        </a>
                    </li>
                    @can('isAccess',Permission::query()->whereIn('title', ['create_user', 'list_users', 'list_roles'])->first())
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('isAccess',Permission::query()->where('title','create_user')->first())
                                    <li class="nav-item">
                                        <a href="{{route('signup')}}" class="nav-link">
                                            <i class="nav-icon fa fa-circle-o"></i>
                                            <p>تعریف کاربر</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('isAccess',Permission::query()->where('title','list_users')->first())
                                    <li class="nav-item">
                                        <a href="{{route('users.listUsers')}}" class="nav-link">
                                            <i class="nav-icon fa fa-circle-o"></i>
                                            <p>لیست کاربران</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('isAccess',Permission::query()->where('title','list_roles')->first())
                                    <li class="nav-item">
                                        <a href="{{route('roles.index')}}" class="nav-link">
                                            <i class="nav-icon fa fa-circle-o"></i>
                                            <p>لیست نقش ها</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('isAccess',Permission::query()->whereIn('title', ['list_projects','my_project'])->first())
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-gopuram"></i>
                                <p>پروژه ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('isAccess',Permission::query()->where('title','list_projects')->first())
                                    <li class="nav-item">
                                        <a href="{{route('projects.index')}}" class="nav-link">
                                            <i class="nav-icon fa fa-circle-o"></i>
                                            <p>لیست پروژه</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('isAccess',Permission::query()->where('title','my_project')->first())
                                    <li class="nav-item">
                                        <a href="{{route('user.projects')}}" class="nav-link">
                                            <i class="nav-icon fa fa-circle-o"></i>
                                            <p>لیست پروژه های من</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('isAccess',Permission::query()->where('title','list_companies')->first())
                        <li class="nav-item">
                            <a href="{{route('companies.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-city"></i>
                                <p>لیست شرکت ها</p>
                            </a>
                        </li>
                    @endcan


                    @can('isAccess',Permission::query()->where('title','list_persons')->first())
                        <li class="nav-item">
                            <a href="{{route('persons.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>  لیست افراد   </p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </div>
</aside>
