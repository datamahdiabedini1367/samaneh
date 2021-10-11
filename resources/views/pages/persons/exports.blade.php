<table>
    <thead>
    <tr>
        <th style="width:25px ">کد</th>
        <th style="width:25px ">نام</th>
        <th style="width:30px ">نام خانوادگی</th>
        <th style="width:30px ">نام مستعار</th>
        <th style="width:30px ">نام پدر</th>
        <th style="width:30px ">نام مادر</th>
        <th style="width:30px ">وضعیت تاهل</th>
        <th style="width:30px ">تاریخ تولد</th>
        <th style="width:30px ">محل تولد</th>
        <th style="width:30px ">جنسیت</th>
        <th style="width:30px ">کد ملی</th>
        <th style="width:30px ">آدرس</th>
        <th style="width:30px ">بیوگرافی</th>
        <th style="width:30px ">سرگرمی ها</th>
        <th style="width:30px ">علایق شخصی</th>
        <th style="width:30px ">گرایش سیاسی</th>
        <th style="width:30px ">زبان مورد استفاده</th>
        <th style="width:30px ">تلفن</th>
        <th style="width:30px ">ایمیل</th>
        <th style="width:30px ">اطلاعات فضای مجازی</th>
    </tr>
    </thead>
    <tbody>
    @foreach($persons as $person)
        <tr>
            <td>{{ $person->id}}</td>
            <td>{{$person->firstName}}</td>
            <td>{{$person->lastName}}</td>
            <td>{{$person->nikeName}}</td>
            <td>{{$person->fatherName}}</td>
            <td>{{$person->motherName}}</td>
            <td>{{$person->married_person}}</td>
            <td>{{$person->birthdate_person}}</td>
            <td>{{$person->birthdatePlace}}</td>
            <td>{{$person->gender_person}}</td>
            <td>{{$person->nationalCode}}</td>
            <td>{{$person->address}}</td>
            <td>{{$person->bio}}</td>
            <td>{{$person->entertainments}}</td>
            <td>{{$person->personalFavorites}}</td>
            <td>{{$person->politicalOrientation}}</td>
            <td>{{$person->languageUse}}</td>
            <td>
                @php
                    $str='';
                    foreach($person->phones as $phone){
                        $str = $str.' - '.$phone->value;
                    }
                    echo ltrim($str," - ");
                @endphp

            </td>
            <td>
                @php
                    $str='';
                    foreach($person->emails as $email){
                        $str = $str.' - '.$email->value;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>
            <td>
                @php
                    $str='';
                    foreach($person->accounts as $account){
                        $str =$str.' - '.  $account->accountType->title.'='. $account->value    ;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
