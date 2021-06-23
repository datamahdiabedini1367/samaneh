@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    {{--    @php--}}
    {{--        dd($roles);--}}
    {{--    @endphp--}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> لیست پروژه های من
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">
                            لیست پروژه های من
                        </li>
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
                            <h3 class="card-title">
                                لیست پروژه های من
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post"
                              action="#"
                              id="updated_project"
                        >
                            @csrf

                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5">

                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>نام پروژه</th>
                                                    <th>تاریخ شروع پروژه</th>
                                                    <th>تاریخ اتمام پروژه</th>
                                                    <th>توضیحات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($projects as $project)
                                                    <tr>
                                                        <td>{{$project->id}}</td>
                                                        <td>{{$project->name}}</td>
                                                        <td>{{$project->startDate}}</td>
                                                        <td>{{$project->endDate}}</td>
                                                        <td>{{$project->description}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>نام پروژه</th>
                                                    <th>تاریخ شروع پروژه</th>
                                                    <th>تاریخ اتمام پروژه</th>
                                                    <th>توضیحات</th>

                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>

                        @include('errors')
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection


