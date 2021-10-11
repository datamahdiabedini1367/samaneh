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

