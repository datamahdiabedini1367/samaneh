<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'title'=>['required','unique:roles,title'],
            'permissions'=>['array'],
            'permissions.*'=>['exists:permissions,id']
        ];
    }
    public function messages()
    {
        return [

            'title.unique'=>"این عنوان قبلا در سیستم ثبت شده است عنوان دیگری برای نقش انتخاب کنید",
            'title.required'=>"عنوان نقش وارد نشده است",
            'permissions.*.exists'=>"سطح دسترسی اشتباه وارد شده است",
        ];
    }
}
