@extends('layouts.master.createFormMaster')

@section('page-title')
    سوابق شغلی {{$person->firstName}} {{$person->lastName}}
@endsection


@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','list_person_educational_export')->first())
        <a href="{{route('experience.exportOne',[$person])}}"
           class="btn btn-sm btn-success float-left">
            <i class="fa fa-download"></i>
            خروجی EXCEL
        </a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','create_savabegh_jobs')->first())
        <a href="{{route('experience.create',[$person])}}"
           class="btn btn-sm btn-warning float-left">
            افزودن سابقه شغلی
        </a>
    @endcan
@endsection

@section('create_form')
    <div class="row">
        <div class="col-sm-12 p-3">
            <table class="table table-bordered table-striped  w-100">
                <thead>
                <tr>
                    <th class="align-text-top">نام شرکت</th>
                    <th class="align-text-top">تاریخ شروع به کار</th>
                    <th class="align-text-top">تاریخ اتمام همکاری</th>
                    <th class="align-text-top">سمت</th>
                    <th class="align-text-top">بخش</th>
                    <th class="align-text-top">علت ترک شغل</th>
                    <th class="align-text-top">ویرایش</th>
                    <th class="align-text-top">حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($person->companies as $personCompany)
                    <tr>
                        <td> {{$personCompany->name}}</td>

                        <td> {{$personCompany->pivot->startDate}} </td>
                        <td> {{$personCompany->pivot->endDate}} </td>
                        <td> {{$personCompany->pivot->semat}}   </td>
                        <td> {{$personCompany->pivot->section}} </td>
                        <td> {{$personCompany->pivot->reasonLeavingJob}} </td>
                        <td class="text-center">
                            {{ Form::open(['route'=>['experience.edit',[$personCompany->pivot->id]], 'method'=>'get']) }}
                            {{Form::button('',['class'=>"btn btn-warning btn-ico btn-ico-tc-black btn-edit",'type'=>'submit'])}}
                            {{Form::close()}}
                        </td>
                        <td class="text-center">
                            {{Form::button('',['class'=>'btn btn-danger btn-ico btn-ico-tc-black btn-delete',
                                               'data-toggle'=>"modal", 'data-target'=>"#removeItem",
                                               'onclick'=>'deleteItem("'. route('experience.destroy',[$personCompany->pivot->id]).'")'])}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



