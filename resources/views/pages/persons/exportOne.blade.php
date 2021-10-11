<table>
    <tr >
        <td colspan="4" style="font-weight: bolder;font-size: 20px;border: 1px solid black;"> مشخصات فردی</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->firstName}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام مستعار :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->nikeName}}</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام خانوادگی :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->lastName}}</td>

        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام پدر :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->fatherName}}</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام مادر :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->motherName}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">وضعیت تاهل :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->married_person}}</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ تولد :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->birthdate_person}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">مکان تولد :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->birthdatePlace}}</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">جنسیت :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->gender_person}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">کدملی :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->nationalCode}}</td>
    </tr>
    <tr>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">آدرس :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->address}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">بیوگرافی :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->bio}}</td>
    </tr>
    <tr>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">سرگرمی ها :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->entertainments}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">علایق شخصی :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->personalFavorites}}</td>
    </tr>
    <tr>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">گرایش سیاسی :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->politicalOrientation}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">زبانهای مورد استفاده :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->languageUse}}</td>

    </tr>
    <tr>
        <td colspan="4" style="font-weight: bolder;font-size: 20px;border: 1px solid black;"> اطلاعات تماس</td>
    </tr>

    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">شماره تماس :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">
            @php
                $str='';
                foreach($person->phones as $phone){
                    $str = $str.' - '.$phone->value;
                }
                echo ltrim($str," - ");
            @endphp
        </td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">ایمیل :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">
            @php
                $str='';
                foreach($person->emails as $email){
                    $str = $str.' - '.$email->value;
                }
                echo ltrim($str," - ");
            @endphp
        </td>
    </tr>

    <tr>
        <td colspan="4" style="font-weight: bolder;font-size: 20px;border: 1px solid black;">
            اطلاعات فضای مجازی
        </td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نوع حساب</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">مقدار حساب</th>
    </tr>
    @foreach($person->accounts as $account)
        <tr>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$account->accountType->title}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$account->value}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="6" style="font-weight: bolder;font-size: 20px;border: 1px solid black;">
            سوابق شغلی
        </td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام شرکت/موسسه</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ شروع به کار</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ اتمام کار</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">سمت</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">بخش</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">دلیل ترک کار</th>
    </tr>
    @foreach($person->companies as $company)

        <tr>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->name}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{convert_date($company->pivot->startDate,'jalali')}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{convert_date($company->pivot->endDate,'jalali')}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->pivot->semat}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->pivot->section}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->pivot->reasonLeavingJob}}</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="7" style="font-weight: bolder;font-size: 20px;border: 1px solid black;"> سوابق تحصیلی </td>
    </tr>
    @php
    $i=1;
    @endphp
    @foreach($person->educationals as $educational)
    <tr>

        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;"> ردیف: {{$i++}}</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام دانشگاه: {{$educational->universityName}}</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">مقطع تحصیلی: {{$educational->grade}}</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">رشته تحصیلی: {{$educational->major}}</th>
    </tr>
    <tr>
        <th style="border-bottom:1px solid black;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">معدل: {{$educational->average}}</th>
        <th style="border-bottom:1px solid black;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ شروع: {{$educational->start_date_educational}}</th>
        <th style="border-bottom:1px solid black;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ پایان: {{$educational->end_date_educational}}</th>
        <th style="border-bottom:1px solid black;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">ادرس دانشگاه: {{$educational->address}}</th>
    </tr>




    @endforeach
    <tr>
        <td colspan="13" style="font-weight: bolder;font-size: 20px;border: 1px solid black;">
            اطلاعات افراد مرتبط
        </td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نسبت</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام خانوادگی</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">وضعیت تاهل</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ تولد</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">مکان تولد</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">جنسیت</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">کدملی</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">آدرس</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">بیوگرافی</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">سرگرمی ها</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">علایق شخصی</th>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">گرایش سیاسی</th>
    </tr>
    @foreach($person->relatedPerson as $personRelated)
        <tr>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->getIndividualTitle($personRelated->pivot->individual_id)}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->firstName}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->lastName}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->married_person}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->birthdate_person}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->birthdatePlace}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->gender_person}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->nationalCode}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->address}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->bio}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->entertainments}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->personalFavorites}}</td>
            <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$personRelated->politicalOrientation}}</td>
        </tr>
    @endforeach
</table>

