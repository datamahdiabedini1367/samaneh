@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ویرایش شرکت {{$company->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">ویرایش شرکت  {{$company->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 m-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">فرم ویرایش شرکت  {{$company->name}}</h3>
                        </div>

                        <form role="form" method="post" action="{{route('companies.update',$company)}}"
                              id="store_project">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">

                                <div class="form-group">

                                    <label for="name"> نام شرکت :</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="نام شرکت  را وارد کنید" value="{{$company->name}}">
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label for="email"> ایمیل شرکت :</label>--}}
{{--                                    @foreach($company->emails() as $email)--}}
{{--                                    <input type="email" class="form-control"--}}
{{--                                           name="emails[{{$company->id}}][value][{{$email->id}}]"--}}
{{--                                           oninput="checkemail({{$company->id}},{{$email->id}})"--}}
{{--                                           placeholder="ایمیل مورد نظر را وارد کنید" value="{{$email->value}}">--}}
{{--                                        <div class="alert alert-danger error hide" id="emails[{{$company->id}}][value][{{$email->id}}]">--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                    <span id="add_email_box" title="اضافه کردن ایمیل" class="btn btn-success"--}}
{{--                                          onclick="update_text_item_Box('email','email','ایمیل',{{$company->id}})">+</span>--}}
{{--                                    <div id="emailbox"></div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="email"> شماره تماس شرکت :</label>--}}
{{--                                    @foreach($company->phones as $phone)--}}
{{--                                    <input type="text" class="form-control" id="phone" name="phones[{{$company->id}}][value][{{$phone->id}}]"--}}
{{--                                           placeholder="شماره تماس مورد نظر  را وارد کنید" value="{{$phone->value}}">--}}
{{--                                    @endforeach--}}
{{--                                    <span id="add_email_box" title="اضافه کردن شماره تماس" class="btn btn-success"--}}
{{--                                          onclick="update_text_item_Box('phone','text','شماره تماس',{{$company->id}})">+</span>--}}
{{--                                    <div id="phonebox"></div>--}}
{{--                                </div>--}}


                                <div class="form-group">
                                    <label for="registration_number"> شماره ثبت شرکت :</label>
                                    <input type="text" class="form-control" id="registration_number"
                                           name="registration_number"
                                           placeholder="شماره ثبت شرکت  را وارد کنید"
                                           value="{{$company->registration_number}}">
                                </div>

                                <div class="form-group">
                                    <label> تاریخ ثبت شرکت :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                        </div>
                                        <input class="normal-example form-control" name="registration_date"
                                               value="{{$company->registration_date}}"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="address"> آدرس شرکت :</label>
                                    <textarea class="form-control" id="address" name="address"
                                              placeholder="آدرس شرکت  را وارد کنید">
                                        {{$company->address}}
                                    </textarea>
                                </div>


                                <div class="form-group">
                                    <label>توضیحات</label>
                                    <textarea class="form-control" rows="3" placeholder="توضیحات را وارد کنید ..."
                                              name="description">
                                        {{$company->description}}
                                    </textarea>
                                </div>

                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ثبت </button>
                            </div>
                        </form>


                        @include('errors')

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        function add_text_item_Box(item,type,title) {
            var a = $("div#"+item+"box ."+item+"Account").length;
            count = a + 1;
            var company_id='';
            @isset($company->id)
                company_id = {{$company->id}};
            @else
                company_id = '';
            @endisset
            var output = '' +
                '<div class="form-group row '+item+'Account">' +
                '<label  class="col-sm-2 col-form-label" for="'+item+'_' + count + '">' +title+'</label>' +
                '<div class="col-sm-10">' +
                '<input type="'+type+'" class="form-control" id="'+item+'_' + count + '" name="'+item+'s[][value]" placeholder="'+ title+' مورد نظر را وارد کنید '+'">'+
                '</div>' +
                '</div>';

            $('#'+item+'box').append(output);
        }

        function checkemail(itemId,Id) {

            var emailValue = document.getElementsByName('emails['+itemId+'][value]['+Id+']')[0].value;
            console.log(emailValue);

            $.ajax({
                type:'get',
                url:'/checkemail/'+itemId,
                data: {
                    email:emailValue
                },
                success:function(data){
                    var item=document.getElementById('emails['+itemId+'][value]['+Id+']');

                    if(data.msg_error !== '')
                    {
                        item.innerText=data.msg_error;
                        item.classList.add('show');
                        item.classList.remove('hide');
                    } else {
                        item.innerText='';
                        item.classList.add('hide');
                        item.classList.remove('show');
                    }
                },

            });
        }


        function update_text_item_Box(item,type,title,itemId) {
            var a = $("div#"+item+"box ."+item+"Account").length;
            count = a + 1;
            var output = '' +
                '<div class="form-group row '+item+'Account">' +
                '<label  class="col-sm-2 col-form-label" for="'+item+'_' + count + '">' +title+'</label>' +
                '<div class="col-sm-10">' +
                '<input type="'+type+'" class="form-control" id="'+item+'_' + count + '" name="'+item+'s['+itemId+'][value][]" placeholder="'+ title +' مورد نظر را وارد کنید '+'"'+
                {{--'oninput="checkemail(itemId,{{$email->id}})"'+--}}
                    title+' مورد نظر را وارد کنید '+'">'+
                '<div class="alert alert-danger error hide" id="emails['+itemId+'][value][]">'+
            '</div>' +
            '</div>';

            $('#'+item+'box').append(output);
        }


    </script>

@endsection


