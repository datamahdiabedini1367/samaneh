<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhoneStoreRequest extends FormRequest
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
            'value'=>['required','unique:phones,value','numeric'],
//            'phoneType'=>['required',Rule::in(['company', 'persons']),],
//            'phoneId'=>['required','integer',]
        ];
    }
    public function messages()
    {
        return [
            'value.required'=>'شماره تماس وارد نشده است',
            'value.unique'=>'این شماره تماس قبلا ثبت شده است',
            'value.numeric'=>'فقط اعداد می توانند در این فیلد وارد شود'
        ];
    }
}
