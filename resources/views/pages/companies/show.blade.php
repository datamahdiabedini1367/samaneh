@extends('layouts.master.adminMaster')
@section('stylesheetsExtra')
    @include('layouts.share.stylesheet')
    <link rel="stylesheet" href="/css/bootstrap5.css">
@endsection


@section('page-title')
    مشاهد جزییات شرکت
@endsection


@section('content')

    <div class="row p-3">
        <div class="col-sm-6 ">
            <h2>
                مشخصات شرکت {{$company->name}}
            </h2>
        </div>
        <div class="col-sm-6 float-left ">
            @can('isAccess',\App\Models\Permission::query()->where('title','list_companies')->first())
                <a href="{{route('companies.index')}}" class="btn btn-outline-info float-left">
                    بازگشت به صفحه لیست شرکت ها
                </a>
            @endcan
            @can('isAccess',\App\Models\Permission::query()->where('title','export_list_personel_companies')->first())
                        <a href="{{route('companies.exportOne',[$company])}}" class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
            @endcan
        </div>
    </div>



    <nav class="mx-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">مشخصات اصلی
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">اطلاعات تماس
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">اطلاعات فضای مجازی
            </button>
            <button class="nav-link" id="nav-person-tab" data-bs-toggle="tab" data-bs-target="#nav-person" type="button"
                    role="tab" aria-controls="nav-person" aria-selected="false"> اطلاعات پرسنل
            </button>
        </div>
    </nav>
    <div class="tab-content mx-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="w-100 table-responsive">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th style="width:10% ">نام شرکت</th>
                            <th style="width:10% ">تاریخ تاسیس شرکت</th>
                            <th style="width:10% ">شماره ثبت</th>
                            <th style="width:10% ">تعداد پرسنل</th>
                            <th style="width: 30%" >آدرس شرکت</th>
                            <th style="width: 30%">توضیحات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="word-wrap: break-word">{{$company->name}}</td>
                            <td style="word-wrap: break-word">{{$company->registration_date_company}}</td>
                            <td style="word-wrap: break-word">{{$company->registration_number}}</td>
                            <td style="word-wrap: break-word">{{$company->persons()->count()}}</td>
                            <td style="word-wrap: break-word">{{$company->address}}</td>
                            <td style="word-wrap: break-word">{{$company->description}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="w-100 table-responsive">
                <table class="table  table-hover ">
                    <thead>
                    <tr>
                        <th class="w-50 ">شماره تماس</th>
                        <th class="w-50 ">ایمیل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w-25" style="word-wrap: break-word">
                            @php
                                $str='';
                                foreach($company->phones as $phone){
                                    $str = $str.' - '.$phone->value;
                                }
                                echo ltrim($str," - ");
                            @endphp
                        </td>
                        <td class="w-25" style="word-wrap: break-word">
                            @php
                                $str='';
                                foreach($company->emails as $email){
                                    $str = $str.' - '.$email->value;
                                }
                                echo ltrim($str," - ");
                            @endphp
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-100 table-responsive">
                <table class="table  table-hover">
                    <thead>
                    <tr>
                        <th class="w-25">نوع حساب</th>
                        <th class="w-25">مقدار حساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company->accounts as $account)
                        <tr>
                            <td class="w-25">{{$account->accountType->title}}</td>
                            <td class="w-25 ltr">{{$account->value}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-person" role="tabpanel" aria-labelledby="nav-person-tab">
            <div class="w-100 table-responsive">
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
                            <th>{{convert_date($person->pivot->startDate,'jalali')}}</th>
                            <th>{{convert_date($person->pivot->endDate,'jalali')}}</th>
                            <th>{{$person->pivot->reasonLeavingJob}}</th>
                            <th>{{$person->pivot->semat}}</th>
                            <th>{{$person->pivot->section}}</th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
