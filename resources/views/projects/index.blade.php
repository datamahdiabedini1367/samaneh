@extends('layouts.master')
@include('layouts.share.common_inpute_form')



@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>لیست پروژه ها</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> لیست پروژه ها</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">پروژه</h3>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{route('projects.create')}}" class="btn  btn-primary"> ایجاد پروژه
                                    جدید</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                            <div class="card-body">
                                <table  class="table table-bordered table-striped dataTable1 col-sm-12 w-100">
                                    <thead>
                                    <tr>
                                        <th>نام پروژه</th>
                                        <th>تاریخ شروع</th>
                                        <th>تاریخ پایان</th>
                                        <th>عملیات</th>
                                        <th>افراد اجرا کننده</th>
                                        <th>افراد مرتبط</th>
                                        <th>شرکت(ها) مرتبط</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->startDate}}</td>
                                            <td>{{$project->endDate}}</td>

                                            <td>
                                                <a href="{{route('projects.edit',$project)}}" class="btn btn-sm btn-success w-50">ویرایش</a>
                                                <a href="{{route('projects.show',$project)}}" class="btn btn-sm btn-warning w-50">نمایش</a>
                                                <form action="{{route('projects.destroy',$project)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-sm btn-danger w-50" value="حذف">
                                                </form>
                                            </td>

                                            <td>
                                                <a href="{{route('projects.users.assign',$project)}}" class="btn btn-sm btn-success w-100">تخصیص کاربر/کاربران جدید</a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>نام پروژه</th>
                                        <th>تاریخ شروع</th>
                                        <th>تاریخ پایان</th>
                                        <th>افراد مرتبط</th>
                                        <th>شرکت(ها) مرتبط</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

