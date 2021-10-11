<table>
    <thead>
    <tr>
        <th style="width:10px ">کد شرکت</th>
        <th style="width:25px ">نام شرکت</th>
        <th style="width:30px ">شماره ثبت</th>
        <th style="width: 20px">تاریخ ثبت</th>
        <th style="width: 50px">آدرس</th>
        <th style="width: 60px">توضیحات</th>
        <th style="width: 40px">شماره تماس</th>
        <th style="width: 40px">ایمیل ها</th>
        <th style="width: 40px">اطلاعات فضای مجازی</th>
    </tr>
    </thead>
    <tbody>

    @foreach($companies as $company)
        <tr>
            <td >{{ $company->id}}</td>
            <td >{{ $company->name }}</td>
            <td >{{ $company->registration_number }}</td>
            <td >{{ $company->registration_date_company }}</td>
            <td >{{ $company->address }}</td>
            <td >{{ $company->description }}</td>
            <td >
                @php
                    $str='';
                    foreach($company->phones as $phone){
                        $str = $str.' - '.$phone->value;
                    }
                    echo ltrim($str," - ");
                @endphp

            </td>
            <td>
                @php
                    $str='';
                    foreach($company->emails as $email){
                        $str = $str.' - '.$email->value;
                    }
                    echo ltrim($str," - ");
                @endphp
            </td>

            <td>
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
    </tbody>
</table>
