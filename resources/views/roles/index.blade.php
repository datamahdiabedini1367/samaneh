@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>لیست نقش های سیستم</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">لیست نقش های سیستم
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 m-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                لیست نقش های سیستم
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <h6 class="m-4">
                            @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
                                <a href="{{route('roles.create')}}" class="btn btn-info">ایجاد نقش جدید</a>
                            @endcan
                        </h6>
                        <form role="form" method="post"
                              action="#"
                              id="updated_project"
                        >
                            @csrf

                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5">

                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>نام نقش</th>
                                                    @can('isAccess',\App\Models\Permission::query()->where('title','select_user_for_role')->first())
                                                        <th>انتخاب کاربر</th>
                                                    @endcan
                                                    @can('isAccess',\App\Models\Permission::query()->where('title','edit_role')->first())
                                                        <th>ویرایش</th>
                                                    @endcan
                                                    @can('isAccess',\App\Models\Permission::query()->where('title','delete_role')->first())
                                                        <th>حذف</th>
                                                    @endcan
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($roles as $role)
                                                    <tr>
                                                        <td>{{$role->id}}</td>
                                                        <td>{{$role->title}}</td>
{{--                                                        @can('isAccess',\App\Models\Permission::query()->where('title','select_user_for_role')->first())--}}
{{--                                                            <td>--}}
{{--                                                                <a class="btn btn-warning" href="">انتخاب کاربر</a>--}}
{{--                                                            </td>--}}
{{--                                                        @endcan--}}
                                                        @can('isAccess',\App\Models\Permission::query()->where('title','edit_role')->first())
                                                            <td><a href="{{route('roles.edit',$role->id)}}"
                                                                   class="btn btn-success">ویرایش</a></td>
                                                        @endcan
                                                        @can('isAccess',\App\Models\Permission::query()->where('title','delete_role')->first())

                                                            <td>
                                                                <form action="{{route('roles.delete',$role->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger">حذف</button>
                                                                </form>

                                                            </td>
                                                        @endcan

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>نام نقش</th>
{{--                                                    @can('isAccess',\App\Models\Permission::query()->where('title','select_user_for_role')->first())--}}
{{--                                                        <th>انتخاب کاربر</th>--}}
{{--                                                    @endcan--}}
                                                    @can('isAccess',\App\Models\Permission::query()->where('title','edit_role')->first())
                                                        <th>ویرایش</th>
                                                    @endcan
                                                    @can('isAccess',\App\Models\Permission::query()->where('title','delete_role')->first())
                                                        <th>حذف</th>
                                                    @endcan
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                        @include('errors')
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <script>
        function activeORDeactive(userId) {
            var btn = $('#btn-' + userId);
            // alert('run funcction');
            $.ajax({
                type: 'post',
                url: '/users/' + userId + '/changeActivation',
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    console.log(data.msg);
                    var icon = $('#btn-' + userId).parents('tr');
                    if (data.msg == "1") {
                        icon.addClass('bg-success');
                        btn.html("غیرفعال");
                    } else if (data.msg == 0) {
                        icon.removeClass('bg-success');
                        btn.html("فعال");
                    }

                }

            })
        }
    </script>

@endsection


