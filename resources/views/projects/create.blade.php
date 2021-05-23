@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> ثبت پروژه جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> ثبت پروژه جدید</li>
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
                            <h3 class="card-title">فرم ثبت پروژه</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('projects.store')}}" id="store_project">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name"> نام پروژه:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="نام پروژه را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label> تاریخ شروع پروژه:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                        </div>
                                        <input class="normal-example form-control" name="startDate"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label> تاریخ پایان پروژه:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                        </div>
                                        <input class="normal-example form-control" name="endDate"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>توضیحات</label>
                                    <textarea class="form-control" rows="3" placeholder="وارد کردن اطلاعات ..."
                                              name="description">

                                    </textarea>
                                </div>

                            </div>
                            <!--
                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-header bg-info" data-widget="collapse">
                                            <h3 class="card-title ">تخصیص کار به کاربران </h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body pt-5">

                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>ایمیل</th>
                                                    <th>موبایل</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>
{{--                                                @foreach($users as $user)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{$user->name}}</td>--}}
{{--                                                        <td>{{$user->email}}</td>--}}
{{--                                                        <td>{{$user->mobile}}</td>--}}
{{--                                                        <td><input type="checkbox" name="users[]" value="{{$user->id}}"--}}
                                                                   form="store_project"></td>
                                                    </tr>
{{--                                                @endforeach--}}
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>ایمیل</th>
                                                    <th>موبایل</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                        <div class="card-footer bg-gray-light" data-widget="collapse">
                                            <h3 class="card-title ">^ تخصیص کار به کاربران </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-header bg-info" data-widget="collapse">
                                            <h3 class="card-title ">شرکت(های) مرتبط</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body pt-5">

                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>نام شرکت</th>
                                                    <th>تاریخ تاسیس</th>
                                                    <th>شماره ثبت</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>
{{--                                                @foreach($companies as $company)--}}
                                                    <tr>
{{--                                                        <td>{{$company->name}}</td>--}}
{{--                                                        <td>{{$company->registration_date}}</td>--}}
{{--                                                        <td>{{$company->registration_number}}</td>--}}
                                                        <td>
                                                            <input type="checkbox" name="companies[]"
{{--                                                                   value="{{$company->id}}"--}}
                                                                   form="store_project">
                                                        </td>
                                                    </tr>
{{--                                                @endforeach--}}
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام شرکت</th>
                                                    <th>تاریخ تاسیس</th>
                                                    <th>شماره ثبت</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                        <div class="card-footer bg-gray-light" data-widget="collapse">
                                            <h3 class="card-title ">^ شرکت(های) مرتبط</h3>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-header bg-info" data-widget="collapse">
                                            <h3 class="card-title ">افراد پروژه</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body pt-5 ">
                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نام پدر</th>
                                                    <th>کد ملی</th>
                                                    <th>تاریخ تولد</th>
                                                    <th>جنسیت</th>
                                                    <th>وضعیت تاهل</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>

{{--                                                @foreach($persons as $person)--}}
                                                    <tr>
{{--                                                        <td>{{$person->firstName}}</td>--}}
{{--                                                        <td>{{$person->lastName}}</td>--}}
{{--                                                        <td>{{$person->fatherName}}</td>--}}
{{--                                                        <td>{{$person->nationalCode}}</td>--}}
{{--                                                        <td>{{$person->birthdate}}</td>--}}
{{--                                                        <td>{{$person->gender_person}}</td>--}}
{{--                                                        <td>{{$person->married_person}}</td>--}}
{{--                                                        <td>--}}
{{--                                                            <input type="checkbox" name="persons[]"--}}
{{--                                                                   value="{{$person->id}}"--}}
{{--                                                                   form="store_project">--}}
{{--                                                        </td>--}}
                                                    </tr>
{{--                                                @endforeach--}}
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نام پدر</th>
                                                    <th>کد ملی</th>
                                                    <th>تاریخ تولد</th>
                                                    <th>جنسیت</th>
                                                    <th>وضعیت تاهل</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </tfoot>
                                            </table>


                                        </div>

                                        <div class="card-footer bg-gray-light" data-widget="collapse">
                                            <h3 class="card-title ">^ افراد پروژه</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ثبت پروژه</button>
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
    <script>
        hello
    </script>

@endsection



