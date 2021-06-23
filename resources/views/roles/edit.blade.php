@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> ویرایش نقش سیستمی {{$role->description}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> ویرایش نقش سیستمی {{$role->description}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 m-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">فرم ویرایش نقش سیستمی {{$role->title}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('roles.update',$role->id)}}" id="store_project">
                            @csrf
                            @method('PATCH')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title"> عنوان نقش:</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{$role->title}}"
                                           placeholder="عنوان نقش را وارد کنید">
                                </div>


                                <div class="form-group">
                                    <label>توضیحات</label>
                                    <textarea class="form-control" rows="3" placeholder="وارد کردن اطلاعات ..."
                                              name="description">

                                    </textarea>
                                </div>

                                <div class="form-group">


                                    @foreach($permissions as $permission)


                                        <label style="width: 300px">
                                            <input type="checkbox" class="minimal" name="permissions[]"
                                                   value="{{$permission->id}}"
                                                   title="{{$permission->title}}"
                                            @if($role->hasPermission($permission))
                                                checked
                                                @endif
                                            >
                                            {{$permission->description}}
                                        </label>

                                    @endforeach


                                    {{--                                    <label>چند انتخابی</label>--}}
                                    {{--                                    <select class="form-control select2" multiple="multiple"--}}
                                    {{--                                            data-placeholder="یک استان انتخاب کنید"--}}
                                    {{--                                            style="width: 100%;text-align: right">--}}
                                    {{--                                        <option>مازندران</option>--}}
                                    {{--                                        <option>شیراز</option>--}}
                                    {{--                                        <option>گلستان</option>--}}
                                    {{--                                        <option>اردبیل</option>--}}
                                    {{--                                        <option>خوزستان</option>--}}
                                    {{--                                        <option>سیستان و بلوچستان</option>--}}
                                    {{--                                        <option>مشهد</option>--}}
                                    {{--                                    </select>--}}
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ثبت نقش سیستمی</button>
                            </div>
                        </form>

                        @include('errors')

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')

@endsection



