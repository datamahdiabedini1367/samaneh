@extends('layouts.master.createFormMaster')

@section('icon')
    <i class="nav-icon fa fa-users"></i>
@endsection

@section('page-title',' تعریف کاربر')

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('users.listUsers')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست کاربران</a>
    @endcan
@endsection

@section('create_form')

    @can('isAccess',\App\Models\Permission::query()->where('title','create_user')->first())

        {{ Form::open(['route'=>'register','id'=>"signup_form"]) }}
        <div class="card-body">
            <div class="row ">
                <div class="col-sm-5 my-2">
                    <div class="input-group">
                        {{Form::text('username',old('username'),['class'=>"form-control", 'placeholder'=>"نام کاربری"])}}
                        <div class="input-group-append">
                            <span class="fa fa-user input-group-text"></span>
                        </div>
                    </div>
                </div>
                <div class=" text-danger text-bold my-2" id="error_username">
                    @error('username')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 my-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{Form::checkbox('is_active', 1)}}
                        </span>
                        </div>
                        {{Form::label('is_active', 'فعال', ['class' => 'form-control bg-white'])}}
                    </div>
                </div>
                <div class=" text-danger text-bold my-2" id="error_is_active">
                    @error('is_active')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 my-2">
                    <div class="input-group">
                        <div class="input-group styled-select">
                            {{Form::select("role_id" , $roles, '',['class'=>"form-control",'placeholder' => 'نقش کاربر در سیستم را انتخاب کنید'] )}}
                        </div>
                    </div>
                </div>
                <div class="text-danger text-bold my-2" id="error_role_id">
                    @error('role_id')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 my-2">
                    <div class="input-group">
                        {{ Form::password('password', ['class' => 'form-control','placeholder'=>"رمز عبور",'id'=>'password']) }}
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>
                </div>
                <div class="text-danger text-bold my-2" id="error_password">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 my-2">
                    <div class="input-group">
                        {{ Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>"تکرار رمز عبور"]) }}
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span>
                        </div>
                    </div>
                </div>
                <div class="text-danger text-bold my-2" id="error_password_confirmation">
                    @error('password_confirmation')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row p-0 m-0">
                <div class="col-sm-12 ">
                    {{Form::submit('ثبت',['class'=>"btn btn-primary float-left",'id'=>'submit_button'])}}

                </div>
            </div>
        </div>

        {{Form::close()}}

    @endcan

@endsection

@section('scriptsExtra')
    <script>
        $('#signup_form').validate(
            {
                rules: {
                    username: {required: true, minlength: 4,},
                    role_id: {required: true},
                    password: {required: true, minlength: 6, maxlength: 40},
                    password_confirmation: {required: true, minlength: 6, maxlength: 40,equalTo:"#password"},
                },
                messages: {
                    username: {
                        required: " نام کاربری اجباریست",
                        minlength: jQuery.validator.format("حداقل طول نام کاربری باید بیشتر از {0} حرف باشد"),

                    },
                    role_id: {
                        required: " نقش کاربر اجباریست",
                    },
                    password: {
                        required: " رمز عبور اجباریست",
                        minlength: jQuery.validator.format("حداقل طول پسورد باید {0} کاراکتر باشد"),
                        maxlength: jQuery.validator.format("حداکثر طول پسورد باید {0} کاراکتر باشد")
                    },
                    password_confirmation: {
                        required: " تکرار رمز عبور اجباریست",
                        equalTo: "تکرار رمز عبور اشتباه وارد شده است",
                        minlength: jQuery.validator.format("حداقل طول پسورد باید {0} کاراکتر باشد"),
                        maxlength: jQuery.validator.format("حداکثر طول پسورد باید {0} کاراکتر باشد")
                    },
                },
                errorPlacement: function (error, element) {
                    var n = element.attr("name");
                    $("#error_" + n).addClass("text-bold");
                    error.appendTo("#error_" + n);
                },

            }
        );

    </script>
@endsection
