@extends('layouts.master')

@include('layouts.share.common_inpute_form')

@section('page_title')
    انتخاب افراد مربوط به پروژه
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> انتخاب افراد پروژه {{$project->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                        <li class="breadcrumb-item active">انتخاب افراد مربوط به پروژه
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
                                انتخاب افراد مرتبط به پروژه {{$project->name}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5" >
                                            <table  class="table table-bordered table-striped dataTable1" >
                                                <thead>
                                                <tr>
                                                    {{--                                <th>#</th>--}}
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نام پدر</th>
                                                    <th>تاریخ تولد</th>
                                                    <th>محل تولد</th>
                                                    <th>جنسیت</th>
                                                    <th>کد ملی</th>
                                                    <th>انتخاب</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($persons as $person)
                                                    <tr class="@if($project->hasPerson($person)) bg-success @endif ">
                                                        {{--                                    <td>{{$person->id}}</td>--}}
                                                        <td>{{$person->firstName}}</td>
                                                        <td>{{$person->lastName}}</td>
                                                        <td>{{$person->fatherName}}</td>
                                                        <td>{{$person->birthdate}}</td>
                                                        <td>{{$person->birthdatePlace}}</td>
                                                        <td>{{$person->gender_person}}</td>
                                                        <td>{{$person->nationalCode}}</td>

                                                        <td>
                                                            <button name="persons[]"
                                                                    class="personSelected btn "
                                                                    id="btn-{{$person->id}}"
                                                                    onclick="selectPersonForProject({{$project->id}},{{$person->id}})"
                                                            >انتخاب</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    {{--                                <th>#</th>--}}
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نام پدر</th>
                                                    <th>تاریخ تولد</th>
                                                    <th>محل تولد</th>
                                                    <th>جنسیت</th>
                                                    <th>کد ملی</th>
                                                    <th> </th>
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
        function selectPersonForProject(projectId,personId){
            $.ajax({
                type: 'post',
                url:'/project/'+projectId+'/person/'+personId,
                data: {
                    _token: "{{csrf_token()}}",
                },
                success: function (data) {
                    console.log(data);
                    var icon = $('#btn-'+personId).parents('tr');

                    if (data.count_person !== '') {
                        if (icon.hasClass('bg-success')) {
                            icon.removeClass('bg-success');
                            // icon.text('انتخاب نشده')
                        } else {
                            // icon.text('انتخاب');
                            icon.addClass('bg-success');
                        }
                    }

                }

            })
        }
    </script>
@endsection


