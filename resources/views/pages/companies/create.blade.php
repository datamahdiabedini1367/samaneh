@extends('layouts.master.createFormMaster')


@section('page-title','ثبت شرکت جدید')
@section('icon')
    <i class="nav-icon fas fa-city"></i>
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('companies.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست شرکت ها</a>
    @endcan
@endsection


@section('create_form')
    {{ Form::open(['route'=>'companies.store' ,'id'=>'companyNew']) }}

    <div class="card-body">

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{ Form::label('name','نام شرکت :')}}
                    {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>"نام شرکت  را وارد کنید"])}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('registration_number','شماره ثبت شرکت :')}}
                    {{Form::text('registration_number',old('registration_number'),['class'=>"form-control",'placeholder'=>"شماره ثبت شرکت  را وارد کنید"])}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('registration_date','تاریخ ثبت شرکت :')}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        {{Form::text('registration_date',old('registration_date'),['class'=>'form-control' ])}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="text-danger  text-bold " id="error_name">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-danger text-bold" id="error_registration_number">
                    @error('registration_number')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-danger text-bold " id="error_registration_date">
                    @error('registration_date')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('address',' آدرس شرکت :')}}
                    {{Form::textarea('address',old('address'),['class'=>'form-control','placeholder'=>"آدرس شرکت  را وارد کنید",'rows'=>"3"])}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('description',' توضیحات :')}}
                    {{Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>"توضیحات را وارد کنید ...",'rows'=>"3"])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="text-danger text-bold " id="error_address">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-danger text-bold" id="error_description">
                    @error('description')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>


        <div class="card-footer">
            <div class="row p-0 m-0">
                <div class="col-sm-12 ">
                    {{Form::submit('ثبت',['class'=>"btn btn-primary float-left", 'id'=>'submit_button'])}}
                </div>
            </div>
        </div>


    </div>

    {{Form::close()}}

@endsection

@section('scriptsExtra')
    <script>
        $('#companyNew').validate(
            {
                rules: {
                    name: {required: true, minlength: 3}, registration_date: {dateISO: true},
                },
                messages: {
                    name: {
                        required: " نام شرکت اجباریست",
                        minlength: jQuery.validator.format("حداقل طول نام شرکت باید بیشتر از {0} حرف باشد"),
                    },
                    registration_date: {
                        dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01",
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


