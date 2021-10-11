@extends('layouts.master.guestMaster')

@section('page-title')
    صفحه ورود
@endsection

@section('content')


    <div class="row">
        <div class="col-sm-4 m-auto">
            <div class="login-box">
                <div class="login-logo">
                    <a href="#"><b>ورود به سامانه</b></a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

                        {{ Form::open(['route'=>'login']) }}

                        <div class="input-group mb-3">
                            {{ Form::text('username',null ,['class' => 'form-control','placeholder'=>'نام کاربری']) }}
                            <div class="input-group-append">
                                <span class="fa fa-user input-group-text"></span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            {{ Form::password('password', ['class' => 'form-control','placeholder' => 'رمز عبور']) }}
                            <div class="input-group-append">
                                <span class="fa fa-lock input-group-text"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                {{ Form::submit('ورود',['class'=>"btn btn-primary btn-block btn-flat",'id'=>"submit_button"]) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                        <div class="row">
                            <div class="col-mb-3 p-3">
                                @include('pages.errors')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


