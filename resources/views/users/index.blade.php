@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>لیست کاربران</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">لیست کاربران
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
                                لیست کاربران
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
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
                                                    <th>نام کاربری</th>
                                                    <th>فعال یا غیر فعال کردن کاربر</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="@if($user->is_active == 1) bg-success @endif">
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->username}}</td>
                                                        <td>
                                                            <sapn name="user"
                                                                  class="btn btn-primary "
                                                                  id="btn-{{$user->id}}"
                                                                  onclick="activeORDeactive({{$user->id}})"
                                                            >@if($user->is_active == 1) غیرفعال @else فعال @endif
                                                            </sapn>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>نام کاربری</th>
                                                    <th>فعال یا غیر فعال کردن کاربر</th>
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
            var btn=$('#btn-'+userId);
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
                            // btn.val("غیر فعال");
                            // btn.addClass("btn-danger");
                            // btn.removeClass("btn-primary");

                    }else if (data.msg==0){
                        icon.removeClass('bg-success');
                        btn.html("فعال");
                    }

                }

            })
        }
    </script>

@endsection


