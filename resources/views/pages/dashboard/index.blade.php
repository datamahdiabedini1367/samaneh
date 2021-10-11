@extends('layouts.master.adminMaster')

@section('stylesheetsExtra')

@endsection

@section('scripts')
    @include('layouts.share.script')

@endsection


@section('page-title')
   داشبورد
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/dashboard">داشبورد</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <h1 class="float-sm-left">
                        @yield('page-title')</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$countUser}}</h3>

                            <p>تعداد کاربران ثبت شده</p>
                        </div>
                        <div class="icon py-2">
                            <i class=" fa fa-users"></i>
                        </div>
                        <a href="/user/index" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$countProject}}</h3>

                            <p>تعداد پروژه های ثبت شده</p>
                        </div>
                      <div class="icon py-2">
                            <i class=" fas fa-gopuram"></i>
                        </div>
                        <a href="{{route('projects.index')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$countCompany}}</h3>

                            <p>تعداد شرکتهای ثبت شده</p>
                        </div>
                      <div class="icon py-2">
                            <i class=" fas fa-city"></i>
                        </div>
                        <a href="{{route('companies.index')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$countPerson}}</h3>
                            <p>تعداد افراد ثبت شده</p>
                        </div>
                      <div class="icon py-2">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="{{route('persons.index')}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
