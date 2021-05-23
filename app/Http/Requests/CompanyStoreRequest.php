<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }





    public function rules()
    {
        return [
            'name'=>['required'],
            'registration_date'=>['nullable','string'],
            'emails'=>['array'],
            'emails.*'=>['unique:emails,value'],
            'phones'=>['array'],
            'phones.*'=>['unique:phones,value'],
            'address'=>['nullable'],
            'registration_number'=>['nullable'],
            'description'=>['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'emails.*.unique'=>'ثبت ایمیل تکراری در سامانه',
            'phones.*.unique'=>'ثبت شماره تماس تکراری در سامانه',
        ];
    }

}
