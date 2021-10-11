<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmailStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value'=>['required','unique:emails,value','email'],
//            'emailType'=>['required',Rule::in(['company', 'persons']),],
//            'emailId'=>['required','integer',]
        ];
    }
    public function messages()
    {
        return [
            'value.required'=>'ایمیل وارد نشده است',
            'value.unique'=>'این ایمیل قبلا ثبت شده است',
            'value.email'=>'فرمت ایمیل رعایت نشده است',
//            'emailId.required'=>'کد شرکت یا شخص وارد نشده است',
//            'emailId.integer'=>'کد شرکت یا شخص باید از نوع عددی باشد',
//            'emailType.required'=>'نوع ایمیل وارد نشده است  شرکت/فرد',
        ];
    }
}
