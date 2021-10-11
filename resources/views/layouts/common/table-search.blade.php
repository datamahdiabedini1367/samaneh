
{{Form::open(['route' => [$route, $params] ,'method'=>"get",'id'=>"formSearch" ]) }}
<div class="row p-4">
    <div class="col-sm-3">

        {{Form::text('phrase',old('phrase'),['class'=>"form-control form-control-sm",'placeholder'=>"عبارت مورد جستجو را وارد کنید"])}}
        <div class="alert alert-danger font-size-0 p-0 m-0 hide" id="error_phrase">
            @error('phrase'){{ $message }}@enderror
        </div>
    </div>

    <div class="col-sm-3 styled-select">
        {{Form::select("field" , $fields, old('field'),['class'=>"form-control form-control-sm",'placeholder' => 'فیلد مورد جستجو را انتخاب کنید'] )}}
        <div class="alert alert-danger font-size-0 p-0 m-0 hide "
             id="error_field">@error('field'){{ $message }}  @enderror</div>
    </div>

    <div class="col-sm-3">
        {{Form::submit('جستجو',['class'=>"form-control form-control-sm ",'form'=>"formSearch"])}}
    </div>
</div>
{{Form::close()}}


