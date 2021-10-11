@extends('layouts.master.createFormMaster')

@section('page-title')
    تغییر رمز عبور
@endsection


@section('create_form')

    <div class="row">
        <div class="col-sm-12 p-5">

            {{Form::open(['route'=>['users.update',$user],'method'=>'patch','class'=>"m-auto" ,'id'=>"changePassword"])}}

                <div class="input-group my-2">
                    {{Form::text('username',old('username'),['class'=>"form-control","placeholder"=>"نام کاربری را وارد کنید"])}}
                    <div class="input-group-append">
                        <span class="fa fa-user input-group-text"></span>
                    </div>
                </div>
                <div class="row pt-0 pb-2">
                    <div class="col-sm-12 text-danger text-bold " id="error_username">
                        @error('username')
                        {{$message}}
                        @enderror
                    </div>
                </div>


                <div class="input-group my-2">
                    {{  Form::password('password-old',['class'=>"form-control",'placeholder'=>"رمز عبور قبلی خود را وارد کنید", 'name'=>"password-old",'autocomplete'=>"off"])  }}
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row pt-0 pb-2">
                    <div class="col-sm-12 text-danger text-bold " id="error_password-old">
                        @error('password-old')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="input-group my-2">
                    {{  Form::password('password',['class'=>"form-control",'placeholder'=>"رمز عبور جدید خود را وارد کنید" , 'name'=>"password" ,'id'=>"password"])  }}
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                <div class="row pt-0 pb-2">
                    <div class="col-sm-12 text-danger text-bold " id="error_password">
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                </div>


                <div class="input-group my-2">
                    {{  Form::password('password_confirmation',['class'=>"form-control",'placeholder'=>"رمز عبور جدید خود را دوباره وارد کنید"])  }}
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>

                <div class="row pt-0 pb-2">
                    <div class="col-sm-12 text-danger text-bold " id="error_password_confirmation">
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        {{Form::submit('ثبت',['class'=>"btn btn-primary btn-block btn-flat float-left",'id'=>'submit_button'])}}
                    </div>
                </div>
            {{Form::close()}}
        </div>
    </div>


@endsection

@section('scriptsExtra')
    <script>
        $('#changePassword').validate(
            {
                rules: {
                    "username": {required: true, minlength: 3},
                    "password-old": {required: true},
                    "password": {required: true},
                    "password_confirmation": {required: true, equalTo: "#password"},
                },
                messages: {
                    "username": {
                        required: "نام کاربری اجباریست.",
                        minlength: jQuery.validator.format("حداقل طول نام کاربری باید بیشتر از {0} حرف باشد")
                    },
                    "password-old": {required: "رمز عبور قبلی اجباریست."},
                    "password": {required: "رمز عبور جدید اجباریست."},
                    "password_confirmation": {
                        required: "تکرار رمز عبور اجباریست",
                        equalTo: "تکرار رمز عبور جدید اشتباه است"
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











