@extends('layouts.master.indexFormMaster')

@section('icon')
    <i class="nav-icon fas fa-gopuram"></i>

@endsection
@section('page-title', 'لیست پروژه های من')

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('projects.index')}}" class="btn btn-sm btn-danger float-left">لیست پروژه ها</a>
    @endcan
@endsection

@section('model-load')
    <table class="table table-bordered table-striped  w-100">
        <thead>
        <tr>
            <th>#</th>
            <th>نام پروژه</th>
            <th>تاریخ شروع پروژه</th>
            <th>تاریخ اتمام پروژه</th>
            <th>توضیحات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->name}}</td>
                <td>{{$project->start_date_project}}</td>
                <td>{{$project->end_date_project}}</td>
                <td>{{$project->description}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $projects->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4') }}
@endsection

@php
$pageRoute = 'user.projects';
$params=[]
@endphp



