@extends('layouts.master')

@include('layouts.share.common_inpute_form')

@section('page_title')
    تعریف کاربر
@endsection

@section('content')

    <body class="hold-transition ">
    <div class="register-box">
        <div class="register-logo">
            <b>تعریف کاربر جدید</b>
        </div>

        <div class="card">
            <div class="card-body ">

                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="نام کاربری" name="username">
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>
                    </div>

                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text"><input type="checkbox" name="is_active" value="1"></span>
                        </div>
                        <label  class="form-control bg-white" >فعال</label>

                    </div>
                    <!-- /input-group -->

                    {{--                <div class="input-group mb-3">--}}
                    {{--                    <input type="radio" class="form-control" placeholder="فعال بودن" name="is_active">--}}
                    {{--                    <div class="input-group-append">--}}
                    {{--                        فعال--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="رمز عبور" name="password">
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="تکرار رمز عبور"
                               name="password_confirmation">
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="input-group mb-3">
                    @include('errors')
                </div>

            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->


    <!-- iCheck -->


    </body>

@endsection

