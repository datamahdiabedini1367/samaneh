@extends('layouts.master')
@section('stylesheet')
    @include('layouts.share.stylesheet')
@endsection


@section('content')
    @php

        if ($type == 'company'){
            $topic="شرکت ";
        }else if($type == 'person'){
            $topic= "";
        }


    @endphp



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ثبت اطلاعات فضای مجازی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> ثبت اطلاعات فضای مجازی</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h3 class="card-title">ثبت اطلاعات فضای مجازی
                                    {{$topic}}
                                    {{$title}}
                                </h3>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-info " href="{{route("companies.index")}}"> ثبت</a>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                ثبت اکانت
                                <form action="{{route('accounts.store',[$type,$dataId])}}" method="post">
                                    @csrf
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>

                                    <div class="row py-2 account_type">
                                        <label for="accountType" class="form-group col-sm-2"> نوع اکانت :</label>
                                        <div class="col-sm-3">
                                            <select name="id_type_account" class="form-control" id="accountTypeNew"
                                                    onchange="selectSayer(this)">
                                                <option>نوع اکانت را تعیین کنید</option>
                                                @foreach($accountTypes as $accountType)
                                                    <option
                                                        value="{{$accountType->id}}">{{$accountType->title}}</option>
                                                @endforeach
                                                <option value="999" id="sayer">سایر</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row py-2">

                                        <label for="email" class="form-group col-sm-2"> مقدار :</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control ltr" id="accountNew"
                                                   name="value"
                                                   placeholder="مقدار را وارد کنید">
                                        </div>

                                        <div class="col-sm-3">
                                            <input type="submit" class="btn btn-primary" id="register_account"
                                                   value="ثبت اطلاعات">
                                                {{--                                                    onclick="registerAccount({{$dataId}} ,'{{$type}}')">+--}}
                                            </input>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-sm-10 m-auto">
                                        <div class="card ">
                                            <div class="card-body pt-5">
                                                <table class="table table-bordered table-striped  w-100"
                                                       id="emailtable">
                                                    <thead>
                                                    <tr>
                                                        <th>نوع اکانت</th>
                                                        <th>مقدار</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="dataAccountRegister">

                                                    @foreach($item->accounts as $account)
                                                        <tr id="tr_{{$account->account_id}}_{{$account->id}}">
                                                            <td class="col-sm-3">
                                                                <select form="edit_{{$account->id}}" class="form-control "
                                                                        name="id_type_account"
                                                                        id="id_type_account_{{$account->id}}">
                                                                    @foreach($accountTypes as $accountType)
                                                                        <option
                                                                            @if($account->id_type_account ==$accountType->id ) selected
                                                                            @endif
                                                                            value="{{$accountType->id}}">{{$accountType->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                                {{--                                                                {{$account->accountType->title}}--}}
                                                            </td>
                                                            <td class="col-sm-3">
                                                                <input form="edit_{{$account->id}}" type="text" class="form-control ltr w-100"
                                                                       name="value" id="" value="{{$account->value}}">
                                                                {{--                                                                {{$account->value}}--}}
                                                            </td>
                                                            <td class="col-sm-3">
                                                                <form action="{{route('accounts.destroy',$account)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" value="حذف"
                                                                           class="btn btn-danger">
                                                                </form>
                                                                <form action="{{route('accounts.update',$account)}}"
                                                                      method="post" id="edit_{{$account->id}}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="submit" value="ویرایش"
                                                                           class="btn btn-success">
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>نوع اکانت</th>
                                                        <th>مقدار</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @include('errors')

                </div>
            </div>
        </div>
        </div>
    </section>





@endsection

@section('scripts')
    <script>

        function selectSayer(selectObj) {
            // get the index of the selected option
            var idx = selectObj.selectedIndex;
            var which = selectObj.options[idx].value;
            // alert(which);
            // get the value of the selected option
            var divAccountType = $('.account_type');
            if (which == 999) {
                divAccountType.append(
                        '<div class="col-sm-3" id="accounttypetitle">'+
                            '<input type="text" class="form-control " id="accounttype"'+
                                   'name="title"'+
                                   'placeholder="نوع اکانت مد نظر را تایپ کنید">'+
                        '</div>'
                )
            } else{
                var accounttypetitle=$('#accounttypetitle');
                accounttypetitle.remove();
            }
            // alert("ok khodeshe");

            // use the selected option value to retrieve the list of items from the countryLists array
            // cList = countryLists[which];
            // // get the country select element via its known id
            // var cSelect = document.getElementById("country");
            // // remove the current options from the country select
            // var len = cSelect.options.length;
            // while (cSelect.options.length > 0) {
            //     cSelect.remove(0);
            // }
            // var newOption;
            // // create new options
            // for (var i = 0; i < cList.length; i++) {
            //     newOption = document.createElement("option");
            //     newOption.value = cList[i];  // assumes option string and value are the same
            //     newOption.text = cList[i];
            //     // add the new option
            //     try {
            //         cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
            //     } catch (e) {
            //         cSelect.appendChild(newOption);
            //     }
            // }
        }


        $('#accountTypeNew').on('change', function () {

            alert($(this).find(":selected").val());
        });

        function registerAccount(dataID, Item) {
            var tagAccountNew = $('#accountNew');
            var accountTypeNew = $('#accountTypeNew');

            var accountValue = $('#accountNew').val();
            var accountTypeNew = $('#accountTypeNew').val();
            var dataAccountRegister = $('#dataAccountRegister');

            // alert('value=>' + accountValue + '  ####accounts_type=>' + accountTypeNew + '   ####account_id=>' + dataID + '   ###account_type =>' + Item);
            $.ajax({
                type: 'post',
                url: '/accounts',
                data: {
                    _token: "{{csrf_token()}}",
                    value: accountValue,
                    account_type: Item,
                    account_id: dataID,
                    id_type_account: accountTypeNew,
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        // alert(data.success);
                        dataAccountRegister.append(
                            '<tr id="tr_' + data.accountInsert['id'] + '_' + data.accountInsert['account_id'] + '">' +
                            '<td>' +


                            '<select name="accountType_' + data.accountInsert['id'] + '" class="form-control" id="accountTypeNew">' +
                            @foreach($accountTypes as $accountType)
                                '<option value="' +
                            +'{{$accountType->id}}">{{$accountType->title}}</option>' +
                            @endforeach
                                '</select>' +

                            +data.accountInsert['id_type_account'] + '' +

                            '</td>' +
                            '<td>' + data.accountInsert['value'] + '</td>' +
                            '</tr>'

                            // '<tr id="tr_' + dataID + '_' + data.emailInsert['id'] + '">' +
                            // '<td>' + data.count + '</td>' +
                            // '<td id="value_' + dataID + '_' + data.emailInsert['id'] + '">' +
                            // '<input type="email" class="form-control" id="update_email_' + dataID + '_' + data.emailInsert['id'] + '" name="update_email_' + dataID + '_' + data.emailInsert['id'] + '"  value="' + data.emailInsert['value'] + '" >' +
                            // '<div class="bg-danger hide" id="error" ></div>' +
                            // '</td>' +
                            // '<td>' +
                            {{--'<span  class="btn btn-success " onclick="editEmail(' + dataID + ',' + '\'{{$type}}\'' + ',' + data.emailInsert['id'] + ')"' + '>' + '<i class="fa fa-edit"></i>' + '</span>' +--}}
                            {{--'<span  class="btn btn-danger " onclick="removeEmail(' + dataID + ',' + '\'{{$type}}\'' + ',' + data.emailInsert['id'] + ')"' + '>' + '<i class="fa fa-trash-o"></i>' + '</span>' +--}}
                            // '</td>' +
                            // '</tr>'
                        );

                    } else {
                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").css('display', 'block');
                        $.each(data.error, function (key, value) {
                            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                        });

                    }

                    // tagEmailNew.val("");


                },
            });
        }



    </script>


    @include('layouts.share.script')




@endsection
