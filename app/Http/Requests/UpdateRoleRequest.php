<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'=>['required'],
            'permissions'=>['array'],
            'permissions.*'=>['exists:permissions,id']
            //
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>"عنوان نقش وارد نشده است",
            'permissions.*.exists'=>"سطح دسترسی اشتباه وارد شده است",
        ];
    }
}
