@extends('layouts.master.indexFormMaster')

@section('page-title', "  تخصیص کاربر/کاربران به پروژه " . $project->name)
@section('icon')
    <i class="nav-icon fas fa-gopuram"></i>
@endsection

@section('page-button')

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

@endsection

@section('model-load')
    <div class="col-sm-12">
        <div class="card ">
            <div class="card-body pt-5" >

                <table  class="table table-bordered table-striped  w-100">
                    <thead>
                    <tr>
                        <th>نام کاربری</th>
                        <th style="width: 10%">انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="@if($project->hasUser($user)) bg-success @endif">
                            <td>{{$user->username}}</td>
                            <td>
                                <sapn name="users[]"
                                      class="btn btn-primary submit_button "
                                      id="btn-{{$user->id}}"
                                      onclick="selectUserForProject({{$project->id}},{{$user->id}})"
                                >انتخاب</sapn>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>نام کاربری</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        {{ $users->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}

    </div>

@endsection

@php
$pageRoute = 'projects.users.assign';
$params=$project;
@endphp

@section('scriptsExtra')
    <script>
        function selectUserForProject(projectId,userId){
            $.ajax({
                type: 'post',
                url:'/project/'+projectId+'/user/'+userId,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    console.log(data);
                    var icon = $('#btn-'+userId).parents('tr');

                    if (icon.hasClass('bg-success')) {
                        icon.removeClass('bg-success');
                    } else {
                        icon.addClass('bg-success');
                    }
                }
            })
        }
    </script>
@endsection


