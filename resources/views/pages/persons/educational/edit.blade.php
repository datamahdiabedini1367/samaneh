@extends('layouts.master.createFormMaster')

@section('page-title')
    ویرایش اطلاعات تحصیلی
    {{$educational->person->firstName}}
    {{$educational->person->lastName}}
@endsection


@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','create_educational')->first())
        <a href="{{route('educational.show',[$educational->person_id])}}"
           class="btn btn-sm btn-success float-left mx-2">
            بازگشت به سوابق تحصیلی
        </a>
    @endcan
@endsection


@section('create_form')
    <div class="row">
        <div class="col-sm-12 p-3">

            {{ Form::model($educational,['route'=>['educational.update',$educational->id] ,'method'=>'patch','id'=>"educationPersonUpdate" ]) }}
            <div class="row">
                <div class="col-sm-4"><div class="form-group">
                        {{Form::label('grade','مقطع تحصیلی :') }}
                        {{Form::text('grade',$educational->grade, ['class'=>'form-control' , 'placeholder'=>'مقطع تحصیلی را وارد کنید'])}}
                    </div></div>
                <div class="col-sm-4"><div class="form-group">
                        {{Form::label('major','رشته تحصیلی :')}}
                        {{Form::text('major',$educational->major, ['class'=>"form-control",'placeholder'=>"رشته تحصیلی را وارد کنید"])}}
                    </div></div>
                <div class="col-sm-4"><div class="form-group">
                        {{Form::label('universityName','نام موسسه/دانشگاه :')}}
                        {{Form::text('universityName',$educational->universityName, ['class'=>"form-control",'placeholder'=>"نام موسسه/دانشگاه را وارد کنید"])}}
                    </div></div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-danger text-bold" id="error_grade">
                    @error('grade')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger text-bold" id="error_major">
                    @error('major')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger text-bold" id="error_universityName">
                    @error('universityName')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('average','معدل :')}}
                        {{Form::text('average',$educational->average, ['class'=>"form-control",'placeholder'=>"معدل را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('startDate','تاریخ شروع :')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            {{Form::text('startDate',$educational->startDate, ['class'=>"form-control",'placeholder'=>"تاریخ شروع را وارد کنید"])}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"><div class="form-group">
                        {{Form::label('endDate','تاریخ اتمام :')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                            </div>
                            {{Form::text('endDate',$educational->endDate, ['class'=>"form-control",'placeholder'=>"تاریخ اتمام را وارد کنید"])}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4 text-danger text-bold" id="error_average">
                    @error('average')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger text-bold" id="error_startDate">
                    @error('startDate')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-sm-4 text-danger text-bold" id="error_endDate">
                    @error('endDate')
                    {{$message}}
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {{Form::label('address','آدرس :')}}
                        {{Form::textarea('address',$educational->address, ['class'=>"form-control",'placeholder'=>"آدرس را وارد کنید",'rows'=>1])}}
                    </div>
                </div>
            </div>
            <div class="row pt-0 pb-2">
                <div class="col-sm-2 text-danger  text-bold" id="error_address">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    {{Form::submit('ثبت',['class'=>"btn btn-primary float-left",'id'=>'submit_button'])}}
                </div>
            </div>

            {{Form::close()}}
        </div>
    </div>

@endsection

@section('scriptsExtra')

    <script>
        $('#educationPersonUpdate').validate(
            {
                rules: {
                    grade: {required: true, minlength: 3},
                    major: {required: true, minlength: 3},
                    universityName: {required: true, minlength: 3},
                    average: {number: true},
                    startDate: {dateISO: true},
                    endDate: {dateISO: true},
                },
                messages: {
                    grade: {
                        required: "مقطع تحصیلی اجباریست",
                        minlength: jQuery.validator.format("حداقل طول مقطع تحصیلی باید بیشتر از {0} حرف باشد"),
                    },
                    major: {
                        required: "رشته تحصیلی اجباریست",
                        minlength: jQuery.validator.format("حداقل طول رشته تحصیلی باید بیشتر از {0} حرف باشد"),
                    },
                    universityName: {
                        required: "نام موسسه/دانشگاه اجباریست",
                        minlength: jQuery.validator.format("حداقل طول نام موسسه/دانشگاه باید بیشتر از {0} حرف باشد"),
                    },
                    average: {number: "مقدار معدل باید از نوع عددی باشد"},
                    startDate: {dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01"},
                    endDate: {dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01"},
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




