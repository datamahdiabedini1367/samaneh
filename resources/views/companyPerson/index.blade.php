@extends('layouts.master')
@include('layouts.share.common_inpute_form')



@section('content')

    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>

                    <i class="fa fa-globe"></i> {{$company->name}}
                    <small class="float-left">تاریخ تاسیس: {{$company->registration_date}}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
                &nbsp;
                <address>
                    <strong>{{$company->name}}</strong><br>
                    آدرس:<br>
                    {{$company->address}}<br>
                    تلفن : (804) 123-5432<br>
                    ایمیل : {{$company->email}}
                </address>
            </div>
            <!-- /.col -->

            {{--        '', '', ''--}}

            <div class="col-sm-6 invoice-col">
                &nbsp;
                <address>
                    <br>
                    شماره ثبت:<br>
                    {{$company->registration_number}}<br>
                    توضیحات:<br>
                    {{$company->description}}
                </address>
            </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
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
                        <th> سمت </th>
                        <th> بخش</th>
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
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
{{--                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> پرینت--}}
{{--                </a>--}}
                <a href="{{route('companies.persons.create',$company)}}"  class="btn btn-default"> ثبت پرسنل جدید
                </a>
                <a href="{{route('companies.index')}}"  class="btn btn-default">بازگشت به صفحه لیست شرکت ها
                </a>
                <button type="button" class="btn btn-success float-left"><i class="fa fa-download"></i>
                    خروجی EXCEL
                </button>
                <button type="button" class="btn btn-primary float-left ml-2" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> خروجی PDF
                </button>
            </div>
        </div>
    </div>

@endsection
