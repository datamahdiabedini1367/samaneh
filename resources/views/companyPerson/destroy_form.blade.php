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
                                <form action="{{route('companies.persons.destroy',[$company,$person] )}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="حذف" class="btn btn-danger">
                                </form>
                            </th>
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
                <a href="{{route('companies.index')}}" class="btn btn-default">بازگشت به صفحه لیست شرکت ها
                </a>
            </div>
        </div>
    </div>

@endsection
