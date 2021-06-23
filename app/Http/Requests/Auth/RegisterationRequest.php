<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

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
            'is_active' => ['boolean','nullable','integer'],
            'password' => ['required', 'confirmed', 'min:6', 'max:40'],
        ];
    }

}
