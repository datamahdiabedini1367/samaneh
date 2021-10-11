<div class="col-sm-12">
    <div class="card ">
        <div class="card-body pt-5">
            <table class="table table-bordered table-striped  w-100">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نام پدر</th>
                    <th>تاریخ تولد</th>
                    <th>محل تولد</th>
                    <th>جنسیت</th>
                    <th>وضعیت تاهل</th>
                    <th>کد ملی</th>
                    <th>انتخاب</th>

                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    @if(!$company->hasPerson($person))
                        <tr>
                            <td>{{$person->firstName}}</td>
                            <td>{{$person->lastName}}</td>
                            <td>{{$person->fatherName}}</td>
                            <td>{{$person->birthdate_person}}</td>
                            <td>{{$person->birthdatePlace}}</td>
                            <td>{{$person->gender_person}}</td>
                            <td>{{$person->married_person}}</td>
                            <td>{{$person->nationalCode}}</td>
                            <td class="text-center">
                                <input type="radio" name="person_id" id="submit_button"
                                       value="{{$person->id}}" class="form-group" form="companyPersonAdd">
                            </td>

                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $persons->onEachSide(1)->appends(request()->query())->links('pages.vendor.pagination.bootstrap-4')  }}
    <div class="text-danger @error('person_id') text-bold @enderror " id="error_person_id">
        @error('person_id')
        {{$message}}
        @enderror
    </div>
</div>


