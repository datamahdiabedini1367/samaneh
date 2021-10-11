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

@section('page-title')
    ایمیل
    {{$topic}}
    {{$title}}
@endsection

@section('button-page')
    <a class="btn btn-sm btn-info float-left" href="{{route("$address")}}"> بازگشت به لیست {{$topic}}</a>

        <a href="{{route('email.create',[$type,$item])}}"
           class="btn btn-sm btn-warning float-left mx-2">
            افزودن ایمیل جدید
        </a>



@endsection

@section('create_form')
    <div class="row">
        <div class="col-12 m-auto p-3">
            <table class="table table-bordered table-striped " id="emailtable">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>ایمیل</th>
                    <th style="width: 10%">ویرایش</th>
                    <th style="width: 10%">حذف</th>
                </tr>
                </thead>
                <tbody id="dataEmailRegister">

                @foreach($item->emails as $email)
                    <tr>
                        <td>{{$email->id}}</td>
                        <td>{{$email->value}}</td>
                        <td>

                            {{Form::model($email,['route'=>['email.edit',[$email->id]] , 'method'=>'get'])}}
                                {{Form::button('',['class'=>"btn btn-warning btn-ico btn-ico-tc-black btn-edit",'type'=>'submit'])}}
                            {{Form::close()}}
                        </td>
                        <td>
                            {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete",
                                               'data-toggle'=>"modal" ,'data-target'=>"#removeItem",
                                               'onclick'=>'deleteItem("'.route('email.delete',[$email->id]).'")']) }}
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

