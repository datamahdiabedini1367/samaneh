<table>
    <tr >
        <td colspan="8" style="font-weight: bolder;font-size: 20px;border: 1px solid black;"> مشخصات فردی</td>
    </tr>
    <tr>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->firstName}}</td>
        <th style="width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام مستعار :</th>
        <td style="width:15px;word-wrap: break-word;vertical-align: top;">{{$person->nikeName}}</td>
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
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">گرایش سیاسی :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->politicalOrientation}}</td>
        <th style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">زبانهای مورد استفاده :</th>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;">{{$person->languageUse}}</td>

    </tr>
    <tr>
        <td style="height:50px;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;"> شماره تماس</td>
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
        <td colspan="8" style="font-weight: bolder;font-size: 20px;border: 1px solid black;"> سوابق تحصیلی </td>
    </tr>
    <tr>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">  ردیف</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">نام دانشگاه</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">مقطع تحصیلی</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">رشته تحصیلی</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">معدل</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ شروع</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">تاریخ پایان</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;font-weight: bold;">ادرس دانشگاه</th>
    </tr>
    @php
    $i=1;
    @endphp
    @foreach($person->educationals as $educational)
    <tr>

        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">  {{$i++}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->universityName}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->grade}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->major}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->average}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->start_date_educational}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->end_date_educational}}</th>
        <th style="border-bottom:1px solid green;width:15px;word-wrap: break-word;vertical-align: top;">{{$educational->address}}</th>
    </tr>

    @endforeach
</table>

