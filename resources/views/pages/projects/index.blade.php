@extends('layouts.master.indexFormMaster')

@section('icon')
    <i class="nav-icon fas fa-gopuram"></i>
@endsection
@section('page-title', ' لیست پروژه ها')

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('projects.create')}}" class="btn btn-sm btn-danger float-left">
            ایجاد پروژه
        </a>
    @endcan
@endsection

@section('model-load')
    @if($projects->count()>0)
        @can('isAccess',\App\Models\Permission::query()->where('title','export_project')->first())
            <div class="col-sm-12 ">
                <a href="{{route('projects.export')}}" class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
            </div>
        @endcan
    @endif

    <table class="table table-bordered table-striped  col-sm-12 w-100">
        <thead>
        <tr>
            <th  class="align-text-top">نام پروژه</th>
            <th style="width: 5%" class="align-text-top text-center">تاریخ شروع</th>
            <th style="width: 5%" class="align-text-top text-center">تاریخ پایان</th>
            <th  style="width:7%" class="align-text-top text-center">افراد مرتبط</th>
            <th  style="width:7%" class="align-text-top text-center">شرکت مرتبط</th>
            <th  style="width:8%" class="align-text-top text-center">افراد اجرا کننده</th>
            @can('isAccess',\App\Models\Permission::query()->whereIn('title',['edit_project','show_detail_project','delete_project'])->first())
                <th style="width: 5%" class="align-text-top text-center">ویرایش</th>
                <th style="width: 5%" class="align-text-top text-center">نمایش</th>
                <th style="width: 5%" class="align-text-top text-center">حذف</th>
            @endcan

        </tr>
        <tr>

        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)

            <tr>
                <td>{{$project->name}}</td>
                <td class="align-text-top text-center">{{convert_date($project->startDate,'jalali')}}</td>
                <td class="align-text-top text-center">{{convert_date($project->endDate,'jalali')}}</td>
                @can('isAccess',\App\Models\Permission::query()->where('title','create_person_project')->first())
                    <td class="align-text-top text-center">
                        <a href="{{route('projects.persons.assign',$project)}}"
                           class="btn  btn-secondary   btn-ico btn-ico-tc-black btn-personRelated" title=" انتخاب افراد">
                        </a>
                    </td>
                @endcan

                @can('isAccess',\App\Models\Permission::query()->where('title','create_company_project')->first())

                    <td class="align-text-top text-center">
                        <a href="{{route('projects.companies.assign',$project)}}"
                           class="btn btn-secondary btn-ico btn-ico-tc-black btn-company" title=" انتخاب شرکت/شرکتها">
                        </a>
                    </td>
                @endcan

                @can('isAccess',\App\Models\Permission::query()->where('title','assign_user_to_project')->first())
                    <td class="align-text-top text-center">
                        <a href="{{route('projects.users.assign',$project)}}"
                           class="btn btn-secondary btn-ico btn-ico-tc-black btn-plus" title=" تخصیص کاربر/کاربران جدید">
                        </a>
                    </td>
                @endcan
                @can('isAccess',\App\Models\Permission::query()->whereIn('title',['edit_project','show_detail_project','delete_project'])->first())
                    <td class="align-text-top text-center" >
                        @can('isAccess',\App\Models\Permission::query()->where('title','edit_project')->first())

                            <a href="{{route('projects.edit',$project)}}"
                               class="btn btn-warning btn-ico btn-ico-tc-black btn-edit" title="ویرایش">
                            </a>
                        @endcan
                    </td>
                    <td class="align-text-top text-center" >

                        @can('isAccess',\App\Models\Permission::query()->where('title','show_detail_project')->first())
                            <a href="{{route('projects.show',$project)}}"
                               class="btn btn-primary btn-ico btn-ico-tc-black btn-eye" title="نمایش">
                            </a>
                        @endcan
                    </td>
                    <td class="align-text-top text-center" >
                        @can('isAccess',\App\Models\Permission::query()->where('title','delete_project')->first())
                            {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete" ,'data-toggle'=>"modal" ,'data-target'=>"#removeItem",
                               'onclick'=>'deleteItem("'.route('projects.destroy',[$project->id]).'")']) }}
                        @endcan
                    </td>
                @endcan

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $projects->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}

@endsection

@php
$pageRoute = 'projects.index';
$params=[]
@endphp












