@extends('layouts.master.createFormMaster')

@php
    if ($type == 'company'){
        $topic="شرکت ";
        $back='companies';
    }else if($type == 'person'){
        $topic= "";
                    $back='persons';
    }
@endphp



@section('create_form')


    {{Form::open(['route'=>['account.store',[$type,$dataId]], 'id'=>"save_syberspace"])}}
    <div class="row m-3 account_type">
        <div class="col-sm-1">
            {{Form::label('id_type_account','نوع اکانت :')}}
        </div>
        <div class="col-sm-3 styled-select">
            {{Form::select('id_type_account',$accountTypes+['999'=>'سایر'],old('id_type_account'),['class'=>"form-control select2", 'id'=>"accountTypeNew",'onchange'=>"selectSayer(this)", 'placeholder'=>"نوع اکانت را تعیین کنید"])}}
        </div>
        <div class="col-sm-3  @error('title') show @else hide @enderror" id="accounttypetitle">
            {{Form::text('title',old('title'),['class'=>"form-control", 'id'=>'accounttype','placeholder'=>"نوع اکانت مد نظر را تایپ کنید", 'required'=>"required"])}}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3 m-3">
            <div class="text-danger text-bold" id="error_id_type_account">
                @error('id_type_account')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="col-sm-3 " id="title_error">
            <div class="text-danger  text-bold" id="error_title">
                @error('title')
                {{$message}}
                @enderror
            </div>
        </div>
    </div>

    <div class="row m-3">
        <div class="col-sm-1">
            {{Form::label('value','مقدار :')}}
        </div>
        <div class="col-sm-3">
            {{Form::text('value',old('value'),['class'=>"form-control",'id'=>"accountNew",'placeholder'=>"مقدار را وارد کنید"])}}
        </div>



    </div>

    <div class="row m-3">
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            <div class="text-danger text-bold " id="error_value">
                @error('value')
                {{$message}}
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 p-3">
            {{Form::submit('ثبت اطلاعات',['class'=>"btn btn-primary float-left", 'id'=>"submit_button"])}}
        </div>
    </div>
    {{Form::close()}}



@endsection


@section('scriptsExtra')
    <script>
        function selectSayer(selectObj) {
            var idx = selectObj.selectedIndex;
            var which = selectObj.options[idx].value;
            var accounttypetitle = document.getElementById('accounttypetitle');
            var title_error = document.getElementById('title_error');
            if (which == 999) {
                accounttypetitle.classList.add("show");
                accounttypetitle.classList.remove("hide");
                title_error.classList.add('show')

            } else {
                accounttypetitle.classList.add("hide");
                accounttypetitle.classList.remove("show");
                title_error.classList.add('hide')
            }
        }

        $('#save_syberspace').validate(
            {
                rules: {
                    id_type_account: {required: true},
                    title: {required: true},
                    value: {required: true},
                },
                messages: {
                    id_type_account: {
                        required: " نوع اکانت اجباریست.",
                    },
                    title: {
                        required: "عنوان اکانت اجباریست. ",
                    },
                    value: {
                        required: "مقدار اجباریست. "
                    }

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


@section('page-title')
    ثبت اطلاعات فضای مجازی
    {{$topic}}
    {{$title}}
@endsection


@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route($back.'.index')}}" class="btn btn-sm btn-danger float-left ">بازگشت به لیست {{$topic}}</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','create_savabegh_jobs')->first())
        <a href="{{route('account.show',[$type,$dataId])}}"
           class="btn btn-sm btn-warning float-left mx-2">
            بازگشت به اطلاعات فضای مجازی
        </a>
    @endcan
@endsection


