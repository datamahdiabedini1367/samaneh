@extends('layouts.master.indexFormMaster')

@section('page-title')
    پروژه های مرتبط به
    {{$person->firstName}} {{$person->lastName}}
@endsection

@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan
@endsection

@section('model-load')

    @php
        $pageRoute='personProject.create';
        $params=$person;
    @endphp

    <div class="col-sm-12">
        <div class="card ">
            <div class="card-body pt-5">
                <table class="table table-bordered table-striped  w-100">
                    <thead>
                    <tr>
                        <th>کد پروژه</th>
                        <th>نام پروژه</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ اتمام</th>
                        <th>توضیحات</th>
                        <th>انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr class="@if($person->hasProject($project)) bg-success @endif ">
                            <td>{{$project->id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->start_date_project}}</td>
                            <td>{{$project->end_date_project}}</td>
                            <td>{{$project->description}}</td>
                            <td>
                                @can('isAccess',\App\Models\Permission::query()->where('title','create_company_project')->first())
                                    {{Form::button('انتخاب',['class'=>"btn btn-primary submit_button",'id'=>"btn-$project->id",'onclick'=>"selectProjectForPerson($project->id,$person->id)"])}}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>کد پروژه</th>
                        <th>نام پروژه</th>
                        <th>تاریخ شروع</th>
                        <th>تاریخ اتمام</th>
                        <th>توضیحات</th>
                        <th>انتخاب</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        {{ $projects->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}
    </div>

    <script>
        @can('isAccess',\App\Models\Permission::query()->where('title','create_person_project')->first())

        function selectProjectForPerson(projectId, personId) {
            $.ajax({
                type: 'post',
                url: '/persons/' + personId + '/project/' + projectId,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    console.log(data);
                    var icon = $('#btn-' + projectId).parents('tr');

                    if (data.count_person !== '') {
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









