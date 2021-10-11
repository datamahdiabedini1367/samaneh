<table >
    <tr>
        <td colspan="10"
            style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;font-weight: bold;">
            شرکت {{$company->name}}</td>
    </tr>
    <tr>
        <td colspan="1" style="width: 20px;font-weight: bold;">تاریخ تاسیس </td>
        <td colspan="1" style="width: 20px">{{$company->registration_date_company}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;">شماره ثبت </td>
        <td colspan="1" style="width: 20px">{{$company->registration_number}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;">تعدا کارمندان</td>
        <td colspan="1" style="width: 20px">
            {{$company->persons()->count()}}
        </td>
    </tr>
    <tr>
        <td colspan="1" style="width: 20px;font-weight: bold;height: 40px;text-align: right;vertical-align: top; word-wrap: break-word;">
            آدرس
        </td>
        <td colspan="4"
            style="height: 50px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->address}}</td>
        <td colspan="1" style="width: 20px;font-weight: bold;height: 40px;text-align: right;vertical-align: top; word-wrap: break-word;">
            توضیحات
        </td>
        <td colspan="4"
            style="height: 50px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$company->description}}</td>
    </tr>

    <tr>
        <td colspan="1" class="align-text-top"
            style="width: 20px;font-weight: bold;height: 40px;text-align: right;vertical-align: top; word-wrap: break-word;"> شماره تماس
        </td>
        <td colspan="4" class="align-text-top"
            style="height: 40px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
            @php
                $str='';
                foreach($company->phones as $phone){
                    $str = $str.' - '.$phone->value;
                }
                echo ltrim($str," - ");
            @endphp
        </td>
        <td colspan="1" class="align-text-top"
            style="width: 20px;font-weight: bold;height: 40px;text-align: right;vertical-align: top; word-wrap: break-word;"> ایمیل
        </td>
        <td colspan="4" class="align-text-top"
            style="height: 40px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
            @php
                $str='';
                foreach($company->emails as $email){
                    $str = $str.' - '.$email->value;
                }
                echo ltrim($str," - ");
            @endphp
        </td>
    </tr>
    <tr>
        <td colspan="10" style="width: 20px;font-weight: bold;" >اطلاعات فضای مجازی</td>
    </tr>
    <tr>
        <td colspan="10" class="align-text-top"
            style="height: 40px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">
            @php
                $str='';
                foreach($company->accounts as $account){
                    $str =$str.' - '.  $account->accountType->title.'='. $account->value    ;
                }
                echo ltrim($str," - ");
            @endphp
        </td>
    </tr>
    <tr>
        <td colspan="10" style="width: 20px;font-weight: bold;">اطلاعات کارمندان:</td>
    </tr>



@foreach($company->persons as $person)
        <tr>
            <td style="width: 20px;font-weight: bold;">کد</td>
            <td style="width: 20px;font-weight: bold;">نام</td>
            <td style="width: 20px;font-weight: bold;">نام مستعار 	</td>
            <td style="width: 20px;font-weight: bold;">نام خانوادگی</td>
            <td style="width: 20px;font-weight: bold;">نام پدر</td>
            <td style="width: 20px;font-weight: bold;">نام مادر</td>
            <td style="width: 20px;font-weight: bold;">وضعیت تاهل</td>
            <td style="width: 20px;font-weight: bold;">تاریخ تولد </td>
            <td style="width: 20px;font-weight: bold;">محل تولد </td>
        </tr>


        <tr>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->id}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->firstName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->nikeName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->lastName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->fatherName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->motherName}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->married_person}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->birthdate_person}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;">{{$person->birthdatePlace}}</td>
        </tr>
        <tr >
            <td style="width: 20px;font-weight: bold;">ادرس محل زندگی </td>
            <td style="width: 20px;font-weight: bold;">بیوگرافی</td>
            <td style="width: 20px;font-weight: bold;">سرگرمی ها</td>
            <td style="width: 20px;font-weight: bold;">علایق شخصی</td>
            <td style="width: 20px;font-weight: bold;">گرایش سیاسی</td>
            <td style="width: 20px;font-weight: bold;">زبان های مورد استفاده</td>
            <td style="width: 20px;font-weight: bold;">کد ملی</td>
            <td style="width: 20px;font-weight: bold;"> تاریخ شروع به کار</td>
            <td style="width: 20px;font-weight: bold;"> تاریخ اتمام همکاری</td>
            <td style="width: 20px;font-weight: bold;"> علت ترک شغل</td>
            <td style="width: 20px;font-weight: bold;"> سمت</td>
            <td style="width: 20px;font-weight: bold;"> بخش</td>
        </tr>



    <tr >
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->address}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->bio}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->entertainments}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->personalFavorites}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->politicalOrientation}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->languageUse}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->nationalCode}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{convert_date($person->pivot->startDate,'jalali')}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{convert_date($person->pivot->endDate,'jalali')}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->pivot->reasonLeavingJob}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->pivot->semat}}</td>
            <td style="height: 20px;text-align: right;vertical-align: top;width: 20px; word-wrap: break-word;border-bottom: 10px solid black;">{{$person->pivot->section}}</td>
        </tr>
    @endforeach
</table>
