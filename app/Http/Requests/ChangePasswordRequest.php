<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'username' => ['required', 'exists:users,username'],
            'password' => ['required', 'confirmed'],
            'password-old' => ['required'],
            'password_confirmation'=>['required'],
        ];
    }

    public function messages()
    {
        return [

            'username.exists' => 'چنین نام کاربری در سیستم یافت نشد',
            'password.confirmed' => 'تکرار پسورد اشتباه وارد شده است',
            'username.required' => 'نام کاربری وارد نشده است',
            'password.required' => 'پسورد جدید وارد نشده است',
            'password-old.required' => 'پسورد قبلی وارد نشده است',
            'password_confirmation.required' => 'تکرار پسورد جدید وارد نشده است',

        ];
    }
}
