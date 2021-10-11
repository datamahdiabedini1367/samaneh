@extends('layouts.master.indexFormMaster')

@section('icon')
    <i class="nav-icon fa fa-users"></i>
@endsection
@section('page-title', 'لیست کاربران')

@section('page-button')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_user')->first())
        <a href="{{route('signup')}}" class="btn btn-sm btn-danger float-left">تعریف کاربر جدید</a>
    @endcan
@endsection

@section('model-load')
    @if($users->count()>0)
        @can('isAccess',\App\Models\Permission::query()->where('title','export_user')->first())
            <div class="col-sm-12 ">
                <a href="{{route('users.export')}}"
                   class="btn btn-outline-success float-left btn-export btn-ico-tc-black btn-export-download-execl"></a>
            </div>
        @endcan
    @endif

    <table class="table table-bordered table-striped  w-100">
        <thead>
        <tr>
            <th style="width:5% ;">#</th>
            <th>نام کاربری</th>
            @can('isAccess',\App\Models\Permission::query()->where('title','active_user')->first())
                <th style="width:15% ;">وضعیت</th>
            @endcan

            @can('isAccess',\App\Models\Permission::query()->where('title','change_role')->first())
                <th style="width:15% ;">تغییر سطح دسترسی</th>
            @endcan
            @can('isAccess',\App\Models\Permission::query()->where('title','delete_user')->first())
                <th style="width:5% ;">حذف</th>
            @endcan


        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                @can('isAccess',\App\Models\Permission::query()->where('title','active_user')->first())
                    <td>
                        <sapn name="user"
                              class="btn btn-primary submit_button"
                              style=" background-color:  @if($user->is_active == 1) green @else red @endif"
                              id="btn-{{$user->id}}"
                              onclick="activeORDeactiveUser({{$user->id}})"
                        >
                            @if($user->is_active == 1) فعال @else غیرفعال @endif
                        </sapn>
                    </td>
                @endcan

                @can('isAccess',\App\Models\Permission::query()->where('title','change_role')->first())
                    <td class="styled-select">
                        {{Form::select("role_id_".$user->id,  $roles,
                            $user->role_id,
                            ['class'=>"form-control", 'id'=>"role_id_".$user->id , 'onchange'=>"change_role($user->id)",
                            'placeholder'=>'گزینه مورد نظر را انتخاب کنید'
                            ] )}}
                    </td>
                @endcan


                @can('isAccess',\App\Models\Permission::query()->where('title','delete_user')->first())
                    <td>
                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete",
                                            'data-toggle'=>"modal" , 'data-target'=>"#removeItem",
                                            'onclick'=>'deleteItem("'.route('user.delete',[$user->id]).'")'])}}
                    </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}


@endsection

@php
    $pageRoute = 'users.listUsers';
    $params=[];
@endphp


@section('scriptsExtra')
    <script>
        @can('isAccess',\App\Models\Permission::query()->where('title','change_role')->first())
        function change_role(userId) {
            var select = $('#role_id_' + userId);
            var role_id = select.val();
            $.ajax({
                type: 'post',
                url: '/users/changeRole/' + userId ,
                data: {
                    _token: "{{csrf_token()}}",
                    role_id:role_id
                },
                success: function (data) {
                    console.log(data.msg);
                    if (data.msg == "ok") {
                        $('#role_id_' + userId + ' option:contains(' + role_id + ')').prop({selected: true});
                    }
                }

            })
        }
        @endcan

        @can('isAccess',\App\Models\Permission::query()->where('title','active_user')->first())

        function activeORDeactiveUser(userId) {
            var btn = document.getElementById('btn-' + userId);
            $.ajax({
                type: 'post',
                url: '/users/' + userId + '/changeActivation',
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    var icon = $('#btn-' + userId).parents('tr');
                    if (data.msg == "1") {
                        btn.innerHTML = "فعال";
                        btn.style.backgroundColor = "green";

                    } else if (data.msg == 0) {
                        btn.innerHTML = "غیرفعال";
                        btn.style.backgroundColor = "red";

                    }
                }
            })
        }
        @endcan
    </script>
@endsection






