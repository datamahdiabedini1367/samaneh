<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Routing\Route;

class RegisterationRequest extends FormRequest
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
            'role_id'=>['required','exists:roles,id'],
            'username' => ['required', 'unique:users,username'],
            'is_active' => ['integer','nullable'],
            'password' => ['required', 'confirmed', 'min:6', 'max:40'],
            'password_confirmation'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'role_id.required'=>'انتخاب نقش سیستمی برای کاربر الزامی است',
            'role_id.exists'=>'نقش مورد نظر اشتباه انتخاب شده است',
            'username.required'=>'نام کاربری اجباریست',
            'username.unique'=>'این نام کاربری قبلا در سیستم ثبت شده است',
            'password.required'=>'رمز عبور اجباریست',
            'password_confirmation.required'=>'تکرار رمز عبور اجباریست',
            'password.confirmed'=>'رمز عبور با تکرار آن اشتباه وارد شده است.',
            'password.min'=>'حداقل رمز عبور باید :min  کاراکتر باشد',
            'password.max'=>'حداکثر تعداد کاراکتر برای رمز عبور باید :max کاراکتر باشد',
        ];
    }


}
