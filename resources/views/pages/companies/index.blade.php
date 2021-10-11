@extends('layouts.master.indexFormMaster')

@section('icon')
    <i class="nav-icon fas fa-city"></i>
@endsection
@section('page-title', 'لیست شرکتها')

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_company')->first())
        <a href="{{route('companies.create')}}" class="btn btn-sm btn-danger float-left">
            ایجاد شرکت جدید</a>
    @endcan
@endsection

@section('model-load')
    @if($companies->count()>0)
        @can('isAccess',\App\Models\Permission::query()->where('title','export_project')->first())
            <div class="col-sm-12 ">
                <a href="{{route('companies.export')}}"
                   class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
            </div>
        @endcan
    @endif

    <table class="table table-bordered table-striped  w-100">
        <thead>
        <tr>
            <th class="align-baseline">#</th>
            <th class="align-baseline">نام شرکت</th>
            <th style="width:7%" class=" text-center">شماره ثبت</th>
            <th style="width:8%" class=" text-center">تاریخ تاسیس</th>
            @can('isAccess',\App\Models\Permission::query()->whereIn('title',['list_persons_companies','create_person_company','delete_person_company'])->first())
                <th style="width: 10%" class="text-center">پرسنل</th>
            @endcan

        @can('isAccess',\App\Models\Permission::query()->whereIn('title',['create_company','edit_company','delete_company','show_company','list_gallery_companies','list_syberspace_companies'])->first())
                @if($companies->count()>0)
                    <th style="width: 7%" class="text-center"> تصاویر</th>
                    <th style="width: 7%" class="text-center"> فضای مجازی</th>
                    <th style="width: 7%" class="text-center">ایمیل</th>
                    <th style="width: 7%" class="text-center">شماره تماس</th>
                    <th style="width: 5%" class="text-center">ویرایش</th>
                    <th style="width: 5%" class="text-center">نمایش</th>
                    <th style="width: 5%" class="text-center">حذف</th>
                @endif
            @endcan
        </tr>

        </thead>
        <tbody>
        @foreach($companies as $company)

            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td class="text-center">{{$company->registration_number}}</td>
                <td class="text-center">{{$company->registration_date_company}}</td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->whereIn('title',['list_persons_companies','create_person_company','delete_person_company'])->first())
                        @can('isAccess',\App\Models\Permission::query()->where('title','list_persons_companies')->first())
                            <a href="{{route('companies.persons.index',$company)}}"
                               class="btn btn-secondary btn-ico btn-ico-tc-black btn-eye" title="نمایش پرسنل">
                            </a>
                        @endcan

                        @can('isAccess',\App\Models\Permission::query()->where('title','create_person_company')->first())
                            <a href="{{route('companies.persons.create',$company)}}"
                               class="btn btn-secondary btn-ico btn-ico-tc-black btn-plus" title="افزودن پرسنل جدید">
                            </a>
                        @endcan

                        @can('isAccess',\App\Models\Permission::query()->where('title','delete_person_company')->first())
                            <a href="{{route('companies.persons.destroyForm',$company)}}"
                               class="btn btn-secondary btn-ico btn-ico-tc-black btn-delete" title="حذف پرسنل">
                            </a>
                        @endcan
                    @endcan
                </td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','list_gallery_companies')->first())
                        <a href="{{route('items.photos.index',['company',$company])}}"
                           class="btn btn-secondary btn-ico btn-ico-tc-black btn-photo" title="گالری تصاویر شرکت">
                        </a>
                    @endcan
                </td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','list_syberspace_companies')->first())
                        <a href="{{route('account.show',['company',$company])}}"
                           class="btn btn-secondary btn-ico btn-ico-tc-black btn-syberspace"
                           title="ثبت اطلاعات فضای مجازی">
                        </a>
                    @endcan
                </td>


                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','list_syberspace_companies')->first())
                        <a href="{{route('email.show',['company',$company])}}"
                           class="btn btn-secondary btn-ico btn-ico-tc-black btn-email-envelope"
                           title="ثبت و ویرایش ایمیل">
                        </a>
                    @endcan
                </td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','list_syberspace_companies')->first())
                        <a href="{{route('phone.show',['company',$company])}}"
                           class="btn btn-secondary btn-ico btn-ico-tc-black btn-phone" title="ثبت و ویرایش شماره تماس">
                        </a>
                    @endcan
                </td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->whereIn('title',['edit_company'])->first())
                        <a href="{{route('companies.edit',$company)}}"
                           class="btn btn-warning btn-ico btn-ico-tc-black btn-edit" title="ویرایش">
                        </a>
                    @endcan
                </td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','show_company')->first())
                        <a href="{{route('companies.show',$company)}}"
                           class="btn btn-primary btn-ico btn-ico-tc-black btn-eye" title="نمایش">
                        </a>
                    @endcan

                </td>

                <td class="text-center">
                    @can('isAccess',\App\Models\Permission::query()->where('title','delete_company')->first())
                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete" ,  'data-toggle'=>"modal",
                                            'data-target'=>"#removeItem",
                                            'onclick'=>'deleteItem("' . route('companies.destroy',[$company]) . '")'])}}
                    @endcan
                </td>



            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $companies->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}

@endsection

@php
    $pageRoute = 'companies.index';
    $params=[];
@endphp











