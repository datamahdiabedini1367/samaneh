<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required'],
            'registration_date'=>['string','nullable'],
//            'email'=>['email'],
            'emails'=>['array'],
//            'emails.*.value'=>['email','unique:emails,value'],
            'phones'=>['array'],
//            'phones.*.value'=>['email','unique:phones,value'],
            'address'=>['string','nullable'],
            'registration_number'=>['string','nullable'],
            'description'=>['string','nullable'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'نام شرکت اجباریست',
//           'emails.*.value.email'=>"این ایمیل قبلا در سامانه ثبت شده است",
        ];
    }

    protected function prepareForValidation()
    {
            $this->merge([
                'registration_date' => convert_date($this->registration_date, 'gregorian'),
            ]);
    }
}
