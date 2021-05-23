@extends('layouts.master')

@include('layouts.share.common_inpute_form')

@section('page_title')
     صفحه ورود
@endsection

@section('content')


    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>ورود به سامانه</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="نام کاربری" name="username">
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="رمز عبور" name="password">
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                        </div>
                    </div>
                    {{--                <div class="row">--}}
                    {{--                    <div class="col-8">--}}
                    {{--                        <div class="checkbox icheck">--}}
                    {{--                            <label>--}}
                    {{--                                <input type="checkbox"> یاد آوری من--}}
                    {{--                            </label>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <!-- /.col -->--}}
                    {{--                    <div class="col-4">--}}
                    {{--                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>--}}
                    {{--                    </div>--}}
                    {{--                    <!-- /.col -->--}}
                    {{--                </div>--}}
                </form>

                <div class="row">
                    <div class="col-mb-3 p-3">
                        @include('errors')
                    </div>
                </div>

            {{--            <div class="social-auth-links text-center mb-3">--}}
            {{--                <p>- OR -</p>--}}
            {{--                <a href="#" class="btn btn-block btn-primary">--}}
            {{--                    <i class="fa fa-facebook mr-2"></i> ورود با اکانت فیسوبک--}}
            {{--                </a>--}}
            {{--                <a href="#" class="btn btn-block btn-danger">--}}
            {{--                    <i class="fa fa-google-plus mr-2"></i> ورود با اکانت گوگل--}}
            {{--                </a>--}}
            {{--            </div>--}}
            <!-- /.social-auth-links -->
                {{----}}
                {{--            <p class="mb-1">--}}
                {{--                <a href="#">رمز عبورم را فراموش کرده ام.</a>--}}
                {{--            </p>--}}
                {{--            <p class="mb-0">--}}
                {{--                <a href="{{route('signup')}}" class="text-center">ثبت نام</a>--}}
                {{--            </p>--}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->

    </body>
@endsection
