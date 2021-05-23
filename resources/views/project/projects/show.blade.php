@extends('layouts.master')
@include('layouts.share.common_inpute_form')



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-globe"></i> پروژه : {{$project->name}}

                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-3 invoice-col">
                                <address>
                                    <strong>تاریخ شروع پروژه</strong><br>
                                    {{$project->startDate}}<br>
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <address>
                                    <strong>تاریخ پایان پروژه</strong><br>
                                    {{$project->endDate}}
                                </address>

                            </div>
                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-12 invoce-col">
                                <address>
                                    <strong>توضیحات</strong><br>
                                    <p>{{$project->description}}</p>
                                </address>
                            </div>
                        </div>
                        <!-- شرکت های مرتبط -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-globe"></i> شرکتهای مرتبط :

                                </h4>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>نام شرکت</th>
                                        <th>تاریخ ثبت شرکت</th>
                                        <th>شماره ثبت شرکت</th>
                                        <th>ایمیل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->companies as $company)
                                        <tr>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->registration_date}}</td>
                                            <td>{{$company->registration_number}}</td>
                                            <td>{{$company->email}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- اطلاعات افراد مرتبط پروژه -->

                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-globe"></i> افراد مرتبط پروژه:

                                </h4>
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
                                        <th>کد ملی</th>
                                        <th>شماره تماس</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->persons as $person)
                                        <tr>
                                            <td>{{$person->firstName}}</td>
                                            <td>{{$person->lastName}}</td>
                                            <td>{{$person->fatherName}}</td>
                                            <td>{{$person->nationalCode}}</td>
                                            <td>باید ایجاد شود</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- اطلاعات کاربرانی که پروژه بهشون تخصیص داده شده مرتبط پروژه -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-globe"></i>این پروژه به کاربران زیر تخصیص داده شده:

                                </h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>نام کاربری</th>
                                        <th>ایمیل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
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
                                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                        class="fa fa-print"></i> پرینت </a>

                                <button type="button" class="btn btn-primary float-left ml-2"
                                        style="margin-right: 5px;">
                                    <i class="fa fa-download"></i> تولید PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
