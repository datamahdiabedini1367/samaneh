@extends('layouts.master.createFormMaster')

@section('icon')
    <i class="nav-icon fas fa-user-friends"></i>
@endsection

@section('page-title')
    ویرایش مشخصات افراد مرتبط با  {{$person->firstName}}&nbsp;&nbsp;{{$person->lastName}}
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

    {{Form::open(['route'=>['persons.related.update',[$person,$relatedPerson]],'id'=>"relatedForm" , 'method'=>'patch'])}}

    <div class="form-row related_type p-2">
        <div class="form-group col-md-4">
            {{Form::label('person_id','شخص:')}}
            {{Form::text('person_id',$relatedPerson->firstName.' '.$relatedPerson->lastName.'  فرزند ' .$relatedPerson->fatherName,['class'=>'form-control form-control-sm','readonly'=>'readonly'])}}
        </div>
        <div class="form-group col-md-4 styled-select">
            {{Form::label('individual_id','نسبت مورد نظر را انتخاب کنید:')}}
            {{Form::select('individual_id',$individuals,$personIndividualRelated->individual_id, ['class'=>"form-control input-lg select2",'id'=>"relatedType",'onchange'=>"selectRelated(this)" ,'click'=>"selectRelated(this)"]) }}
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
            {{Form::textarea('description',$personIndividualRelated->description,['class'=>"form-control",'placeholder'=>"توضیحات مد نظر را وارد کنید",'rows'=>'1'])}}
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 p-3">
            {{Form::submit("ثبت اطلاعات",['class'=>"btn btn-primary float-left submit_button", 'id'=>"register_account"])}}
        </div>
    </div>

    {{Form::close()}}


@endsection
