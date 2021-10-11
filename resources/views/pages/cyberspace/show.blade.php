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

@section('page-title')
    اطلاعات فضای مجازی {{$topic}}{{$title}}
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route($back.'.index')}}" class="btn btn-sm btn-danger float-left ">بازگشت به لیست {{$topic}}</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','list_accountExport')->first())
        <a href="{{route('person.exportPersonRelated',[$person])}}"
           class="btn btn-sm btn-success float-left mx-2">
            <i class="fa fa-download"></i>
            خروجی EXCEL
        </a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','create_savabegh_jobs')->first())
        <a href="{{route('account.create',[$type,$dataId])}}"
           class="btn btn-sm btn-warning float-left mx-2">
            افزودن اطلاعات فضای مجازی جدید
        </a>
    @endcan
@endsection

@section('create_form')
    <div class="row  p-2">
        <table class="table table-bordered table-striped   w-100" id="emailtable">
            <thead>
            <tr>
                <th style="width: 20%">نوع اکانت</th>
                <th>مقدار</th>
                <th style="width: 10%">ویرایش</th>
                <th style="width: 10%">حذف</th>
            </tr>
            </thead>
            <tbody id="dataAccountRegister">

            @foreach($item->accounts as $account)
                <tr id="tr_{{$account->account_id}}_{{$account->id}}">
                    <td>
                        @foreach($accountTypes as $accountType)
                            @if($account->id_type_account == $accountType->id ) {{$accountType->title}} @endif
                        @endforeach
                    </td>
                    <td>
                        {{$account->value}}
                    </td>
                    <td>
                        {{Form::open(['route'=>['account.edit',[$account]],'method'=>'get' ])}}
                        {{Form::button('',['class'=>"btn-edit btn btn-warning btn-ico btn-ico-tc-black",'type'=>'submit'])}}
                        {{Form::close()}}
                    </td>
                    <td>
                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete" ,
                                           'data-toggle'=>"modal" , 'data-target'=>"#removeItem",
                                           'onclick'=>'deleteItem("'.route('account.delete',[$account]).'")']) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scriptsExtra')


    <script>

        function selectSayer(selectObj) {
            var idx = selectObj.selectedIndex;
            var which = selectObj.options[idx].value;
            var divAccountType = $('.account_type');
            if (which == 999) {
                divAccountType.append(
                    '<div class="col-sm-3" id="accounttypetitle">' +
                    '<input type="text" class="form-control " id="accounttype"' +
                    'name="title"' +
                    'placeholder="نوع اکانت مد نظر را تایپ کنید">' +
                    '</div>'
                )
                $('#error_title').addClass('show');
                $('#error_title').removeClass('hide');


            } else {
                var accounttypetitle = $('#accounttypetitle');
                accounttypetitle.remove();
                $('#error_title').addClass('hide');
                $('#error_title').removeClass('show');

            }
        }

        $('#save_syberspace').validate(
            {
                rules: {
                    id_type_account: {required: true},
                    title: {required: "#sayer:selected", minlength: 4},
                    value: {required: true},
                },
                messages: {
                    id_type_account: {
                        required: " نوع اکانت اجباریست.",
                    },
                    title: {
                        required: "نوع اکانت اجباریست. ",
                        minlength: jQuery.validator.format("حداقل طول نوع اکانت باید بیشتر از {0} حرف باشد")
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







