@extends('layouts.master.createFormMaster')


@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('page-title')
    ویرایش سوابق شغلی
    {{$person->firstName}} {{$person->lastName}}
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','list_person_educational_export')->first())
        <a href="{{route('experience.show',[$person])}}"
           class="btn btn-sm btn-success float-left">
            بازگشت به سوابق شغلی
            {{$person->firstName}} {{$person->lastName}}
        </a>
    @endcan

@endsection

@section('create_form')

    <div class="row">
        <div class="col-sm-12 m-3">
            <div>
                » در صورتی که نام شرکت در لیست شرکتها نیست ابتدا شرکت مورد نظر را ثبت کنید برای ثبت اطلاعات شرکت <a
                    href="{{route('companies.create')}}">اینجا</a> را کلیک کنید.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 ">

            @can('isAccess',\App\Models\Permission::query()->where('title','edit_savabegh_jobs')->first())

                {{Form::open(['route'=>['experience.update',$companyPerson->id] , 'method'=>'patch', 'id'=>"updateSavabegh"])}}

                <div class="row mx-3">
                    <div class="col-sm-4">
                        <div class="form-group styled-select">
                            {{Form::label('company_id','نام شرکت :')}}
                            {{Form::select('company_id',$companies,$companyPerson->company_id,['class'=>"form-control input-lg select2",'onchange'=>"selectRelated(this)",'placeholder' => 'شرکت را انتخاب کنید'])}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('semat','سمت :')}}
                            {{Form::text('semat',$companyPerson->semat,['class'=>"form-control",'placeholder'=>"سمت را وارد کنید "])}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('section','بخش :')}}
                            {{Form::text('section',$companyPerson->section,['class'=>"form-control",'placeholder'=>"بخش را وارد کنید "])}}
                        </div>
                    </div>
                </div>
                <div class="row mb-3 mx-3">
                    <div class="col-sm-4 text-danger text-bold " id="error_company_id"> @error('company_id') {{$message}} @enderror </div>
                    <div class="col-sm-4 text-danger text-bold " id="error_semat"> @error('semat') {{$message}} @enderror </div>
                    <div class="col-sm-4 text-danger text-bold" id="error_section"> @error('section') {{$message}} @enderror </div>
                </div>

                <div class="row mx-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('startDate','تاریخ شروع به کار:')}}
                            <label for="startDate"> تاریخ شروع به کار :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                {{Form::text('startDate',$companyPerson->startDate,['class'=>"index_saveDate form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('endDate','تاریخ اتمام کار :')}}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                </div>
                                {{Form::text('endDate',$companyPerson->endDate,['class'=>"form-control"])}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('reasonLeavingJob','علت ترک شغل :')}}
                            {{Form::textarea('reasonLeavingJob',$companyPerson->reasonLeavingJob,['class'=>"form-control",'placeholder'=>"علت ترک شغل را وارد کنید ",'rows'=>1])}}
                        </div>
                    </div>
                </div>
                <div class="row mb-3 mx-3">
                    <div class="col-sm-4 text-danger text-bold " id="error_startDate">@error('startDate') {{$message}} @enderror</div>
                    <div class="col-sm-4 text-danger text-bold " id="error_endDate"> @error('endDate') {{$message}} @enderror </div>
                    <div class="col-sm-4 text-danger text-bold" id="error_reasonLeavingJob"> @error('reasonLeavingJob') {{$message}} @enderror </div>
                </div>

                <div class="row m-3">
                    <div class="col-sm-12 ">
                        <div class="form-group ">
                            {{Form::submit('ثبت',['class'=>"btn btn-outline-primary float-left",'id'=>'submit_button']) }}
                        </div>
                    </div>
                </div>

                {{Form::close()}}
            @endcan

        </div>
    </div>

@endsection

@section('stylesheetsExtra')
        <link href="/plugins/persian-date-time/css/md.bootstrap.datetimepicker.css" />
@endsection

@section('scriptsExtra')

        <script src="/plugins/persian-date-time/js/md.bootstrap.datetimepicker.js"></script>
        <script src="/js/form-date-time-picker.js"></script>
        <script>
            $(document).ready(function (){
                FormDateTimePicker.init();
            });
        </script>

    <script>
        $('#updateSavabegh').validate(
            {
                rules: {
                    company_id: {required: true},
                    semat: {minlength: 3},
                    section: {minlength: 3},
                    startDate: {dateISO: true},
                    endDate: {dateISO: true},
                    reasonLeavingJob: {}
                },
                messages: {
                    company_id: {required: "شرکت انتخاب نشده است"},
                    semat: {minlength: jQuery.validator.format("حداقل طول سمت باید بیشتر از {0} حرف باشد")},
                    section: {minlength: jQuery.validator.format("حداقل طول بخش باید بیشتر از {0} حرف باشد")},
                    startDate: {dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01"},
                    endDate: {dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01"},
                    reasonLeavingJob: {}

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
