@extends('layouts.master.adminMaster')

@section('stylesheetsExtra')
    <link rel="stylesheet" href="/css/bootstrap5.css">
@endsection

@section('scripts')
    @include('layouts.share.script')
@endsection


@section('page-title')
    مشاهده مشخصات {{$person->firstName}}  {{$person->lastName}}
@endsection


@section('content')
    <div class="row p-3">
        <div class="col-sm-6 ">
            <h2>
                مشخصات {{$person->firstName}}  {{$person->lastName}}
            </h2>
        </div>
        <div class="col-sm-6 float-left ">

            @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
                <a href="{{route('persons.index')}}" class="btn btn-outline-info float-left">
                    بازگشت به صفحه لیست افراد
                </a>
            @endcan
            @can('isAccess',\App\Models\Permission::query()->where('title','export_one_person')->first())
                    <div class="col-sm-12 ">
                        <a href="{{route('persons.exportOne',[$person])}}" class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
                    </div>
            @endcan
        </div>
    </div>


    <nav class="mx-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">مشخصات فردی
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">اطلاعات تماس
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">اطلاعات فضای مجازی
            </button>
            <button class="nav-link" id="nav-person-tab" data-bs-toggle="tab" data-bs-target="#nav-person" type="button"
                    role="tab" aria-controls="nav-person" aria-selected="false"> سوابق شغلی
            </button>

            <button class="nav-link" id="nav-education-tab" data-bs-toggle="tab" data-bs-target="#nav-education"
                    type="button"
                    role="tab" aria-controls="nav-education" aria-selected="false"> سوابق تحصیلی
            </button>

            <button class="nav-link" id="nav-personRelated-tab" data-bs-toggle="tab" data-bs-target="#nav-personRelated"
                    type="button"
                    role="tab" aria-controls="nav-personRelated" aria-selected="false"> اطلاعات افراد مرتبط
            </button>
        </div>
    </nav>
    <div class="tab-content mx-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-responsive table-hover overflow-auto">
                <tr>
                    <th class="">نام</th>
                    <th class="">نام مستعار</th>
                    <th class="">نام خانوادگی</th>
                    <th class="">نام پدر</th>
                    <th class="">نام مادر</th>
                    <th class="">وضعیت تاهل</th>
                    <th class="">جنسیت</th>
                    <th class="">کدملی</th>
                </tr>
                <tr>
                    <td class="" style="word-wrap: break-word">{{$person->firstName}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->nikeName}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->lastName}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->fatherName}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->motherName}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->married_person}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->gender_person}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->nationalCode}}</td>
                </tr>
                <tr>
                    <th class="">تاریخ تولد</th>
                    <th class="">مکان تولد</th>
                    <th class="">آدرس</th>
                    <th class="">بیوگرافی</th>
                    <th class="">سرگرمی ها</th>
                    <th class="">علایق شخصی</th>
                    <th class="">گرایش سیاسی</th>
                    <th class="">زبانهای مورد استفاده</th>
                </tr>
                <tr>
                    <td class="" style="word-wrap: break-word">{{$person->birthdate_person}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->birthdatePlace}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->address}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->bio}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->entertainments}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->personalFavorites}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->politicalOrientation}}</td>
                    <td class="" style="word-wrap: break-word">{{$person->languageUse}}</td>
                </tr>
            </table>
        </div>
        <div class="tab-pane fade w-100" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="w-100 table-responsive">
                <table class="table table-hover  ">
                    <thead class="">
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
                                foreach($person->phones as $phone){
                                    $str = $str.' - '.$phone->value;
                                }
                                echo ltrim($str," - ");
                            @endphp
                        </td>
                        <td class="w-25" style="word-wrap: break-word">
                            @php
                                $str='';
                                foreach($person->emails as $email){
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
                        <th class="w-25 ">نوع حساب</th>
                        <th class="w-25 ">مقدار حساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($person->accounts as $account)
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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class=" ">نام شرکت/موسسه</th>
                        <th class=" ">تاریخ شروع به کار</th>
                        <th class=" ">تاریخ اتمام همکاری</th>
                        <th class=" ">سمت</th>
                        <th class=" ">بخش</th>
                        <th class=" ">دلیل ترک کار</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($person->companies as $company)

                        <tr>
                            <td class=""> {{$company->name}}</td>
                            <td class=""> {{convert_date($company->pivot->startDate,'jalali')}}</td>
                            <td class=""> {{convert_date($company->pivot->endDate,'jalali')}}</td>
                            <td class=""> {{$company->pivot->semat}}</td>
                            <td class=""> {{$company->pivot->section}}</td>
                            <td class=""> {{$company->pivot->reasonLeavingJob}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
            <div class="w-100 table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class=" ">نام دانشگاه محل تحصیلی</th>
                    <th class=" ">مقطع تحصیلی</th>
                    <th class=" ">رشته تحصیلی</th>
                    <th class=" ">معدل</th>
                    <th class=" ">تاریخ شروع</th>
                    <th class=" ">تاریخ پایان</th>
                    <th class=" ">ادرس دانشگاه</th>
                </tr>
                </thead>
                <tbody>
                @foreach($person->educationals as $educational)
                    <tr>
                        <td>{{$educational->universityName}}</td>
                        <td>{{$educational->grade}}</td>
                        <td>{{$educational->major}}</td>
                        <td>{{$educational->average}}</td>
                        <td>{{$educational->start_date_educational}}</td>
                        <td>{{$educational->end_date_educational}}</td>
                        <td>{{$educational->address}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-personRelated" role="tabpanel" aria-labelledby="nav-personRelated-tab">
            <div class="w-100 table-responsive">
            <table class="table  table-hover">
                <thead>
                <tr>
                    <th class=" ">نسبت</th>
                    <th class=" ">کد</th>
                    <th class=" ">نام</th>
                    <th class=" ">نام خانوادگی</th>
                    <th class=" ">وضعیت تاهل</th>
                    <th class=" ">تاریخ تولد</th>
                    <th class=" ">مکان تولد</th>
                    <th class=" ">جنسیت</th>
                    <th class=" ">کدملی</th>
                    <th class=" ">آدرس</th>
                    <th class=" ">بیوگرافی</th>
                    <th class=" ">سرگرمی ها</th>
                    <th class=" ">علایق شخصی</th>
                    <th class=" ">گرایش سیاسی</th>
                </tr>
                </thead>
                <tbody>
                @foreach($person->relatedPerson as $personRelated)
                    <tr>
                        <td>{{$personRelated->getIndividualTitle($personRelated->pivot->individual_id)}}</td>
                        <td>{{$personRelated->id}}</td>
                        <td>{{$personRelated->firstName}}</td>
                        <td>{{$personRelated->lastName}}</td>
                        <td>{{$personRelated->married_person}}</td>
                        <td>{{$personRelated->birthdate_person}}</td>
                        <td>{{$personRelated->birthdatePlace}}</td>
                        <td>{{$personRelated->gender_person}}</td>
                        <td>{{$personRelated->nationalCode}}</td>
                        <td>{{$personRelated->address}}</td>
                        <td>{{$personRelated->bio}}</td>
                        <td>{{$personRelated->entertainments}}</td>
                        <td>{{$personRelated->personalFavorites}}</td>
                        <td>{{$personRelated->politicalOrientation}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>


@endsection
