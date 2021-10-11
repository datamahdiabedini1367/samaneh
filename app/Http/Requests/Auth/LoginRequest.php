<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=>['required','exists:users,username'],
            'password'=>['required'],
        ];
    }

    public function messages()
    {
       return [
           'username.required'=>'نام کاربری اجباریست',
           'username.exists'=>'چنین کاربری در سیستم وجود ندارد',
           'password.required'=>'رمز عبور اجباریست',
       ];
    }
}
