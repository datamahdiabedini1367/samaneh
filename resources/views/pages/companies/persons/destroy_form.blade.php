@extends('layouts.master.adminMaster')


@section('content')

    <div class="invoice p-3 mb-3">

        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fa fa-globe"></i> {{$company->name}}
                    <small class="float-left">تاریخ تاسیس: {{$company->registration_date}}</small>
                </h4>
            </div>
        </div>

        <div class="row invoice-info">

            <div class="col-sm-6 invoice-col">
                <address>
                    <strong>{{$company->name}}</strong><br>
                    آدرس:<br>
                    {{$company->address}}<br>
                    <br>
                    ایمیل : {{$company->email}}
                </address>
            </div>

            <div class="col-sm-6 invoice-col">
                <address>
                    <br>
                    شماره ثبت:<br>
                    {{$company->registration_number}}<br>
                    توضیحات:<br>
                    {{$company->description}}
                </address>
            </div>

        </div>


        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نام پدر</th>
                        <th>وضعیت تاهل</th>
                        <th>کد ملی</th>
                        <th> تاریخ شروع به کار</th>
                        <th> تاریخ اتمام همکاری</th>
                        <th> علت ترک شغل</th>
                        <th> سمت</th>
                        <th> بخش</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($company->persons as $person)
                            <tr>
                                <th>{{$person->firstName}}</th>
                                <th>{{$person->lastName}}</th>
                                <th>{{$person->fatherName}}</th>
                                <th>{{$person->married_person}}</th>
                                <th>{{$person->nationalCode}}</th>
                                <th>{{$person->pivot->startDate}}</th>
                                <th>{{$person->pivot->endDate}}</th>
                                <th>{{$person->pivot->reasonLeavingJob}}</th>
                                <th>{{$person->pivot->semat}}</th>
                                <th>{{$person->pivot->section}}</th>
                                <th>
                                    @can('isAccess',\App\Models\Permission::query()->where('title','delete_person_company')->first())

                                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete", 'data-toggle'=>"modal" , 'data-target'=>"#removeItem",
                                                'onclick'=>'deleteItem("'.route('companies.persons.destroy',[$company,$person]). '")' ])}}
                                    @endcan
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row no-print">
            <div class="col-12">
                <a href="{{route('companies.index')}}" class="btn btn-default">بازگشت به صفحه لیست شرکت ها
                </a>
            </div>
        </div>
    </div>

@endsection

