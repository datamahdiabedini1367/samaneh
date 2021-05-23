@extends('layouts.master')
@include('layouts.share.common_inpute_form')


{{--@php--}}
{{--dd($type , $id, "runing form");--}}
{{--@endphp--}}
@section('content')

    <div class="row">
        <div class="card p-5">
            <div class="cord-body">
                <form action=
                      "{{route('gallery.item.store',[$itemType,$type])}}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">عنوان</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">آپلود</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>


                    <div class="form-group">
                        <input type="submit" value="ارسال" class="btn btn-sm btn-outline-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
    @include('errors')


{{--    @php--}}
{{--    dd($type->photos,'type======',$itemType,$type,$type->photos());--}}
{{--    @endphp--}}

    <div class="row">
        @foreach($type->photos as $picture)
            <div class="col-md-12 col-lg-3">
                <div class="card">
                    <h3>{{$picture->title}}</h3>
                    <img class="card-img-top img-responsive" width="200" height="200" src="{{str_replace('public','/storage',$picture->image_address)}}" alt="Card image cap">
                    <div class="card-body">
                        <form
                            action="{{route('items.photos.destroy',$picture)}}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-sm btn-danger">

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @endforeach
    </div>
@endsection
