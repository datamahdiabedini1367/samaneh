@extends('layouts.master.createFormMaster')

@section('icon')
<i class="nav-icon fas fa-gopuram"></i>
@endsection

@section('page-title')
    تعریف پروژه جدید
@endsection
@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('projects.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست پروژ ها</a>
    @endcan
@endsection

@section('create_form')
    {{Form::open(['route'=>'projects.store','id'=>"create_project_form"])}}
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('name','نام پروژه:')}}
                    {{Form::text('name',old('name'),['class'=>"form-control",'placeholder'=>"نام پروژه را وارد کنید"])}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label("startDate","تاریخ شروع پروژه:")}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </span>
                        </div>
                        {{Form::text('startDate',old('startDate'),['class'=>"form-control" ,'placeholder'=>"تاریخ شروع پروژه را وارد کنید"])}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('endDate',' تاریخ پایان پروژه:')}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-calendar"></i>
                    </span>
                        </div>
                        {{Form::text('endDate',old('endDate'),['class'=>"form-control" ,'placeholder'=>"تاریخ پایان پروژه را وارد کنید"])}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="text-danger text-bold" id="error_name">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-danger text-bold " id="error_startDate">
                    @error('startDate')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-danger text-bold" id="error_endDate">
                    @error('endDate')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{Form::label('description',' توضیحات:')}}
                    {{Form::textarea('description',old('description'),['class'=>"form-control" ,'placeholder'=>"توضیحات مد نظر پروژه را وارد کنید",'rows'=>3])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-danger text-bold" id="error_description">
                    @error('description')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-12">
                {{Form::submit('ثبت پروژه',['class'=>"btn btn-primary float-left",'id'=>'submit_button'])}}
            </div>
        </div>
    </div>
    {{Form::close()}}

@endsection

@section('scriptsExtra')

    <script>
        $(document).ready(function () {

            $('#create_project_form').validate(
                {
                    rules: {
                        name: {required: true, minlength: 3},
                        startDate: {dateISO: true},
                        endDate: {dateISO: true},
                        description: {},
                    },
                    messages: {
                        name: {
                            required: " نام پروژه اجباریست",
                            minlength: jQuery.validator.format("حداقل طول نام پروژه باید بیشتر از {0} حرف باشد"),
                        },
                        startDate: {
                            dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01",
                        },
                        endDate: {
                            dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01",

                        },
                    },
                    errorPlacement: function (error, element) {
                        var n = element.attr("name");
                        $("#error_" + n).addClass("text-bold");
                        error.appendTo("#error_" + n);
                    },

                }
            );

        });
    </script>

@endsection




