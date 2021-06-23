@extends('layouts.master')
@include('layouts.share.common_inpute_form')



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>لیست شرکت ها</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">خانه</a></li>
                        <li class="breadcrumb-item active"> لیست شرکت ها</li>
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
                                <h3 class="card-title">شرکت </h3>
                            </div>

                            <div class="col-sm-6">
                                @can('isAccess',\App\Models\Permission::query()->where('title','create_company')->first())
                                    <a href="{{route('companies.create')}}" class="btn btn-sm btn-primary"> ایجاد شرکت
                                        جدید</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped dataTable1 w-100">
                            <thead>
                            <tr>
                                {{--                                'name', 'registration_date', 'email', 'address', 'registration_number'--}}
                                <th>نام شرکت</th>
                                <th>تاریخ تاسیس</th>
                                <th>شماره ثبت</th>
                                @can('isAccess',\App\Models\Permission::query()->whereIn('title',['create_company','edit_company','delete_company','show_company','list_gallery_companies','list_syberspace_companies'])
                                                                                ->first())
                                    <th>عملیات</th>
                                @endcan
                                @can('isAccess',\App\Models\Permission::query()->whereIn('title',['list_persons_companies','create_person_company','delete_person_company'])->first())
                                    <th>پرسنل</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->registration_date}}</td>
                                    <td>{{$company->registration_number}}</td>

                                    @can('isAccess',\App\Models\Permission::query()->whereIn('title',['create_company','edit_company','delete_company','show_company','list_gallery_companies','list_syberspace_companies'])
                                                                               ->first())
                                        <td>
                                            @can('isAccess',\App\Models\Permission::query()->where('title','edit_company')->first())
                                                <a href="{{route('companies.edit',$company)}}"
                                                   class="btn btn-sm btn-success w-100">ویرایش</a>
                                            @endcan

                                            @can('isAccess',\App\Models\Permission::query()->where('title','show_company')->first())

                                                <a href="{{route('companies.show',$company)}}"
                                                   class="btn btn-sm btn-primary w-100">نمایش</a>
                                            @endcan

                                            @can('isAccess',\App\Models\Permission::query()->where('title','delete_company')->first())
                                                <form action="{{route('companies.destroy',$company)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-sm btn-danger w-100"
                                                           value="حذف">
                                                </form>
                                            @endcan

                                            @can('isAccess',\App\Models\Permission::query()->where('title','list_gallery_companies')->first())

                                                <a href="{{route('items.photos.index',['company',$company])}}"
                                                   class="btn btn-sm btn-primary w-100">گالری تصاویر شرکت</a>
                                            @endcan

                                            @can('isAccess',\App\Models\Permission::query()->where('title','list_syberspace_companies')->first())

                                                <a href="{{route('syberspace.create',['company',$company])}}"
                                                   class="btn btn-sm btn-info w-100">ثبت اطلاعات فضای مجازی</a>
                                            @endcan


                                        </td>
                                    @endcan

                                    @can('isAccess',\App\Models\Permission::query()->whereIn('title',['list_persons_companies','create_person_company','delete_person_company'])->first())
                                        <td>
                                            @can('isAccess',\App\Models\Permission::query()->where('title','list_persons_companies')->first())
                                                <a href="{{route('companies.persons.index',$company)}}"
                                                   class="btn btn-sm btn-success w-100">مشاهده پرسنل</a>
                                            @endcan

                                            @can('isAccess',\App\Models\Permission::query()->where('title','create_person_company')->first())
                                                <a href="{{route('companies.persons.create',$company)}}"
                                                   class="btn btn-sm btn-primary w-100">افزودن پرسنل جدید</a>
                                            @endcan

                                            @can('isAccess',\App\Models\Permission::query()->where('title','delete_person_company')->first())
                                                <a href="{{route('companies.persons.destroyForm',$company)}}"
                                                   class="btn btn-sm btn-danger w-100">حذف پرسنل </a>
                                            @endcan
                                        </td>
                                    @endcan


                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>نام شرکت</th>
                                <th>تاریخ تاسیس</th>
                                <th>شماره ثبت</th>
                                @can('isAccess',\App\Models\Permission::query()->whereIn('title',['create_company','edit_company','delete_company','show_company','list_gallery_companies','list_syberspace_companies'])
                                                                         ->first())
                                    <th>عملیات</th>
                                @endcan
                                @can('isAccess',\App\Models\Permission::query()->whereIn('title',['list_persons_companies','create_person_company','delete_person_company'])->first())
                                    <th>پرسنل</th>
                                @endcan

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


