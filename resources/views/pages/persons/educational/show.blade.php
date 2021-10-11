@extends('layouts.master.createFormMaster')

@section('icon')
        <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('page-title')
    اطلاعات تحصیلی
    {{$person->firstName}}
    {{$person->lastName}}
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left mx-2">بازگشت به لیست افراد</a>
    @endcan
    @can('isAccess',\App\Models\Permission::query()->where('title','list_person_educational_export')->first())

        <a href="{{route('person.exportPersonEducational',[$person->id])}}"
           class="btn btn-sm btn-success float-left mx-2">
            <i class="fa fa-download"></i>
            خروجی EXCEL
        </a>
    @endcan
    @can('isAccess',\App\Models\Permission::query()->where('title','create_educational')->first())
        <a href="{{route('educational.create',[$person])}}"
           class="btn btn-sm btn-warning float-left mx-2">
            افزودن اطلاعات تحصیلی
        </a>
    @endcan
@endsection


@section('create_form')


    <div class="card-body pt-3">

        <table class="table table-bordered table-striped  w-100" id="emailtable">
            <thead>
            <tr>
                <th>مقطع تحصیلی</th>
                <th>رشته تحصیلی</th>
                <th>نام دانشگاه محل تحصیل</th>
                <th>معدل</th>
                <th>آدرس</th>
                <th>تاریخ شروع</th>
                <th>تاریخ اتمام</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>
            <tbody id="dataAccountRegister">
            @foreach($person->educationals as $educational)
                <tr>
                    <td>{{$educational->grade}}</td>
                    <td>{{$educational->major}}</td>
                    <td>{{$educational->universityName}}</td>
                    <td>{{$educational->average}}</td>
                    <td>{{$educational->address}}</td>
                    <td>{{$educational->start_date_educational}}</td>
                    <td>{{$educational->end_date_educational}}</td>
                    <td>
                        {{ Form::open(['route'=>['educational.edit',$educational->id], 'method'=>'get']) }}
                        {{Form::button('',['class'=>"btn btn-warning btn-ico btn-ico-tc-black btn-edit",'type'=>'submit'])}}
                        {{Form::close()}}
                    </td>
                    <td>
                        {{Form::button('',['class'=>'btn btn-danger btn-ico btn-ico-tc-black btn-delete',
                                           'data-toggle'=>"modal", 'data-target'=>"#removeItem",
                                           'onclick'=>'deleteItem("'. route('educational.destroy',[$educational->id]).'")'])}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
