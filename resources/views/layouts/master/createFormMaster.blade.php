@extends('layouts.master.adminMaster')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <h1 class="float-sm-left">@yield('page-title')</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 m-auto">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header" id="cart_header" >
                            <div class="col-sm-6 float-right">

                                <h3 class="card-title">
                                    @yield('icon')
                                    @yield('page-title')</h3>
                            </div>
                            <div class="col-sm-6 float-left">
                                @yield('button-page')
                            </div>

                        </div>
                        @yield('create_form')
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

