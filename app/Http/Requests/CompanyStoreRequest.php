<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'registration_date' => ['nullable', 'string'],
            'address' => ['nullable','string'],
            'registration_number' => ['nullable','string'],
            'description' => ['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام شرکت اجباریست',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'registration_date' => convert_date($this->registration_date, 'gregorian'),
        ]);
    }


}
