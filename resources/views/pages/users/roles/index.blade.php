@extends('layouts.master.indexFormMaster')

@section('icon')<i class="nav-icon fa fa-users"></i>@endsection
@section('page-title', ' لیست نقش های سیستم')

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('roles.create')}}" class="btn btn-sm btn-danger float-left">ایجاد نقش جدید</a>
    @endcan
@endsection

@section('model-load')
    <table class="table table-bordered table-striped  w-100">
        <thead>
        <tr>
            <th style="width: 10%;">#</th>
            <th>عنوان نقش</th>
            @can('isAccess',\App\Models\Permission::query()->where('title','edit_role')->first())
                <th style="width: 10%;">ویرایش</th>
            @endcan
            @can('isAccess',\App\Models\Permission::query()->where('title','delete_role')->first())
                <th style="width: 10%;">حذف</th>
            @endcan
        </tr>
        </thead>
        <tbody>

        @foreach($roles as $role)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$role->title}}</td>
                @can('isAccess',\App\Models\Permission::query()->where('title','edit_role')->first())
                    <td>
                        <a href="{{route('roles.edit',$role->id)}}"
                           class="btn btn-warning btn-ico btn-ico-tc-black btn-edit" title="ویرایش">
                        </a>
                    </td>
                @endcan
                @can('isAccess',\App\Models\Permission::query()->where('title','delete_role')->first())
                    <td>
                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete" ,'data-toggle'=>"modal", 'data-target'=>"#removeItem",
                                'onclick'=>'deleteItem("'.route('roles.delete',[$role->id]).'")' ]) }}
                    </td>
                @endcan

            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $roles->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}

@endsection

@php
    $pageRoute = 'roles.index';
    $params=[]
@endphp



