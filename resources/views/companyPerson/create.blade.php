@extends('layouts.master')
@include('layouts.share.common_inpute_form')

{{--افزودن شخص به شرکت --}}

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h3 class="card-title">ثبت فرد برای شرکت {{$company->name}}</h3>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @can('isAccess',\App\Models\Permission::query()->where('title','create_person_company')->first())
                        <form role="form" method="post" action="{{route('companies.persons.store',$company)}}"
                              id="store_project">
                            @csrf


                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="startDate"> تاریخ شروع به کار :</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input class="normal-example form-control" name="startDate"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="endDate"> تاریخ اتمام کار :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                            <input class="normal-example form-control" name="endDate"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="semat"> سمت :</label>
                                        <input type="text" class="form-control" id="semat" name="semat"
                                               placeholder="سمت را وارد کنید">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="section"> بخش :</label>
                                        <input type="text" class="form-control" id="section" name="section"
                                               placeholder="بخش را وارد کنید">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="reasonLeavingJob"> علت ترک شغل :</label>
                                        <textarea type="text" class="form-control" id="reasonLeavingJob"
                                                  name="reasonLeavingJob" rows="1"
                                                  placeholder="علت ترک شغل را وارد کنید">

                                        </textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row px-4">
                                <div class="col-sm-12">
                                    <div class="card ">
                                        <div class="card-body pt-5">
                                            <table class="table table-bordered table-striped dataTable1 w-100">
                                                <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نام پدر</th>
                                                    <th>تاریخ تولد</th>
                                                    <th>محل تولد</th>
                                                    <th>جنسیت</th>
                                                    <th>وضعیت تاهل</th>
                                                    <th>کد ملی</th>
                                                    <th>انتخاب</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($persons as $person)
                                                    @if(!$company->hasPerson($person))
                                                        <tr>
                                                            <td>{{$person->firstName}}</td>
                                                            <td>{{$person->lastName}}</td>
                                                            <td>{{$person->fatherName}}</td>
                                                            <td>{{$person->birthdate}}</td>
                                                            <td>{{$person->birthdatePlace}}</td>
                                                            <td>{{$person->gender_person}}</td>
                                                            <td>{{$person->married_person}}</td>
                                                            <td>{{$person->nationalCode}}</td>
                                                            <td class="text-center">
                                                                <input type="radio" name="person_id"
                                                                       value="{{$person->id}}" class="form-group">
                                                            </td>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>نام خانوادگی</th>
                                                    <th>نام پدر</th>
                                                    <th>تاریخ تولد</th>
                                                    <th>محل تولد</th>
                                                    <th>جنسیت</th>
                                                    <th>وضعیت تاهل</th>
                                                    <th>کد ملی</th>
                                                    <th>انتخاب</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                        @endcan
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
