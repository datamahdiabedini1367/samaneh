@extends('layouts.master')

@include('layouts.share.common_inpute_form')

@section('page_title')
    تخصیص کاربر/کاربران به پروژه
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> انتخاب کاربر/کاربران برای پروژه {{$project->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">تخصیص کاربر/کاربران به پروژه
                            {{$project->name}}</li>
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
                                تخصیص کاربر/کاربران به پروژه {{$project->name}}
                            </h3>
                        </div>


                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5" >

                                            <table  class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>نام کاربری</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="@if($project->hasUser($user)) bg-success @endif">
                                                        <td>{{$user->username}}</td>
                                                        <td>
                                                            <sapn name="users[]"
                                                                    class="btn btn-primary "
                                                                    id="btn-{{$user->id}}"
                                                                   onclick="selectUserForProject({{$project->id}},{{$user->id}})"
                                                            >انتخاب</sapn>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام کاربری</th>
{{--                                                    <th>انتخاب</th>--}}
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>


{{--                            <input type="submit" value="ثبت">--}}

{{--                        </form>--}}

                        @include('errors')
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <script>
        function selectUserForProject(projectId,userId){
            // alert('run funcction');
                $.ajax({
                    type: 'post',
                    url:'/project/'+projectId+'/user/'+userId,
                    data: {
                        _token: "{{csrf_token()}}",
                    },
                    success: function (data) {
                        console.log(data);
                        var icon = $('#btn-'+userId).parents('tr');

                        if (icon.hasClass('bg-success')) {
                            icon.removeClass('bg-success');
                            // $('#btn-'+userId).parents('tr').removeClass('bg-success-gradient')
                            // icon.text('انتخاب نشده')
                        } else {
                            // icon.text('انتخاب');
                            icon.addClass('bg-success');
                            // $('#btn-'+userId).parents('tr').addClass('bg-success-gradient')

                        }

                    }

                })
        }
    </script>

@endsection


