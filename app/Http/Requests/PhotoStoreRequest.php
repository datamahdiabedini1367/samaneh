<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoStoreRequest extends FormRequest
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
            'image' => ['required', 'mimes:png,jpg,jpeg,bmp,tif'],
            'title' => ['string', 'nullable'],
        ];
    }
    public function messages()
    {
        return [
            'image.required' =>'تصویر انتخاب نشده است.',
            'image.mimes' =>'فرمت تصویر باید شامل :values  باشد.',

        ];
    }
}
