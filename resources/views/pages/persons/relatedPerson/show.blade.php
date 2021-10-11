@extends('layouts.master.createFormMaster')


@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('page-title')
    مشخصات افراد مرتبط با {{$person->firstName}}&nbsp;&nbsp;{{$person->lastName}}
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left ">بازگشت به لیست افراد</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','list_relatedPersonExport')->first())
        <a href="{{route('persons.exportPersonRelated',[$person])}}"
           class="btn btn-sm btn-success float-left mx-2">
            <i class="fa fa-download"></i>
            خروجی EXCEL
        </a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','create_savabegh_jobs')->first())
        <a href="{{route('persons.related.create',[$person])}}"
           class="btn btn-sm btn-warning float-left ">
            افزودن فرد مرتبط جدید
        </a>
    @endcan
@endsection


@section('create_form')

    <div class="row">
        <div class="col-sm-12 p-3">

            <table class="table table-hover table-bordered ">
                <thead>
                <tr>
                    <th>نسبت</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نام پدر</th>
                    <th>تاریخ تولد</th>
                    <th>استان</th>
                    <th>کد ملی</th>
                    <th>توضیحات</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>

                @foreach($person->relatedPerson as $PersonRelated)
                    <tr>
                        @php
                            $individualAdd = $PersonRelated->pivot->individual_id;
                        @endphp
                        <td>
                            {{$individuals[$individualAdd-1]['title']}}
                        </td>

                        <td>{{$PersonRelated->firstName}}</td>
                        <td>{{$PersonRelated->lastName}}</td>
                        <td>{{$PersonRelated->fatherName}}</td>
                        <td>{{$PersonRelated->birthdate_person}}</td>
                        <td>{{$PersonRelated->birthdatePlace}}</td>
                        <td>{{$PersonRelated->nationalCode}}</td>
                        <td>
                            {{$PersonRelated->pivot->description}}
                        </td>
                        <td>
                            {{Form::open(['route'=>['persons.related.edit',[$person->id,$PersonRelated->id]],'method'=>'get'])}}
                            {{Form::button('',['class'=>"btn btn-warning btn-ico btn-ico-tc-black btn-edit",'type'=>'submit'])}}
                            {{Form::close()}}
                        </td>
                        <td>
                            {{Form::button('',['class'=>'btn btn-danger btn-ico btn-ico-tc-black btn-delete',
                                     'data-toggle'=>"modal", 'data-target'=>"#removeItem",
                                     'onclick'=>'deleteItem("'. route('persons.related.delete',[$person->id,$PersonRelated->id]).'")'])}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

@section('scriptsExtra')
    <script>
        function selectRelated(selectObj) {
            // get the index of the selected option
            var idx = selectObj.selectedIndex;
            var which = selectObj.options[idx].value;
            var text = selectObj.options[idx].text;
            var divRelated_type = $('.related_type');
            if (text == "سایر") {
                divRelated_type.append(
                    `<div class="col-sm-4" id="related_title">
                    <input type="text" class="form-control input-sm" id="title" required="required" form="relatedForm" name="title" placeholder="نسبت مورد نظر را تایپ کنید">
                    </div>
                    <div class="col-sm-2 text-danger text-bold" id="error_grade">
                    @error('grade')
                    {{$message}}
                    @enderror
                    </div>`
                )
            } else {
                var accounttypetitle = $('#related_title');
                accounttypetitle.remove();
            }
        }

        $('#accountTypeNew').on('change', function () {
            alert($(this).find(":selected").val());
        });

        $('#relatedForm').validate(
            {
                rules: {"title": {required: true, minlength: 3}},
                messages: {
                    "title": {
                        required: "عنوان نسبت اجباریست",
                        minlength: jQuery.validator.format("حداقل طول  عنوان نسبت  باید بیشتر از {0} حرف باشد")
                    },
                },
                errorPlacement: function (error, element) {
                    var n = element.attr("name");
                    $("#error_" + n).addClass("text-bold");
                    error.appendTo("#error_" + n);
                },
            }
        );
    </script>
@endsection















