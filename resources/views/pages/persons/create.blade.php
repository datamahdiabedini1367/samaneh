@extends('layouts.master.createFormMaster')

@section('page-title')
    تعریف فرد جدید
@endsection
@section('icon')
        <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan
@endsection


@section('create_form')

{{Form::open(['route'=>'persons.store','id'=>"storePerson"] )}}
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('firstName','نام :')}}
                        {{Form::text('firstName',old('firstName'),['class'=>"form-control",'placeholder'=>"نام را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('nikeName','اسم مستعار :')}}
                        {{Form::text('nikeName',old('nikeName'),['class'=>"form-control",'placeholder'=>"اسم مستعار را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('lastName','نام خانوادگی :')}}
                        {{Form::text('lastName',old('lastName'),['class'=>"form-control",'placeholder'=>"نام خانوادگی را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('fatherName','نام پدر :')}}
                        {{Form::text('fatherName',old('fatherName'),['class'=>"form-control",'placeholder'=>"نام پدر را وارد کنید"])}}
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-3 text-danger text-bold" id="error_firstName">
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
                        {{Form::text('motherName',old('motherName'),['class'=>"form-control",'placeholder'=>"نام مادر را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('birthdatePlace','مکان تولد  :')}}
                        {{Form::text('birthdatePlace',old('birthdatePlace'),['class'=>"form-control",'placeholder'=>" مکان تولد را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('nationalCode',' کد ملی :')}}
                        {{Form::text('nationalCode',old('nationalCode'),['class'=>"form-control",'placeholder'=>" کد ملی را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('birthdate','تاریخ تولد:')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            {{Form::text('birthdate',old('birthdate'),['class'=>"form-control",'placeholder'=>"تاریخ تولد را وارد کنید"])}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-3 text-danger text-bold" id="error_motherName">
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
                <div class="col-sm-3 text-danger  text-bold " id="error_birthdate">
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
                            {{Form::radio('married','1',old('married'),['class'=>"form-check-input"])}}
                            {{Form::label('married','متاهل',['class'=>"form-check-label"])}}
                        </div>
                        <div class="form-check">
                            {{Form::radio('married','0',old('married'),['class'=>"form-check-input"])}}
                            {{Form::label('married','مجرد',['class'=>"form-check-label"])}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('gender',' جنسیت :')}}
                        <div class="form-check">

                            {{Form::radio('gender','1',old('married'),['class'=>"form-check-input"])}}
                            {{Form::label('gender','مرد',['class'=>"form-check-label"])}}
                        </div>
                        <div class="form-check">
                            {{Form::radio('gender','0',old('married'),['class'=>"form-check-input"])}}
                            {{Form::label('gender','زن',['class'=>"form-check-label"])}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-0 pb-2">
                <div class="col-sm-4 text-danger text-bold " id="error_married">
                    @error('married')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger  text-bold " id="error_gender">
                    @error('gender')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('address','   آدرس:')}}
                        {{Form::textarea('address',old('address'),['class'=>"form-control",'placeholder'=>"  آدرس را وارد کنید",'rows'=>"1"])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('bio','   بیوگرافی:')}}
                        {{Form::textarea('bio',old('bio'),['class'=>"form-control",'placeholder'=>"  بیوگرافی را وارد کنید",'rows'=>"1"])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('entertainments','   سرگرمی ها:')}}
                        {{Form::textarea('entertainments',old('entertainments'),['class'=>"form-control",'placeholder'=>"  سرگرمی ها را وارد کنید",'rows'=>"1"])}}
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-4 text-danger text-bold " id="error_address">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger  text-bold " id="error_bio">
                    @error('bio')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger  text-bold " id="error_entertainments">
                    @error('entertainments')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('personalFavorites','   علایق شخصی :')}}
                        {{Form::textarea('personalFavorites',old('personalFavorites'),['class'=>"form-control",'placeholder'=>"  علایق شخصی  را وارد کنید",'rows'=>"1"])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('politicalOrientation','   گرایش سیاسی :')}}
                        {{Form::textarea('politicalOrientation',old('politicalOrientation'),['class'=>"form-control",'placeholder'=>"  گرایش سیاسی  را وارد کنید",'rows'=>"1"])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('languageUse','   زبانهای مورد استفاده :')}}
                        {{Form::textarea('languageUse',old('languageUse'),['class'=>"form-control",'placeholder'=>"  زبانهای مورد استفاده  را وارد کنید",'rows'=>"1"])}}
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-4 text-danger text-bold " id="error_personalFavorites">
                    @error('personalFavorites')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger text-bold " id="error_politicalOrientation">
                    @error('politicalOrientation')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger text-bold " id="error_languageUse">
                    @error('languageUse')
                    {{$message}}
                    @enderror
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-sm-12">
                    {{Form::submit('ثبت',['class'=>"btn btn-primary float-left",'id'=>'submit_button'])}}
                </div>
            </div>
        </div>

    {{Form::close()}}



@endsection

@section('scriptsExtra')

    <script>
        $('#storePerson').validate(
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


