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
            'emailType'=>['required',Rule::in(['company', 'person']),],
            'emailId'=>['required','integer',]
        ];
    }
    public function messages()
    {
        return [
            'value.required'=>'ایمیل وارد نشده است',
            'value.unique'=>'این ایمیل قبلا ثبت شده است',
        ];
    }
}
