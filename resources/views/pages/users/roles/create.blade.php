@extends('layouts.master.createFormMaster')


@section('page-title')
    تعریف نقش جدید
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','create_role')->first())
        <a href="{{route('roles.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست نقش ها</a>
    @endcan
@endsection

@section('create_form')

    {{Form::open(['route'=>'roles.store',"id"=>"store_role"])}}
    @csrf
    <div class="card-body">
        <div class="form-group">
            {{Form::label('title',"عنوان نقش :")}}
            {{Form::text('title',old('title'),['class'=>"form-control",'data-rule-required'=>"true", 'data-rule-minlength'=>"5",'placeholder'=>"عنوان نقش را وارد کنید"])}}
        </div>
        <div class="text-danger  text-bold" id="error_title">
            @error('title')
            {{$message}}
            @enderror
        </div>

        <div class="form-group">
            {{Form::label('description','توضیحات')}}
            {{Form::textarea('description',old('description'),["class"=>"form-control", 'rows'=>"2", 'placeholder'=>"وارد کردن اطلاعات ..."] ) }}
        </div>
        <div class="text-danger text-bold " id="error_description">
            @error('description')
            {{$message}}
            @enderror
        </div>

        <div class="form-group">
            <div class="row">
                @foreach($permissions as $permission)
                    @if($loop->iteration == 1)
                        <div class="col-sm-4">
                            {{ Form::checkbox('permissions[]', $permission->id,hasPermission($permission->id), ['id'=>$permission->id,'class'=>"minimal",'data-rule-required'=>"true" ,'data-rule-minlength'=>"1"])}}
                            {{Form::label($permission->id,$permission->description)}}
                        </div>
                    @else
                        <div class="col-sm-4">
                            {{ Form::checkbox('permissions[]', $permission->id, hasPermission($permission->id), ['class'=>"minimal",'id'=>$permission->id])}}
                            {{Form::label($permission->id,$permission->description)}}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="text-danger text-bold " id="error_permissions">
            @error('permissions')
            {{$message}}
            @enderror
        </div>

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    {{Form::submit('ثبت نقش سیستمی',['class'=>"btn btn-primary float-left",'id'=>"submit_button"])}}
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}

@endsection
@section('scriptsExtra')

    <script>

            $('#store_role').validate(
                {
                    messages: {
                        title: {
                            required: " عنوان نقش اجباریست",
                            minlength: jQuery.validator.format("حداقل طول نام پروژه باید بیشتر از {0} حرف باشد"),
                        },
                        "permissions[]": {
                            required: 'حداقل یک سطح دسترسی باید انتخاب شود',
                        }
                    },
                    errorPlacement: function (error, element) {
                        if (element.attr("name") == 'permissions[]') {
                            error.appendTo('#error_permissions')
                        } else {
                            var n = element.attr("name");
                            $("#error_" + n).addClass("text-bold");
                            error.appendTo("#error_" + n);
                        }
                    }
                }
            );
    </script>


@endsection


