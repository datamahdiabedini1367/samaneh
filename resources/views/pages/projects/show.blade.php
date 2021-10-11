@extends('layouts.master.adminMaster')

@section('stylesheetsExtra')
    <link rel="stylesheet" href="/css/bootstrap5.css">
@endsection



@section('page-title')
    مشخصات پروژه {{$project->name}}
@endsection


@section('content')

    <div class="row p-3">
        <div class="col-sm-6 ">
            <h2>
                مشخصات پروژه {{$project->name}}
            </h2>
        </div>
        <div class="col-sm-6 float-left ">

            @can('isAccess',\App\Models\Permission::query()->where('title','list_projects')->first())
                <a href="{{route('projects.index')}}" class="btn btn-outline-danger float-left">
                    بازگشت به لیست پروژه ها
                </a>
            @endcan
            @can('isAccess',\App\Models\Permission::query()->where('title','export_one_project')->first())
                <div class="col-sm-12 ">
                    <a href="{{route('projects.exportOne',[$project])}}"
                       class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
                </div>
            @endcan
        </div>
    </div>

    <nav class="mx-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">مشخصات اصلی
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">افراد اجرا کننده پروژه
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">شرکتهای مرتبط به پروژه
            </button>
            <button class="nav-link" id="nav-person-tab" data-bs-toggle="tab" data-bs-target="#nav-person" type="button"
                    role="tab" aria-controls="nav-person" aria-selected="false"> افراد مرتبط به پروژه
            </button>
        </div>
    </nav>
    <div class="tab-content mx-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="w-100 table-responsive">
                <table class="table table-hover ">
                    <thead>
                    <tr>
                        <th class="px-5">نام پروژه:</th>
                        <th class="px-5">تاریخ شروع :</th>
                        <th class="px-5">تاریخ پایان :</th>
                        <th class="px-5 ">تعداد افراد اجرا کننده :</th>
                        <th class="px-5 ">تعداد شرکت های مرتبط:</th>
                        <th class="px-5 ">تعداد افراد مرتبط:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="px-5" style="word-wrap: break-word">{{$project->name}}</td>
                        <td class="px-5" style="word-wrap: break-word">{{$project->start_date_project}}</td>
                        <td class="px-5" style="word-wrap: break-word">{{$project->end_date_project}}</td>
                        <td class="px-5" style="word-wrap: break-word">{{$project->users()->count()}}</td>
                        <td class="px-5" style="word-wrap: break-word">{{$project->companies()->count()}}</td>
                        <td class="px-5" style="word-wrap: break-word">{{$project->persons()->count()}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="w-100 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="w-25 ">نام کاربری :</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="w-100 table-responsive">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>تاریخ ثبت</th>
                        <th>شماره ثبت</th>
                        <th>آدرس</th>
                        <th>ایمیل</th>
                        <th>شماره تماس</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->registration_date_company}}</td>
                            <td>{{$company->registration_number}}</td>
                            <td>{{$company->address}}</td>
                            @php
                                $emailsCompany='';
                                foreach($company->emails as $email){
                                $emailsCompany=$email->value.' - '.$emailsCompany;
                                }
                                $emailsCompany=ltrim($emailsCompany, ' - ');
                            @endphp
                            <td>{{$emailsCompany}}</td>
                            @php
                                $phonesCompany='';
                                foreach($company->phones as $phone){
                                $phonesCompany=$phone->value.' - '.$phonesCompany;
                                }
                                $phonesCompany=ltrim($emailsCompany, ' - ');
                            @endphp
                            <td>{{$phonesCompany}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-person" role="tabpanel" aria-labelledby="nav-person-tab">
            <div class="w-100 table-responsive">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="px-4">نام</th>
                        <th class="px-4">نام خانوادگی</th>
                        <th class="px-4">نام پدر</th>
                        <th class="px-4">کد ملی</th>
                        <th class="px-4">شماره تماس</th>
                        <th class="px-4">ایمیل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->persons as $person)
                        <tr>
                            <td class="px-4">{{$person->firstName}}</td>
                            <td class="px-4">{{$person->lastName}}</td>
                            <td class="px-4">{{$person->fatherName}}</td>
                            <td class="px-4">{{$person->nationalCode}}</td>
                            <td class="px-4">
                                @php
                                    $phonesperson='';
                                    foreach($person->phones as $phone){
                                    $phonesperson=$phone->value.' - '.$phonesperson;
                                    }
                                    $phonesperson=ltrim($phonesperson, " - ");
                                @endphp
                                {{$phonesperson}}
                            </td>
                            <td class="px-4">
                                @php
                                    $emailsperson='';
                                    foreach($person->emails as $email){
                                    $emailsperson=$email->value.' - '.$emailsperson;
                                    }
                                    $emailsperson=ltrim($emailsperson, " - ");
                                @endphp
                                {{$emailsperson}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
