@extends('layouts.master')

@include('layouts.share.common_inpute_form')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> ثبت شخص جدید</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active"> ثبت 'شخص جدید</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 m-auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">فرم ثبت شخص</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('persons.store')}}" id="store_project">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="firstName"> نام :</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                   placeholder="نام را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nikeName"> اسم مستعار :</label>
                                            <input type="text" class="form-control" id="nikeName" name="nikeName"
                                                   placeholder="اسم مستعار را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="lastName"> نام خانوادگی :</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                   placeholder="نام خانوادگی را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="fatherName"> نام پدر :</label>
                                            <input type="text" class="form-control" id="fatherName" name="fatherName"
                                                   placeholder=" نام پدر را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="motherName"> نام مادر :</label>
                                            <input type="text" class="form-control" id="motherName" name="motherName"
                                                   placeholder=" نام مادر را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="married"> وضعیت تاهل :</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="married">
                                                <label class="form-check-label">متاهل</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="married">
                                                <label class="form-check-label">مجرد</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="married">جنسیت :</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="gender">
                                                <label class="form-check-label">مرد</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="0" name="gender">
                                                <label class="form-check-label">زن</label>
                                            </div>
                                        </div>
                                    </div>
{{--                                    ------------------}}
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label> تاریخ تولد :</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control normal-example ltr"  name="birthdate">
                                            </div>
                                        </div>
                                    </div>
{{--                                    ------------------}}
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="birthdatePlace"> مکان تولد :</label>
                                            <input type="text" class="form-control" id="birthdatePlace"
                                                   name="birthdatePlace"
                                                   placeholder=" مکان تولد را وارد کنید">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nationalCode"> کد ملی :</label>
                                            <input type="text" class="form-control" id="nationalCode"
                                                   name="nationalCode"
                                                   min="10" minlength="10" max="10" maxlength="10"
                                                   placeholder=" کد ملی را وارد کنید">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="address">آدرس:</label>
                                            <textarea class="form-control" rows="3" placeholder="وارد کردن اطلاعات ..."
                                                      id="address"
                                                      name="address">

                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bio">بیوگرافی</label>
                                            <textarea class="form-control" rows="3" placeholder="وارد کردن اطلاعات ..."
                                                      id="bio"
                                                      name="bio">

                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="entertainments">سرگرمی ها</label>
                                            <textarea class="form-control" rows="3"
                                                      placeholder="سرگرمی های فرد را وارد کنید ..." id="entertainments"
                                                      name="entertainments">

                                    </textarea>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="personalFavorites">علایق شخصی:</label>
                                            <textarea class="form-control" rows="3"
                                                      placeholder="علایق شخصی فرد را وارد کنید ..."
                                                      id="personalFavorites"
                                                      name="personalFavorites">

                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="politicalOrientation">گرایش سیاسی:</label>
                                            <textarea class="form-control" rows="3"
                                                      placeholder="گرایش سیاسی فرد را وارد کنید ..."
                                                      id="politicalOrientation"
                                                      name="politicalOrientation">

                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="languageUse"> زبانهای مورد استفاده:</label>
                                            <textarea class="form-control" rows="3"
                                                      placeholder="گرایش سیاسی فرد را وارد کنید ..." id="languageUse"
                                                      name="languageUse">

                                    </textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ادامه</button>
                            </div>
                        </form>

                        @include('errors')

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


