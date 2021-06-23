@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> تغییر رمز عبور </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                        <li class="breadcrumb-item active"> تغییر رمز عبور</li>
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
                            <h3 class="card-title"> تغییر رمز عبور </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('users.update',$user)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="row">
                                    <div class="input-group m-3">
                                        <input type="text" class="form-control" placeholder="نام کاربری"
                                                name="username">
                                        <div class="input-group-append">
                                            <span class="fa fa-user input-group-text"></span>
                                        </div>
                                    </div>
                                    <div class="input-group m-3">
                                        <input type="password" class="form-control"
                                               placeholder="رمز عبور قبلی خود را وارد کنید" name="password-old"
                                               autocomplete="off"
                                        >
                                        <div class="input-group-append">
                                            <span class="fa fa-lock input-group-text"></span>
                                        </div>
                                    </div>
                                    <div class="input-group m-3">
                                        <input type="password" class="form-control"
                                               placeholder="رمز عبور جدید خود را وارد کنید" name="password">
                                        <div class="input-group-append">
                                            <span class="fa fa-lock input-group-text"></span>
                                        </div>
                                    </div>
                                    <div class="input-group m-3">
                                        <input type="password" class="form-control"
                                               placeholder="رمز عبور جدید خود را دوباره وارد کنید"
                                               name="password_confirmation">
                                        <div class="input-group-append">
                                            <span class="fa fa-lock input-group-text"></span>
                                        </div>
                                    </div>

                            </div>
                            <div class="row">

                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>


                        @include('errors')

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

@endsection



