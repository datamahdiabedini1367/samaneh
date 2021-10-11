<table>
    <tr>
        <td colspan="10"
            style="height: 30px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;font-weight: bolder;font-size: 24px">
            پروژه {{$project->name}}</td>
    </tr>
    <tr>
        <td colspan="1" style="width: 20px;font-weight: bold;">توضیحات</td>
        <td colspan="1" style="width: 20px">{{$project->description}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;">تاریخ شروع پروژه</td>
        <td colspan="1" style="width: 20px">{{$project->start_date_project}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;">تاریخ پایان پروژه</td>
        <td colspan="1" style="width: 20px">{{$project->end_date_project}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;">تعداد کاربران تخصیص داده شده</td>
        <td colspan="1" style="width: 20px">{{$project->users()->count()}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;">تعداد شرکتهای مرتبط</td>
        <td colspan="1" style="width: 20px"> {{$project->companies()->count()}} </td>
        <td colspan="1" style="width: 20px;font-weight: bold;">تعداد افراد مرتبط</td>
        <td colspan="1" style="width: 20px"> {{$project->persons()->count()}} </td>
    </tr>

    <tr>
        <td colspan="10" style="height:30px;width: 20px;font-weight: bolder;font-size: 24px">لیست افراد:</td>
    </tr>


    @foreach($project->persons as $person)
        <tr>
            <td style="width: 20px;font-weight: bold;">کد</td>
            <td style="width: 20px;font-weight: bold;">نام</td>
            <td style="width: 20px;font-weight: bold;">نام مستعار</td>
            <td style="width: 20px;font-weight: bold;">نام خانوادگی</td>
            <td style="width: 20px;font-weight: bold;">نام پدر</td>
            <td style="width: 20px;font-weight: bold;">نام مادر</td>
            <td style="width: 20px;font-weight: bold;">وضعیت تاهل</td>
            <td style="width: 20px;font-weight: bold;">تاریخ تولد</td>
            <td style="width: 20px;font-weight: bold;">محل تولد</td>
            <td style="width: 20px;font-weight: bold;">شماره تماس</td>
            <td style="width: 20px;font-weight: bold;">ایمیل ها</td>
            <td style="width: 20px;font-weight: bold;">اطلاعات حساب ها</td>

        </tr>
        <tr>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->id}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->firstName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->nikeName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->lastName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->fatherName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->motherName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->married_person}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->birthdate}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->birthdatePlace}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
                @php
                    $str='';
                    foreach($person->phones as $phone){
                        $str = $str.' - '.$phone->value;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>
            <td style="height: 50px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
                @php
                    $str='';
                    foreach($person->emails as $email){
                        $str = $str.' - '.$email->value;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
                @php
                    $str='';
                    foreach($person->accounts as $account){
                        $str =$str.' - '.  $account->accountType->title.'='. $account->value    ;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>


        </tr>
        <tr>
            <td style="width: 20px;font-weight: bold;">ادرس محل زندگی</td>
            <td style="width: 20px;font-weight: bold;">بیوگرافی</td>
            <td style="width: 20px;font-weight: bold;">سرگرمی ها</td>
            <td style="width: 20px;font-weight: bold;">علایق شخصی</td>
            <td style="width: 20px;font-weight: bold;">گرایش سیاسی</td>
            <td style="width: 20px;font-weight: bold;">زبان های مورد استفاده</td>
            <td style="width: 20px;font-weight: bold;">کد ملی</td>
            <td style="width: 20px;font-weight: bold;">شرکت های کار کرده</td>
        </tr>



        <tr>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->address}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->bio}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->entertainments}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->personalFavorites}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->politicalOrientation}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->languageUse}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->nationalCode}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">
                @php
                    $str='';
                    foreach($person->companies as $company){
                        $str = $str.' - '.$company->name;
                    }
                    echo ltrim($str," - ");

                @endphp

            </td>
        </tr>
    @endforeach


    <tr>
        <td colspan="10" style="height:30px;width: 20px;font-weight: bolder;font-size: 24px">لیست شرکت ها:</td>
    </tr>

    <tr>
        <td style="width: 20px;font-weight: bold;">کد</td>
        <td style="width: 20px;font-weight: bold;">نام شرکت</td>
        <td style="width: 20px;font-weight: bold;">شماره ثبت</td>
        <td style="width: 20px;font-weight: bold;">تاریخ ثبت</td>
        <td style="width: 20px;font-weight: bold;">آدرس</td>
        <td style="width: 20px;font-weight: bold;">توضیحات</td>
        <td style="width: 20px;font-weight: bold;">شماره تماس</td>
        <td style="width: 20px;font-weight: bold;">ایمیل</td>
        <td style="width: 20px;font-weight: bold;">اطلاعات حساب کاربری</td>
    </tr>
    @foreach($project->companies as $company)

        <tr>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->id}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->name}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->registration_number}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->registration_date}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->address}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->description}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
                @php
                    $str='';
                    foreach($company->phones as $phone){
                        $str = $str.' - '.$phone->value;
                    }
                    echo ltrim($str," - ");

                @endphp
            </td>
            <td style="height: 50px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
                @php
                    $str='';
                    foreach($company->emails as $email){
                        $str = $str.' - '.$email->value;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>
            <td style="height: 50px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
                @php
                    $str='';
                    foreach($company->accounts as $account){
                        $str =$str.' - '.  $account->accountType->title.'='. $account->value    ;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>
        </tr>
    @endforeach


    <tr>
        <td colspan="10" style="height:30px;width: 20px;font-weight: bolder;font-size: 24px">لیست کاربر ها:</td>
    </tr>

    <tr>
        <td style="width: 20px;font-weight: bold;">کد</td>
        <td style="width: 20px;font-weight: bold;">نام کاربری</td>
    </tr>
    @foreach($project->users as $user)

        <tr>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$user->id}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$user->username}}</td>
        </tr>
    @endforeach

</table>







