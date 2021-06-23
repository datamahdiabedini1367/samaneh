@extends('layouts.master')
@section('stylesheet')
    @include('layouts.share.stylesheet')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1> مشخصات افراد مرتبط با {{$person->firstName}}&nbsp;&nbsp;{{$person->lastName}}</h1>
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
                            <h3 class="card-title"> مشخصات افراد مرتبط با : {{$person->firstName}}
                                &nbsp;&nbsp;{{$person->lastName}}&nbsp;&nbsp;</h3>

                        </div>
                        <div class="row p-3">
                            <div class="col-sm-12">
                                <p>
                                    <span>توجه:</span>
                                    ابتدا باید مشخصات فردی شخص مورد نظر را ثبت شده باشد برای ثبت مشخصات فرد جدید
                                    <a href="#">کلیک</a>
                                    کنید.
                                    در صورتی که فرد را قبلا ثبت کرده اید ابتدا در فرم جستجو فرد را جستجو کرده و انتخاب
                                    کنید سپس نسبت مورد نظر را انتخاب کنید و توضیحات را وارد کنید و بر روی دکمه ثبت بزنید
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="card ">
                                    <div class="card-header bg-success">
                                        <div class="row ">
                                            <div class="col-sm-6 ">
                                                <h3 class="card-title"> فرم جستجو</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped dataTable3">
                                            <thead>
                                            <tr>

                                                <th>#</th>
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
                                            @foreach($otherPerson as $personother)
                                                <tr>
                                                    <td>{{$personother->id}}</td>
                                                    <td>{{$personother->firstName}}</td>
                                                    <td>{{$personother->lastName}}</td>
                                                    <td>{{$personother->fatherName}}</td>
                                                    <td>{{$personother->birthdate}}</td>
                                                    <td>{{$personother->birthdatePlace}}</td>
                                                    <td>{{$personother->gender_person}}</td>
                                                    <td>{{$personother->nationalCode}}</td>

                                                    <td class="text-center">
                                                        <input type="radio" name="person_id" form="relatedForm"
                                                               value="{{$personother->id}}" class="form-group">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-sm-6 ">
                                <div class="card ">
                                    <div class="card-header bg-success">
                                        <div class="row ">
                                            <div class="col-sm-6 ">
                                                <h3 class="card-title">تعیین نسبت</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form action="{{route('person.related.store',$person)}}" method="post"
                                              id="relatedForm">
                                            @csrf
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                            <div class="row">
                                                در صورتی که نسبت مورد نظر شما در گزینه ها نبود می توانید با انتخاب گزینه
                                                سایر نسبت مورد نظر را وارد کنید
                                            </div>

                                            <div class="row py-2 related_type">
                                                <label for="relatedType" class="form-group col-sm-2"> نسبت :</label>
                                                <div class="col-sm-4">
                                                    <select name="individual_id" class="form-control input-lg select2"
                                                            id="relatedType"
                                                            onchange="selectRelated(this)">
                                                        <option>نسبت فرد را تعیین کنید</option>
                                                        @foreach($individuals as $individual)
                                                            <option
                                                                value="{{$individual->id}}">{{$individual->title}}</option>
                                                        @endforeach
                                                        <option value="999">سایر</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row py-2">

                                                <label for="description" class="form-group col-sm-2"> توضیحات :</label>

                                                <div class="col-sm-6">
                                                    <textarea class="form-control " id="accountNew"
                                                              name="description"
                                                              placeholder="توضیحات مد نظر را وارد کنید"></textarea>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <input type="submit" class="btn btn-primary" id="register_account"
                                                           value="ثبت اطلاعات">
                                                </div>
                                            </div>
                                        </form>

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

    {{--    @php--}}
    {{--        dd($person->relatedPerson);--}}
    {{--    @endphp--}}
    <table class="table table-hover">
        <tr>
            <td>نسبت</td>
            <td>توضیحات</td>
            <td>#</td>
            <td>نام</td>
            <td>نام خانوادگی</td>
            <td>نام پدر</td>
            <td>تاریخ تولد</td>
            <td>استان</td>
            <td>کد ملی</td>
            <td>عملیات</td>
        </tr>
        @foreach($person->relatedPerson as $related)
            <tr>

                @php
                    $individualAdd = $related->pivot->individual_id;
//dd($related->id);
//                  $titleAdd =\App\Models\Individual::query()->where('id', $individual)->first();
//dd($title->title);


//               dd($related->pivot->individual())
                @endphp
                <td>
                    <select name="individual" class="form-control input-lg select2 w-100"
                            form="formUpdate_{{$related->id}}"
                            onchange="selectRelated(this)">
                        @foreach($individuals as $individual)
                            <option
                                @if($related->pivot->individual_id == $individual->id) selected @endif
                            value="{{$individual->id}}">{{$individual->title}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <textarea class="form-control" id="accountNew"
                              name="description"
                              form="formUpdate_{{$related->id}}"
                              placeholder="توضیحات مد نظر را وارد کنید">{{$related->pivot->description}}</textarea>
                </td>
                <td>{{$related->id}}</td>
                <td>{{$related->firstName}}</td>
                <td>{{$related->lastName}}</td>
                <td>{{$related->fatherName}}</td>
                <td>{{$related->birthdate}}</td>
                <td>{{$related->birthdatePlace}}</td>
                <td>{{$related->nationalCode}}</td>
                <td>
                    <form action="{{route('person.related.delete',[$person->id,$related->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger w-100">حذف
                        </button>

                    </form>
                    <form action="{{route('person.related.update',[$person->id,$related->id])}}" method="post"
                          id="formUpdate_{{$related->id}}">
                        @csrf
                        @method('PATCH')
                        <button  class="btn btn-success w-100">ویرایش  </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection

@section('scripts')
    <script>

        function selectRelated(selectObj) {
            // get the index of the selected option
            var idx = selectObj.selectedIndex;
            var which = selectObj.options[idx].value;
            var text = selectObj.options[idx].text;
            // alert(text);
            // alert(which);
            // get the value of the selected option
            var divRelated_type = $('.related_type');
            if (text == "سایر") {
                divRelated_type.append(
                    '<div class="col-sm-4" id="related_title">' +
                    '<input type="text" class="form-control input-sm" id="title"' +
                    'name="title"' +
                    'placeholder="نسبت مورد نظر را تایپ کنید">' +
                    '</div>'
                )
            } else {
                var accounttypetitle = $('#related_title');
                accounttypetitle.remove();
            }
            // alert("ok khodeshe");

            // use the selected option value to retrieve the list of items from the countryLists array
            // cList = countryLists[which];
            // // get the country select element via its known id
            // var cSelect = document.getElementById("country");
            // // remove the current options from the country select
            // var len = cSelect.options.length;
            // while (cSelect.options.length > 0) {
            //     cSelect.remove(0);
            // }
            // var newOption;
            // // create new options
            // for (var i = 0; i < cList.length; i++) {
            //     newOption = document.createElement("option");
            //     newOption.value = cList[i];  // assumes option string and value are the same
            //     newOption.text = cList[i];
            //     // add the new option
            //     try {
            //         cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
            //     } catch (e) {
            //         cSelect.appendChild(newOption);
            //     }
            // }
        }

        // function delete_related(personId , relatedId){
        //     alert(personId +'----'+ relatedId);
        // }


        $('#accountTypeNew').on('change', function () {

            alert($(this).find(":selected").val());
        });


    </script>


    @include('layouts.share.script')




@endsection



