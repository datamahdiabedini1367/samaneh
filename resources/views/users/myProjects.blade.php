@extends('layouts.master')
@include('layouts.share.common_inpute_form')



@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>لیست پروژه های من</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> لیست پروژه های من</li>
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

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>نام پروژه</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
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
                                    <td>-</td>
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
                                <th>افراد اجرا کننده</th>
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


