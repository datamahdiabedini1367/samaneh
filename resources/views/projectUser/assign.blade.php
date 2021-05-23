@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> ویرایش پروژه {{$project->name}}</h1>
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post"
                              action="{{route('projects.users.store',$project)}}"
                              id="updated_project"
                        >
                            @csrf

                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5" >

                                            <table  class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>نام کاربری</th>
                                                    <th>ایمیل</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr class="@if($project->hasUser($user)) bg-success @endif ">
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td  class="@if($project->hasUser($user)) bg-success-gradient @endif">
                                                            <input type="checkbox" name="users[]" value="{{$user->id}}"
                                                                   form="updated_project" class="userSelected"
                                                                   @if($project->hasUser($user)) checked="checked" @endif
                                                            >
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام کاربری</th>
                                                    <th>ایمیل</th>
                                                    <th>انتخاب</th>
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

@endsection


