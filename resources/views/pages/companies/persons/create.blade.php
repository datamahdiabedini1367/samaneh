@extends('layouts.master.createFormMaster')

@section('page-title', 'ثبت فرد برای شرکت '. $company->name)
@section('icon')
        <i class="nav-icon fas fa-city"></i>
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('companies.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست شرکت ها</a>
    @endcan
@endsection

@section('create_form')
    @php
        $route='companies.persons.create';
        $params=[$company];
    @endphp

    <div class="card-body">
        @can('isAccess',\App\Models\Permission::query()->where('title','create_person_company')->first())

            @include('layouts.common.table-search')

            {{Form::open(['route'=>['companies.persons.store',$company],'id'=>'companyPersonAdd'])}}

            <table class="table table-bordered table-striped  w-100">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نام پدر</th>
                    <th>تاریخ تولد</th>
                    <th>محل تولد</th>
                    <th>جنسیت</th>
                    <th>وضعیت تاهل</th>
                    <th>کد ملی</th>
                    <th>انتخاب</th>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    <tr>
                        <td>{{$person->firstName}}</td>
                        <td>{{$person->lastName}}</td>
                        <td>{{$person->fatherName}}</td>
                        <td>{{$person->birthdate_person}}</td>
                        <td>{{$person->birthdatePlace}}</td>
                        <td>{{$person->gender_person}}</td>
                        <td>{{$person->married_person}}</td>
                        <td>{{$person->nationalCode}}</td>
                        <td class="text-center">
                            {{Form::radio('person_id',$person->id,old('person_id'),['data-rule-required'=>"true",'class'=>"form-group",'form'=>"companyPersonAdd"])}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $persons->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('startDate','تاریخ شروع به کار :')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            {{Form::text('startDate',old('startDate'),['class'=>'index_saveDate form-control','placeholder'=>"تاریخ شروع به کار را وارد کنید"])}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 text-danger text-bold " id="error_startDate">
                    @error('startDate')
                    {{$message}}
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('endDate',' تاریخ اتمام کار :')}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            {{Form::text('endDate',old('endDate'),['class'=>'index_saveDate form-control','placeholder'=>"تاریخ اتمام کار را وارد کنید"])}}
                        </div>
                    </div>
                </div>
                <div class=" col-sm-3 text-danger text-bold " id="error_endDate">
                    @error('endDate')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('semat',' سمت:')}}
                        {{Form::text('semat',old('semat'),['class'=>'form-control','placeholder'=>"سمت را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3 text-danger text-bold" id="error_semat">
                    @error('semat')
                    {{$message}}
                    @enderror
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('section',' بخش:')}}
                        {{Form::text('section',old('section'),['class'=>'form-control','placeholder'=>"بخش را وارد کنید"])}}
                    </div>
                </div>
                <div class="col-sm-3 text-danger text-bold " id="error_section">
                    @error('section')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        {{Form::label('reasonLeavingJob',' علت ترک شغل:')}}
                        {{Form::text('reasonLeavingJob',old('reasonLeavingJob'),['class'=>'form-control','placeholder'=>"علت ترک شغل را وارد کنید",'rows'=>1])}}
                    </div>
                </div>
                <div class="text-danger text-bold " id="error_reasonLeavingJob">
                    @error('reasonLeavingJob')
                    {{$message}}
                    @enderror
                </div>
            </div>


            <div class="text-danger text-bold" id="error_person_id">
                @error('person_id')
                {{$message}}
                @enderror
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12">
                        {{Form::submit('ثبت',['class'=>"btn btn-primary float-left", 'form'=>"companyPersonAdd", 'id'=>'submit_button'])}}
                    </div>
                </div>
            </div>

            {{Form::close()}}



        @endcan
    </div>

@endsection


@section('scriptsExtra')
    <script>
        $('#companyPersonAdd').validate(
            {
                rules: {
                    person_id: {required: true},
                    startDate: {dateISO: true},
                    endDate: {dateISO: true},
                },
                messages: {
                    person_id: { required: " فرد مورد نظر انتخاب نشده است لطفا فرد مورد نظر را انتخاب کنید"},
                    startDate: {dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01" },
                    endDate: { dateISO: "فرمت تاریخ به درستی وارد نشده است فرمت باید به این شکل باشد:1400/01/01" },
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
