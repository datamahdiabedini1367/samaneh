@extends('layouts.master.indexFormMaster')

@section('page-title', " انتخاب افراد پروژه " . $project->name)


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

@section('model-load')
    <div class="col-sm-12">
        <div class="card ">
            <div class="card-body pt-5">
                <table class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>نام پدر</th>
                        <th>تاریخ تولد</th>
                        <th>محل تولد</th>
                        <th>جنسیت</th>
                        <th>کد ملی</th>
                        <th style="width: 10%">انتخاب</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($persons as $person)
                        <tr class="@if($project->hasPerson($person)) bg-success @endif ">
                            <td>{{$person->firstName}}</td>
                            <td>{{$person->lastName}}</td>
                            <td>{{$person->fatherName}}</td>
                            <td>{{$person->birthdate_person}}</td>
                            <td>{{$person->birthdatePlace}}</td>
                            <td>{{$person->gender_person}}</td>
                            <td>{{$person->nationalCode}}</td>

                            <td>
                                @can('isAccess',\App\Models\Permission::query()->where('title','create_person_project')->first())
                                    {{Form::button('انتخاب',['name'=>"persons[]",
                                            'class'=>"personSelected btn  submit_button",
                                            'id'=>"btn-$person->id",
                                    'onclick'=>"selectPersonForProject($project->id,$person->id)"])}}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        {{ $persons->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}
    </div>
@endsection

@php
    $pageRoute = 'projects.persons.assign';
    $params=[$project]
@endphp

@section('scriptsExtra')
    <script>
        @can('isAccess',\App\Models\Permission::query()->where('title','create_person_project')->first())

        function selectPersonForProject(projectId, personId) {
            $.ajax({
                type: 'post',
                url: '/project/' + projectId + '/persons/' + personId,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    var icon = $('#btn-' + personId).parents('tr');

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


