@extends('layouts.master.adminMaster')


@section('page-title')
    گالری تصاویر
@endsection

@section('content')

    <div class="row">
        <div class="card p-5">
            <div class="cord-body">
                {{Form::open(['route'=>['gallery.item.store',[$itemType,$type]], 'files' => true ,'id'=>'saveGallery'])}}
                    <div class="form-group">
                        {{Form::label('title' , 'عنوان')}}
                        {{Form::text("title",'',['class'=>"form-control"])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('image' , 'آپلود')}}
                        {{Form::file("image",['class'=>"form-control"])}}
                    </div>
                    <div class="col-sm-12 text-danger text-bold" id="error_image">
                        @error('image')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="form-group">
                        {{Form::submit('ارسال',['class'=>"btn btn-sm text-white",'id'=>'submit_button'])}}
                    </div>

                {{Form::close()}}
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($type->photos as $picture)
            <div class="col-md-12 col-lg-3">
                <div class="card">

                    <h3>{{$picture->title}}</h3>
                    <div class="align-content-center">
                    <img class="card-img img-responsive img-size-64
                     w-50"   src="{{str_replace('public','/storage',$picture->image_address)}}" alt="{{$picture->title}}">
                    </div>
                    <div class="card-body">
                        {{Form::button('',['class'=>"btn btn-danger btn-ico btn-ico-tc-black btn-delete",'data-toggle'=>"modal" ,  'data-target'=>"#removeItem",
                                'onclick'=>'deleteItem("'.route('items.photos.destroy',[$picture]).'")'])}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('scriptsExtra')
    <script src="/js/additional.js"></script>
    <script src="/js/extension.js"></script>
    <script>
        $('#saveGallery').validate(
            {
                rules: {
                    image: {
                        required: true,
                        extension: "png|jpg|jpeg|bmp|tif",
                    },
                },
                messages: {
                    image: {
                        required: "تصویر انتخاب نشده است.",
                        extension: "فایل شما باید از نوع (png,jpg,jpeg,bmp,tif) باشد.",
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
