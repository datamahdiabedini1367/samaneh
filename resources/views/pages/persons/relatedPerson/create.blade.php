@extends('layouts.master.createFormMaster')



@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection


@section('page-title')
    ثبت مشخصات افراد مرتبط با  {{$person->firstName}}&nbsp;&nbsp;{{$person->lastName}}
@endsection

@section('button-page')
    @can('isAccess',\App\Models\Permission::query()->where('title','list_persons')->first())
        <a href="{{route('persons.index')}}" class="btn btn-sm btn-danger float-left">بازگشت به لیست افراد</a>
    @endcan

    @can('isAccess',\App\Models\Permission::query()->where('title','create_savabegh_jobs')->first())
        <a href="{{route('persons.related.show',$person)}}"
           class="btn btn-sm btn-warning float-left mx-2">
            بازگشت به افراد مرتبط به فرد
            {{$person->firstName}}&nbsp;&nbsp;{{$person->lastName}}
        </a>
    @endcan
@endsection


@section('create_form')

    {{Form::open(['route'=>['persons.related.store',$person],'id'=>"relatedForm"])}}

    <div class="form-row related_type p-2">
        <div class="form-group col-md-4 styled-select">
            {{Form::label('person_id','فرد مورد نظر را انتخاب کنید:')}}
            {{Form::select('person_id',$otherPerson ,old('person_id'),['class'=>'form-control select2'])}}
            <small id="emailHelp" class="form-text text-muted">در صورتی که فرد مورد نظر را در لیست پیدا نکردید ابتدا فرد
                مورد نظر را ثبت کنید برای ثبت فرد <a href="{{route('persons.create')}}">کلیک</a> کنید </small>
        </div>
        <div class="form-group col-md-4 styled-select">

            {{Form::label('individual_id','نسبت مورد نظر را انتخاب کنید:')}}
            {{Form::select('individual_id',$individuals+['999'=>'سایر'],old('individual_id'),
                ['class'=>"form-control input-lg select2",'id'=>"relatedType",'onchange'=>"selectRelated(this)" ,'click'=>"selectRelated(this)"]) }}
            <small id="emailHelp" class="form-text text-muted">
                در صورتی که نسبت مورد نظر شما در گزینه ها نبود می توانید
                با انتخاب گزینه سایر نسبت مورد نظر را وارد کنید
            </small>
        </div>
    </div>

    <div class="form-row  ">
        <div class="form-group text-danger text-bold col-md-4" id="error_person_id">
            @error('person_id')
            {{$message}}
            @enderror
        </div>
        <div class="form-group text-danger text-bold col-md-4" id="error_individual_id">
            @error('individual_id')
            {{$message}}
            @enderror
        </div>
        <div class="form-group text-danger text-bold col-md-4" id="error_title">
            @error('title')
            {{$message}}
            @enderror
        </div>
    </div>

    <div class="form-row p-2">
        <div class="form-group col-md-12">
            {{Form::label('description','توضیحات :',['class'=>"form-group col-sm-2"])}}
            {{Form::textarea('description',old('description'),['class'=>"form-control",'placeholder'=>"توضیحات مد نظر را وارد کنید",'rows'=>'1'])}}
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 p-3">
            {{Form::submit("ثبت اطلاعات",['class'=>"btn btn-primary float-left submit_button", 'id'=>"register_account"])}}
        </div>
    </div>

    {{Form::close()}}


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
                    `<div class="form-group col-md-4" id="related_title">
                    {{Form::label('title','عنوان نسبت مورد نظر را وارد کنید:')}}
                    {{Form::text('title',old('title'),['class'=>"form-control input-sm", 'required'=>"required" , 'form'=>"relatedForm", 'placeholder'=>"نسبت مورد نظر را تایپ کنید"])}}
                    </div>`
                )
            } else {
                var accounttypetitle = $('#related_title');
                accounttypetitle.remove();
            }
        }

        $('#relatedForm').validate(
            {
                rules: {

                    "title": {required: true, minlength: 3},
                },
                messages: {
                    "title": {
                        required: "عنوان نسبت اجباریست",
                        minlength: jQuery.validator.format("حداقل طول  عنوان نسبت  باید بیشتر از {0} حرف باشد"),
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
