@extends('layouts.master.createFormMaster')

@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('page-title')
    ویرایش اطلاعات فرد
@endsection
@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan
@endsection


@section('create_form')

    {{Form::model($person,['route'=>['persons.update',$person->id],'method'=>'put'] , ['id'=>"update_person"])}}
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('firstName','نام :')}}
                        {{Form::text('firstName',$person->firstName , ['class'=>"form-control",'placeholder'=>"نام را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('nikeName','اسم مستعار :')}}
                        {{Form::text('nikeName',$person->nikeName , ['class'=>"form-control",'placeholder'=>"اسم مستعار را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('lastName','نام خانوادگی :')}}
                        {{Form::text('lastName',$person->lastName , ['class'=>"form-control",'placeholder'=>"نام خانوادگی را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('fatherName','نام پدر :')}}
                        {{Form::text('fatherName',$person->fatherName , ['class'=>"form-control",'placeholder'=>"نام پدر را وارد کنید"])}}
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-3 text-danger text-bold " id="error_firstName">
                    @error('firstName')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-3 text-danger text-bold " id="error_nikeName">
                    @error('nikeName')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-3 text-danger text-bold " id="error_lastName">
                    @error('lastName')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-3 text-danger text-bold " id="error_fatherName">
                    @error('fatherName')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('motherName','نام مادر :')}}
                        {{Form::text('motherName',$person->motherName , ['class'=>"form-control",'placeholder'=>"نام مادر را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('birthdatePlace','مکان تولد :')}}
                        {{Form::text('birthdatePlace',$person->birthdatePlace,['class'=>"form-control",'placeholder'=>" مکان تولد را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('nationalCode','کد ملی :')}}
                        {{Form::text('nationalCode',$person->nationalCode,['class'=>"form-control",'placeholder'=>" کد ملی را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('birthdate','تاریخ تولد :')}}
                        <label> تاریخ تولد :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                            </div>
                            {{Form::text('birthdate',$person->birthdate_person,['class'=>'normal-example form-control'])}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div id="error_motherName" class="col-sm-3 text-danger  text-bold  ">
                    @error('motherName')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-3 text-danger  text-bold" id="error_birthdatePlace">
                    @error('birthdatePlace')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-3 text-danger  text-bold" id="error_nationalCode">
                    @error('nationalCode')
                    {{$message}}
                    @enderror
                </div>

                <div id="error_birthdate" class="col-sm-3 text-danger  text-bold  ">
                    @error('birthdate')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('married','وضعیت تاهل :')}}
                        <div class="form-check">
                            {{Form::radio('married','1',$person->married==1,['class'=>"form-check-input"])}}
                            {{Form::label('married1','متاهل')}}
                        </div>
                        <div class="form-check">
                            {{Form::radio('married','0',$person->married==0,['class'=>"form-check-input"])}}
                            {{Form::label('married1','مجرد')}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('gender','جنسیت :')}}

                        <div class="form-check">
                            {{Form::radio('gender','1',$person->gender==1,['class'=>"form-check-input"])}}
                            {{Form::label('gender','مرد')}}
                        </div>
                        <div class="form-check">
                            {{Form::radio('gender','0',$person->gender==0,['class'=>"form-check-input"])}}
                            {{Form::label('gender','زن')}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="row pt-0 pb-2">
                <div id="error_married" class="col-sm-3 text-danger  text-bold  ">
                    @error('married')
                    {{$message}}
                    @enderror
                </div>
                <div id="error_gender" class="col-sm-3 text-danger  text-bold  ">
                    @error('gender')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('address','آدرس:')}}
                        {{Form::textarea('address',$person->address,['class'=>"form-control", 'rows'=>"1", 'placeholder'=>"وارد کردن اطلاعات ..."])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('bio','بیوگرافی:')}}
                        {{Form::textarea('bio',$person->bio,['class'=>"form-control", 'rows'=>"1", 'placeholder'=>"بیو گرافی را وارد کنید..."])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('entertainments','سرگرمی ها:')}}
                        {{Form::textarea('entertainments',$person->entertainments,['class'=>"form-control", 'rows'=>"1", 'placeholder'=>"سرگرمی ها را وارد کنید..."])}}
                    </div>
                </div>

            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-4 text-danger  text-bold" id="error_address">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger  text-bold" id="error_bio">
                    @error('bio')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger  text-bold" id="error_entertainments">
                    @error('entertainments')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('personalFavorites','علایق شخصی:')}}
                        {{Form::textarea('personalFavorites',$person->entertainments,['class'=>"form-control", 'rows'=>"1", 'placeholder'=>"علایق شخصی  را وارد کنید..."])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('politicalOrientation','گرایش سیاسی:')}}
                        {{Form::textarea('politicalOrientation',$person->politicalOrientation,['class'=>"form-control", 'rows'=>"1", 'placeholder'=>"گرایش سیاسی  را وارد کنید..."])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('languageUse','زبانهای مورد استفاده:')}}
                        {{Form::textarea('languageUse',$person->languageUse,['class'=>"form-control", 'rows'=>"1", 'placeholder'=>"زبانهای مورد استفاده را وارد کنید..."])}}
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div id="error_personalFavorites" class="col-sm-4 text-danger  text-bold  ">
                    @error('personalFavorites')
                    {{$message}}
                    @enderror
                </div>
                <div id="error_politicalOrientation" class="col-sm-4 text-danger  text-bold  ">
                    @error('politicalOrientation')
                    {{$message}}
                    @enderror
                </div>
                <div id="error_languageUse" class="col-sm-4 text-danger  text-bold  ">
                    @error('languageUse')
                    {{$message}}
                    @enderror
                </div>
            </div>


        </div>


        <div class="card-footer">
            <div class="row">
                <div class="col-sm-12">
                    {{Form::submit('ثبت شخص',['class'=>"btn btn-primary float-left",'id'=>'submit_button'])}}
                </div>
            </div>
        </div>
    {{Form::close()}}

@endsection


@section('scriptsExtra')

    <script>
        $('#update_person').validate(
            {
                rules: {
                    firstName: {required: true, minlength: 3},
                    lastName: {required: true, minlength: 3},
                    gender: {required: true},
                    married: {required: true},
                    birthdate: {dateISO: true},
                    nationalCode: {digits: true, minlength: 10, maxlength: 10},
                },
                messages: {
                    firstName: {
                        required: " نام اجباریست",
                        minlength: jQuery.validator.format("حداقل طول نام باید بیشتر از {0} حرف باشد"),
                    },
                    lastName: {
                        required: " نام خانوادگی اجباریست",
                        minlength: jQuery.validator.format("حداقل طول نام خانوادگی باید بیشتر از {0} حرف باشد"),
                    },
                    gender: {
                        required: "جنسیت انتخاب نشده است",
                    },
                    married: {
                        required: "وضعیت تاهل انتخاب نشده است",
                    },
                    birthdate: {
                        dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01",
                    },
                    nationalCode: {
                        digits: "در فیلد کد ملی فقط عدد می تواند ثبت شود",
                        minlength: jQuery.validator.format("تعداد اعداد کد ملی  باید {0} رقم باشد"),
                        maxlength: jQuery.validator.format("تعداد اعداد کد ملی  باید {0} رقم باشد"),
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


