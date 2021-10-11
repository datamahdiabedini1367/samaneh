@extends('layouts.master.createFormMaster')

@section('icon')
    @if ($type == 'company')
        <i class="nav-icon fas fa-city"></i>
    @elseif ($type=='persons')
        <i class="nav-icon fas fa-user-friends"></i>
    @endif
@endsection

@php
    if ($type == 'company'){
        $topic="شرکت ";
        $address = 'companies.index';
    }else if($type == 'persons'){
        $topic= "";
        $address = 'persons.index';
    }
@endphp

@section('create_form')

                {{Form::open(['route' => ['phone.store', [$type,$item]],'id'=>'save_phone'] )  }}
                <div class="row p-2">
                        {{Form::label('value','شماره تماس :',['class'=>"form-group col-sm-2"])}}
                    <div class="col-sm-6">
                        {{Form::text('value',old('value'),['class'=>"form-control" ,'id'=>"phoneNew",'placeholder'=>"شماره تماس مورد نظر را وارد کنید"]) }}
                    </div>
                    <div class="col-4 text-danger text-bold " id="error_value">
                        @error("value")
                        {{$message}}
                        @enderror
                    </div>

                </div>
                <div class="row">
                <div class="col-sm-12 p-3">
                    {{Form::submit('ثبت' , ['class'=>"btn btn-primary float-left" ,'id'=>'submit_button'])}}
                </div>
                </div>
                {{ Form::close() }}

@endsection

@section('scriptsExtra')

    <script>
        $('#save_phone').validate(
            {
                rules: { value: {required: true, digits: true} },
                messages: {
                    value: {
                        required: " شماره تماس اجباریست",
                        digits: "فقط عدد می تواند در این فیلد قرار بگیرد"
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

@section('page-title')
    ثبت شماره تماس
    {{$topic}}
    {{$title}}
@endsection

@section('button-page')
    <a class="btn btn-info btn-sm float-left" href="{{route("$address")}}"> بازگشت به لیست {{$topic}}</a>
@endsection
