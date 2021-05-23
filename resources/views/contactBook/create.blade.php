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
                    <h1>ثبت اطلاعات تماس</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> ثبت اطلاعات تماس</li>
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
                                        <h3 class="card-title">ثبت اطلاعات تماس
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
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        ثبت ایمیل

                                        @csrf
                                        <div class="row py-2">

                                            <label for="email" class="form-group col-sm-2"> ایمیل :</label>

                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" id="emailNew"
                                                       name="email[{{$dataId}}][value]"
                                                       placeholder="ایمیل مورد نظر را وارد کنید">
                                            </div>

                                            <div class="col-sm-3">
                                        <span type="submit" class="btn btn-primary" id="register_email"
                                              onclick="registerEmail({{$dataId}} ,'{{$type}}')">+</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hide" id="newEmail"></div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card ">
                                                    <div class="card-body pt-5">
                                                        <table class="table table-bordered table-striped  w-100" id="emailtable">
                                                            <thead>
                                                            <tr>
                                                                <th>ردیف</th>
                                                                <th>ایمیل</th>
                                                                <th>عملیات</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody id="dataEmailRegister">

                                                            @foreach($item->emails as $email)

                                                                <tr id="tr_{{$email->email_id}}_{{$email->id}}">
                                                                    <td>{{$email->id}}</td>
                                                                    <td id="value_{{$email->email_id}}_{{$email->id}}">
                                                                        <input type="email" class="form-control"
                                                                               id="update_email_{{$email->email_id}}_{{$email->id}}"
                                                                               name="update_email_{{$email->email_id}}_{{$email->id}}"
                                                                               value="{{$email->value}}">
                                                                        <div class="bg-danger hide" id="error"></div>
                                                                    </td>
                                                                    <td>
                                                                <span class="btn btn-success "
                                                                      onclick="editEmail({{$email->email_id}},'{{$type}}', {{$email->id}})">
                                                                    <i class="fa fa-edit"></i>
                                                                </span>
                                                                        <span class="btn btn-danger "
                                                                              onclick="removeEmail({{$email->email_id}},'{{$type}}',{{$email->id}})">
                                                                    <i class="fa fa-trash-o"></i></span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>ردیف</th>
                                                                <th>ایمیل</th>
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

                                <div class="col-sm-6">
                                    <div class="card-body">
                                        ثبت شماره تماس

                                        @csrf
                                        <div class="row py-2">

                                            <label for="phone" class="form-group col-sm-3"> شماره تماس :</label>

                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="phoneNew"
                                                       name="phone[{{$dataId}}][value]"
                                                       placeholder="شماره تماس مورد نظر را وارد کنید">
                                            </div>

                                            <div class="col-sm-3">
                                        <span type="submit" class="btn btn-primary" id="register_phone"
                                              onclick="registerPhone({{$dataId}},'{{$type}}')">+</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger hide" id="newPhone"></div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card ">
                                                    <div class="card-body pt-5">
                                                        <table class="table table-bordered table-striped  w-100"
                                                               id="phonetable">
                                                            <thead>
                                                            <tr>
                                                                <th>ردیف</th>
                                                                <th>شماره تماس</th>
                                                                <th>عملیات</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody id="dataPhoneRegister">
                                                            @foreach($item->phones as $phone)

                                                                <tr id="tr_{{$phone->phone_id}}_{{$phone->id}}">
                                                                    <td>{{$phone->id}}</td>
                                                                    <td id="value_{{$phone->phone_id}}_{{$phone->id}}">
                                                                        <input type="email" class="form-control"
                                                                               id="update_phone_{{$phone->phone_id}}_{{$phone->id}}"
                                                                               name="update_email_{{$phone->phone_id}}_{{$phone->id}}"
                                                                               value="{{$phone->value}}">
                                                                        <div class="bg-danger hide" id="error"></div>
                                                                    </td>
                                                                    <td>
                                                                <span class="btn btn-success "
                                                                      onclick="editPhone( {{$phone->phone_id}},'{{$type}}', {{$phone->id}})">
                                                                    <i class="fa fa-edit"></i>
                                                                </span>
                                                                        <span class="btn btn-danger "
                                                                              onclick="removePhone({{$phone->phone_id}},'{{$type}}',{{$phone->id}})">
                                                                    <i class="fa fa-trash-o"></i></span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>ردیف</th>
                                                                <th>شماره تماس</th>
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

        function registerEmail(dataID, Item) {


            var tagEmailNew = $('#emailNew');

            var email = $('#emailNew').val();
            var dataEmailRegister = $('#dataEmailRegister');
            console.log(Item);
            $.ajax({
                type: 'post',
                url: '/emails',
                data: {
                    _token: "{{csrf_token()}}",
                    value: email,
                    emailType: Item,
                    emailId: dataID
                },
                success: function (data) {
                    tagEmailNew.val("");
                    dataEmailRegister.append('<tr id="tr_' + dataID + '_' + data.emailInsert['id'] + '">' +
                        '<td>' + data.count + '</td>' +
                        '<td id="value_' + dataID + '_' + data.emailInsert['id'] + '">' +
                        '<input type="email" class="form-control" id="update_email_' + dataID + '_' + data.emailInsert['id'] + '" name="update_email_' + dataID + '_' + data.emailInsert['id'] + '"  value="' + data.emailInsert['value'] + '" >' +
                        '<div class="bg-danger hide" id="error" ></div>' +
                        '</td>' +
                        '<td>' +
                        '<span  class="btn btn-success " onclick="editEmail(' + dataID + ',' + '\'{{$type}}\'' + ',' + data.emailInsert['id'] + ')"' + '>' + '<i class="fa fa-edit"></i>' + '</span>' +
                        '<span  class="btn btn-danger " onclick="removeEmail(' + dataID + ',' + '\'{{$type}}\'' + ',' + data.emailInsert['id'] + ')"' + '>' + '<i class="fa fa-trash-o"></i>' + '</span>' +
                        '</td>' +
                        '</tr>'
                    );


                },
            });
        }

        function editEmail(dataID, item, id) {
            var value = $('#update_email_' + dataID + '_' + id).val();
            var msg = $('#value_' + dataID + '_' + id + '>#error');

            // alert(dataID + ',' + item + ',' + id + ',' + value)
            $.ajax({
                type: 'patch',
                url: '/emails/' + id,
                data: {
                    _token: "{{csrf_token()}}",
                    value: value,
                    dataId: dataID,
                },
                success: function (data) {
                    if (data.msg !== '') {
                        msg.addClass('show');
                        msg.removeClass('hide');
                        msg.text(data.msg);
                    } else {
                        msg.addClass('hide');
                        msg.removeClass('show');
                        msg.toggle('hide');
                    }

                },
            });


        }

        function removeEmail(dataID, item, id) {
            var recordDelete = $('#tr_' + dataID + '_' + id);
            $.ajax({
                type: 'delete',
                url: '/emails/' + id,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    if (data.msg !== '') {
                        recordDelete.remove();
                    }

                },
            });

        }

        // --------------------------
        function registerPhone(dataID, Item) {

            var tagPhoneNew = $('#phoneNew');

            var phone = $('#phoneNew').val();
            var dataPhoneRegister = $('#dataPhoneRegister');
            // alert(Item);
            console.log(Item);
            $.ajax({
                type: 'post',
                url: '/phones',
                data: {
                    _token: "{{csrf_token()}}",
                    value: phone,
                    phoneType: Item,
                    phoneId: dataID
                },
                success: function (data) {
                    tagPhoneNew.val("");
                    dataPhoneRegister.append('<tr id="tr_' + dataID + '_' + data.phoneInsert['id'] + '">' +
                        '<td>' + data.count + '</td>' +
                        '<td id="value_' + dataID + '_' + data.phoneInsert['id'] + '">' +
                        '<input type="text" class="form-control" id="update_phone_' + dataID + '_' + data.phoneInsert['id'] + '" name="update_phone_' + dataID + '_' + data.phoneInsert['id'] + '"  value="' + data.phoneInsert['value'] + '" >' +
                        '<div class="bg-danger hide" id="error" ></div>' +
                        '</td>' +
                        '<td>' +
                        '<span  class="btn btn-success " onclick="editPhone(' + dataID + ',' + '\'{{$type}}\'' + ',' + data.phoneInsert['id'] + ')"' + '>' + '<i class="fa fa-edit"></i>' + '</span>' +
                        '<span  class="btn btn-danger " onclick="removePhone(' + dataID + ',' + '\'{{$type}}\'' + ',' + data.phoneInsert['id'] + ')"' + '>' + '<i class="fa fa-trash-o"></i>' + '</span>' +
                        '</td>' +
                        '</tr>'
                    );


                },
            });
        }

        function editPhone(dataID, item, id) {
            var value = $('#update_phone_' + dataID + '_' + id).val();
            var msg = $('#value_' + dataID + '_' + id + '>#error');
            alert(value) ;
            alert(msg);


            alert(dataID + ',' + item + ',' + id + ',' + value)
            $.ajax({
                type: 'patch',
                url: '/phones/' + id,
                data: {
                    _token: "{{csrf_token()}}",
                    value: value,
                    dataId: dataID,
                },
                success: function (data) {
                    if (data.msg !== '') {
                        msg.addClass('show');
                        msg.removeClass('hide');
                        msg.text(data.msg);
                    } else {
                        msg.addClass('hide');
                        msg.removeClass('show');
                        msg.toggle('hide');
                    }

                },
            });

        }

        function removePhone(dataID, item, id) {
            var recordDelete = $('#tr_' + dataID + '_' + id);
            $.ajax({
                type: 'delete',
                url: '/phones/' + id,
                data: {
                    _token: "{{csrf_token()}}",
                    // value: value,
                    // dataId: dataID,
                },
                success: function (data) {
                    if (data.msg !== '') {
                        recordDelete.remove();
                    }

                },
            });

        }

        // --------------------------


    </script>


    @include('layouts.share.script')




@endsection
