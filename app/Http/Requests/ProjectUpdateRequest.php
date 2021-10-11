<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['string', 'nullable'],
            "startDate" => ['date', 'nullable',],
            "endDate" => ['date', 'nullable', 'after:startDate'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام پروژه اجباریست',
            'name.unique' => 'نام پروژه تکراریست',
            'endDate.after' => 'تاریخ اتمام باید بعد از تاریخ شروع باشد.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'startDate' => convert_date($this->startDate, 'gregorian'),
        ]);
        $this->merge([
            'endDate' => convert_date($this->endDate, 'gregorian'),
        ]);
    }
}
