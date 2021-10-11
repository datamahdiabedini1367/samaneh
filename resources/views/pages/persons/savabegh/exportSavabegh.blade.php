<table>
    <tr>
        <td colspan="6" style="font-weight: bolder;font-size: 20px;border: 1px solid black;"> مشخصات فردی</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->firstName}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام مستعار :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->nikeName}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام خانوادگی :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->lastName}}</td>

    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام پدر :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->fatherName}}</td>
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
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">جنسیت :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->gender_person}}</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">کدملی :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->nationalCode}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">آدرس :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->address}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">بیوگرافی :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->bio}}</td>
    </tr>
    <tr>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">سرگرمی ها :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->entertainments}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">علایق شخصی :
        </th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->personalFavorites}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">گرایش سیاسی :
        </th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->politicalOrientation}}</td>
    </tr>
    <tr>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">زبانهای مورد
            استفاده :
        </th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->languageUse}}</td>
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
            <td style="width:15px;word-wrap: break-word;vertical-align: top;">
                @if(!empty($company->pivot->startDate))
                    {{convert_date($company->pivot->startDate,'jalali')}}
                @else
                    -
                @endif
            </td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;">
                @if(!empty($company->pivot->endDate))
                    {{convert_date($company->pivot->endDate,'jalali')}}
                @else
                    -
                @endif
            </td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->pivot->semat}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->pivot->section}}</td>
            <td style="width:15px;word-wrap: break-word;vertical-align: top;"> {{$company->pivot->reasonLeavingJob}}</td>
        </tr>
    @endforeach
</table>

