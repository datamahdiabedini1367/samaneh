<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required'],
            'startDate' => ['nullable',],
            'endDate' => ['nullable',],
            'description' => ['nullable'],
//            'users' => ['exists:users,id'],
//            'companies' => ['exists:companies,id'],
//            'persons' => ['exists:people,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام پروژه اجباریست',
            'users.exists' => 'کاربر تخصیص داده شده اشتباه است',
            'companies.exists' => 'شرکت به درستی انتخاب نشده است',
            'persons.exists' => 'افراد به درستی انتخاب نشده است',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
//            'startDate' => convert_date($this->startDate,'gregorian'),
//            'endDate' => convert_date($this->endDate,'gregorian'),
        ]);
    }
}
