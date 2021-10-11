@extends('layouts.master.indexFormMaster')

@section('icon')
    <i class=" fas fa-user-friends"></i>
@endsection
@section('page-title', 'لیست افراد')

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_person')->first())
        <a href="{{route('persons.create')}}" class="btn btn-sm btn-danger float-left "> ثبت فرد
            جدید</a>
    @endcan
@endsection

@section('model-load')

    @if($persons->count()>0)
        @can('isAccess',\App\Models\Permission::query()->where('title','export_project')->first())
            <div class="col-sm-12 ">
                <a href="{{route('persons.export')}}" class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
            </div>
        @endcan
    @endif

    <table class="table table-bordered table-striped ">
        <thead>
        <tr>
            <th>#</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>نام پدر</th>
            <th style="width: 10%;" class="text-center">تاریخ تولد</th>
            <th style="width: 10%;" class="text-center">محل تولد</th>
            <th>کد ملی</th>
            @if($persons->count()>0)
                <th style="width: 7%;" class="text-center"> تصاویر</th>
                <th style="width: 7%;" class="text-center"> فضای مجازی</th>
                <th style="width: 7%;" class="text-center"> ایمیل</th>
                <th style="width: 7%;" class="text-center"> شماره تماس</th>
                <th style="width: 8%;" class="text-center">سوابق تحصیلی</th>
                <th style="width: 6%;" class="text-center"> افراد مرتبط</th>
                <th style="width: 7%;" class="text-center"> سوابق شغلی</th>
                <th style="width: 6%;" class="text-center">پروژه مرتبط</th>
                <th style="width: 5%;" class="text-center">ویرایش</th>
                <th style="width: 5%;" class="text-center">نمایش</th>
                <th style="width: 5%;" class="text-center">حذف</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($persons as $person)
            <tr>
                <td class="">{{$person->id}}</td>
                <td class="">{{$person->firstName}}</td>
                <td class="">{{$person->lastName}}</td>
                <td class="">{{$person->fatherName}}</td>
                <td class="">{{$person->birthdate_person}}</td>
                <td class="">{{$person->birthdatePlace}}</td>
                <td class="">{{$person->nationalCode}}</td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','create_picture_person')->first())
                        <a href="{{route('items.photos.index',['persons',$person])}}"
                           class="btn  btn-secondary btn-ico btn-ico-tc-black btn-photo"
                           title="ثبت و مشاهده گالری تصاویر شخص">
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','create_syberspace_person')->first())
                        <a href="{{route('account.show',['person',$person])}}"
                           class="btn  btn-secondary btn-ico btn-ico-tc-black btn-syberspace"
                           title="ثبت و ویرایش اطلاعات فضای مجازی">
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','list_syberspace_companies')->first())
                        <a href="{{route('email.show',['persons',$person])}}"
                           class="btn  btn-secondary btn-ico btn-ico-tc-black btn-email-envelope"
                           title="ثبت و ویرایش ایمیل">
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','list_syberspace_companies')->first())
                        <a href="{{route('phone.show',['persons',$person])}}"
                           class="btn  btn-secondary btn-ico btn-ico-tc-black btn-phone" title="ثبت و ویرایش شماره تماس" >
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','create_educational')->first())
                        <a href="{{route('educational.show',$person)}}"
                           class="btn  btn-secondary  btn-ico btn-ico-tc-black btn-educational"
                           title="ثبت و ویرایش سوابق تحصیلی">
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','create_related_person')->first())
                        <a href="{{route('persons.related.show',$person)}}"
                           class="btn  btn-secondary   btn-ico btn-ico-tc-black btn-personRelated" title="ثبت اطلاعات افراد مرتبط" >
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','show_savabegh_jobs')->first())
                        <a href="{{route('experience.show',$person)}}"
                           class="btn  btn-secondary btn-ico btn-ico-tc-black btn-savabegh-jobs" title="  سوابق شغلی فرد" >
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','create_person_project')->first())
                        <a href="{{route('personProject.create',$person)}}"
                           class="btn  btn-secondary btn-ico btn-ico-tc-black btn-person-project" title="پروژه مرتبط با فرد" >
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','edit_person')->first())
                        <a href="{{route('persons.edit',$person)}}"
                           class="btn btn-warning btn-ico btn-ico-tc-black btn-edit" title="ویرایش">
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','show_person')->first())
                        <a href="{{route('persons.show',$person)}}"
                           class="btn  btn-primary btn-ico btn-ico-tc-black btn-eye" title="نمایش">
                        </a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','delete_person')->first())
                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete" , 'data-toggle'=>"modal",'data-target'=>"#removeItem",
                                "onclick"=>'deleteItem("'.route('persons.destroy',[$person]).'")'])}}
                    @endcan
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $persons->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}

@endsection

@php
    $pageRoute = 'persons.index';
    $params=[]
@endphp







