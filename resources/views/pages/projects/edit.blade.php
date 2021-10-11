@extends('layouts.master.createFormMaster')

@section('icon')
    <i class="nav-icon fas fa-gopuram"></i>
@endsection

@section('page-title')
    ویرایش پروژه {{$project->name}}
@endsection
@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('projects.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست پروژ ها</a>
    @endcan
@endsection

@section('create_form')

    {{Form::model($project, ['route' => ['projects.update', $project->id],'method'=>'put','id'=>"updated_project"])}}

    <div class="card-body">

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('name','نام پروژه:')}}
                    {{Form::text("name",$project->name,['class'=>"form-control", 'placeholder'=>"نام پروژه را وارد کنید"])}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('startDate','تاریخ شروع پروژه:')}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                        </div>

                        {{Form::text("startDate",$project->start_date_project,['class'=>"form-control", 'placeholder'=>"تاریخ شروع پروژه را وارد کنید"])}}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {{Form::label('endDate','تاریخ پایان پروژه:')}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                        </div>
                        {{Form::text("endDate",$project->end_date_project,['class'=>"form-control", 'placeholder'=>"تاریخ پایان پروژه را وارد کنید"])}}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-4">
                <div class="text-danger text-bold " id="error_name">
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
                <div class="text-danger  text-bold " id="error_endDate">
                    @error('endDate')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{Form::label('description','توضیحات:')}}

                    {{Form::textarea("description",$project->description,["class"=>"form-control", 'rows'=>"3", 'placeholder'=>"وارد کردن اطلاعات ..."])}}
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
                {{Form::submit('ثبت پروژه',["class"=>"btn btn-primary float-left",'id'=>'submit_button'])}}
            </div>
        </div>
    </div>



    {{Form::close()}}

@endsection

@section('scriptsExtra')

    <script>
        $(document).ready(function () {
            $('#updated_project').validate(
                {
                    rules: {
                        name: {required: true, minlength: 3},
                        startDate: {date: true},
                        endDate: {date: true},
                        description: {},
                    },
                    messages: {
                        name: {
                            required: " نام پروژه اجباریست",
                            minlength: jQuery.validator.format("حداقل طول نام پروژه باید بیشتر از {0} حرف باشد"),
                        },
                        startDate: {
                            date: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01",
                        },
                        endDate: {
                            date: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01",

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

