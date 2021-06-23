@extends('layouts.master')

@include('layouts.share.common_inpute_form')

@section('page_title')
    انتخاب شرکت(ها) مربوط به پروژه
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> انتخاب شرکت(ها) پروژه {{$project->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                        <li class="breadcrumb-item active">انتخاب شرکت(ها) مربوط به پروژه
                            {{$project->name}}</li>
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
                                انتخاب شرکت/شرکتهای مرتبط به پروژه {{$project->name}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5" >
                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    {{--                                'name', 'registration_date', 'email', 'address', 'registration_number'--}}
                                                    <th>نام شرکت </th>
                                                    <th>تاریخ تاسیس</th>
                                                    <th>شماره ثبت</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($companies as $company)
                                                    <tr class="@if($project->hasCompany($company)) bg-success @endif ">

                                                    <td>{{$company->name}}</td>
                                                        <td>{{$company->registration_date}}</td>
                                                        <td>{{$company->registration_number}}</td>
                                                        <td>
                                                            @can('isAccess',\App\Models\Permission::query()->where('title','create_company_project')->first())

                                                            <sapn name="companies[]"
                                                                  class="btn btn-primary "
                                                                  id="btn-{{$company->id}}"
                                                                  onclick="selectCompanyForProject({{$project->id}},{{$company->id}})"
                                                            >انتخاب</sapn>

                                                            @endcan


                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام شرکت </th>
                                                    <th>تاریخ تاسیس</th>
                                                    <th>شماره ثبت</th>

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


    <script>
        @can('isAccess',\App\Models\Permission::query()->where('title','create_company_project')->first())

        function selectCompanyForProject(projectId,companyId){
            $.ajax({
                type: 'post',
                url:'/project/'+projectId+'/company/'+companyId,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    console.log(data);
                    var icon = $('#btn-'+companyId).parents('tr');

                    if (data.count_company !== '') {
                        if (icon.hasClass('bg-success')) {
                            icon.removeClass('bg-success');
                        } else {
                            icon.addClass('bg-success');
                        }
                    }

                }

            })
        }
        @@endcan
    </script>



@endsection


