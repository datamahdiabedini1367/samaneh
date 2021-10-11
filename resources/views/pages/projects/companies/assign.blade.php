@extends('layouts.master.indexFormMaster')

@section('stylesheet')
    @include('layouts.share.stylesheet')
@endsection

@section('page-title')
    انتخاب شرکت/شرکتهای مرتبط به پروژه {{$project->name}}
@endsection

@section('icon')
    <i class="nav-icon fas fa-gopuram"></i>
@endsection

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('projects.create')}}" class="btn btn-sm btn-danger float-left mx-2">
            ایجاد پروژه
        </a>
        <a href="{{route('projects.index')}}" class="btn btn-sm btn-success float-left mx-2">
            بازگشت به لیست پروژه ها
        </a>
    @endcan
@endsection



@php
    $pageRoute='projects.companies.assign';
    $params = $project;
@endphp


@section('model-load')
    <div class="col-sm-12">
        <div class="card ">
            <div class="card-body pt-5" >
                <table class="table table-bordered table-striped  w-100">
                    <thead>
                    <tr>
                        <th>نام شرکت </th>
                        <th style="width: 8%">تاریخ تاسیس</th>
                        <th style="width: 8%">شماره ثبت</th>
                        <th style="width: 20%;">آدرس</th>
                        <th style="width: 20%;">توضیحات</th>
                        <th style="width: 5%">انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr class="@if($project->hasCompany($company)) bg-success @endif ">

                            <td>{{$company->name}}</td>
                            <td>{{$company->registration_date_company}}</td>
                            <td>{{$company->registration_number}}</td>
                            <td>{{$company->address}}</td>
                            <td>{{$company->description}}</td>
                            <td>
                                @can('isAccess',\App\Models\Permission::query()->where('title','create_company_project')->first())

                                    <sapn name="companies[]"
                                          class="btn btn-primary submit_button"
                                          id="btn-{{$company->id}}"
                                          onclick="selectCompanyForProject({{$project->id}},{{$company->id}})"
                                    >انتخاب</sapn>

                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>نام شرکت </th>
                        <th>تاریخ تاسیس</th>
                        <th>شماره ثبت</th>
                        <th>آدرس</th>
                        <th>توضیحات</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        {{ $companies->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}

    </div>
@endsection

@section('scriptsExtra')
    <script>
        @can('isAccess',\App\Models\Permission::query()->where('title','create_company_project')->first())

        function selectCompanyForProject(projectId, companyId) {
            $.ajax({
                type: 'post',
                url: '/project/' + projectId + '/company/' + companyId,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    console.log(data);
                    var icon = $('#btn-' + companyId).parents('tr');

                    if (data.count_company !== '') {
                        if (icon.hasClass('bg-success')) {
                            icon.removeClass('bg-success');
                        } else {
                            icon.addClass('bg-success');
                        }
                    }

                }

            })
        }
        @endcan
    </script>
@endsection


