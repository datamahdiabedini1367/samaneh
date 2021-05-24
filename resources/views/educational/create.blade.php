@extends('layouts.master')
@section('stylesheet')
    @include('layouts.share.stylesheet')
@endsection


@section('content')




    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ثبت اطلاعات تحصیلی</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> ثبت اطلاعات تحصیلی </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h3 class="card-title">ثبت اطلاعات تحصیلی
                                    {{$person->firstName}}
                                    {{$person->lastName}}
                                </h3>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-info " href="{{route("persons.index")}}"> ثبت </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">

                                <form action="{{route('educational.store',$person)}}" method="post">
                                    @csrf
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="grade"> مقطع تحصیلی :</label>
                                                <input type="text" class="form-control" id="grade" name="grade"
                                                       placeholder="مقطع تحصیلی را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="major"> رشته تحصیلی :</label>
                                                <input type="text" class="form-control" id="major" name="major"
                                                       placeholder="رشته تحصیلی را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="universityName"> نام موسسه/مکان تحصیل :</label>
                                                <input type="text" class="form-control" id="universityName" name="universityName"
                                                       placeholder="نام موسسه/مکان تحصیل را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="average"> معدل :</label>
                                                <input type="text" class="form-control" id="average" name="average"
                                                       placeholder=" معدل را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label> تاریخ شروع :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control normal-example ltr"  name="startDate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label> تاریخ اتمام :</label>

                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control normal-example ltr"  name="endDate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="average"> آدرس دانشگاه محل تحصیل :</label>
                                                <textarea  class="form-control" id="average" name="address"
                                                           placeholder="آدرس دانشگاه محل تحصیل را وارد کنید"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary ">ثبت</button>
                                        </div>
                                    </div>

                                    <div class="row py-3">
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-sm-12 m-auto">
                                        <div class="card ">
                                            <h3>
                                            سوابق تحصیلی
                                            </h3>
                                            <div class="card-body pt-5">
                                                <table class="table table-bordered table-striped  w-100"
                                                       id="emailtable">
                                                    <thead>
                                                    <tr>
                                                        <th>مقطع تحصیلی</th>
                                                        <th>رشته تحصیلی</th>
                                                        <th>نام دانشگاه محل تحصیل</th>
                                                        <th>معدل</th>
                                                        <th>آدرس</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ اتمام</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="dataAccountRegister">

                                                    @foreach($person->educationals as $educational)
                                                        <tr id="tr_{{$educational->id}}">
                                                            <td>
                                                                <input form="edit_{{$educational->id}}" type="text" class="form-control ltr w-100"
                                                                       name="grade" id="" value="{{$educational->grade}}">
                                                            </td>
                                                            <td>
                                                                <input form="edit_{{$educational->id}}" type="text" class="form-control ltr w-100"
                                                                       name="major" id="" value="{{$educational->major}}">
                                                            </td>
                                                            <td>
                                                                <input form="edit_{{$educational->id}}" type="text" class="form-control ltr w-100"
                                                                       name="universityName" id="" value="{{$educational->universityName}}">
                                                            </td>
                                                            <td>
                                                                <input form="edit_{{$educational->id}}" type="text" class="form-control ltr w-100"
                                                                       name="average" id="" value="{{$educational->average}}">
                                                            </td>
                                                            <td>
                                                                <textarea form="edit_{{$educational->id}}"  class="form-control"
                                                                          name="address" id="">{{$educational->address}}</textarea>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control normal-example ltr"
                                                                               name="startDate" form="edit_{{$educational->id}}"
                                                                               value="{{$educational->startDate}}">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                        </div>
                                                                        <input type="text" class="form-control normal-example ltr"
                                                                               name="endDate" form="edit_{{$educational->id}}"
                                                                               value="{{$educational->endDate}}">
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="col-sm-3">
                                                                <form action="{{route('educational.destroy',[$educational,$person])}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" value="حذف"
                                                                           class="btn btn-danger">
                                                                </form>
                                                                <form action="{{route('educational.update',[$educational,$person])}}"
                                                                      method="post" id="edit_{{$educational->id}}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="submit" value="ویرایش"
                                                                           class="btn btn-success">
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>مقطع تحصیلی</th>
                                                        <th>رشته تحصیلی</th>
                                                        <th>نام دانشگاه محل تحصیل</th>
                                                        <th>معدل</th>
                                                        <th>آدرس</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ اتمام</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @include('errors')

                </div>
            </div>
        </div>
        </div>
    </section>





@endsection

@section('scripts')


    @include('layouts.share.script')




@endsection
