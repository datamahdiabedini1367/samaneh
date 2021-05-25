@extends('layouts.master')
@include('layouts.share.common_inpute_form')



@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>لیست افراد </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> لیست افراد </li>
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
                                <h3 class="card-title">افراد</h3>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{route('persons.create')}}" class="btn btn-sm btn-primary"> ثبت فرد جدید</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
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
                                <th>عملیات</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($persons as $person)
                                <tr>
{{--                                    <td>{{$person->id}}</td>--}}
                                    <td>{{$person->firstName}}</td>
                                    <td>{{$person->lastName}}</td>
                                    <td>{{$person->fatherName}}</td>
                                    <td>{{$person->birthdate}}</td>
                                    <td>{{$person->birthdatePlace}}</td>
                                    <td>{{$person->gender_person}}</td>
                                    <td>{{$person->nationalCode}}</td>

                                    <td>
                                        <a href="{{route('persons.edit',$person)}}" class="btn btn-sm btn-success w-100">ویرایش</a>
                                        <form action="{{route('persons.destroy',$person)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger w-100" value="حذف">
                                        </form>

                                        <a href="{{route('items.photos.index',['person',$person])}}" class="btn btn-sm btn-primary w-100">گالری تصاویر </a>
                                        <a href="{{route('syberspace.create',['person',$person])}}" class="btn btn-sm btn-info w-100">ثبت اطلاعات فضای مجازی</a>

                                        <a href="{{route('educational.create',$person)}}" class="btn btn-sm btn-warning w-100">سوابق تحصیلی</a>
                                        <a href="{{route('person.related.create',$person)}}" class="btn btn-sm btn-light w-100">ثبت اطلاعات افراد مرتبط</a>


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
                                <th>عملیات</th>
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


