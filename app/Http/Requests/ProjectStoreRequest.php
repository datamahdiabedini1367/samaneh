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
            'name' => ['required','unique:projects,name'],
            'description' => ['nullable','string'],
            "startDate" => ['date', 'nullable',],
            "endDate" => ['date', 'nullable', 'after:startDate',],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'نام پروژه اجباریست',
            'name.unique' => 'این نام پروژه تکراریست لطفا نام دیگری را برای پروژه وارد نمایید',
            'users.exists' => 'کاربر تخصیص داده شده اشتباه است',
            'companies.exists' => 'شرکت به درستی انتخاب نشده است',
            'persons.exists' => 'افراد به درستی انتخاب نشده است',
            'startDate.date_format' => "فرمت تاریخ باید به این شکل باشد. مثال :1400/01/01",
            'endDate.date_format' => "فرمت تاریخ باید به این شکل باشد. مثال :1400/01/01",
            'endDate.after' => 'تاریخ پایان پروژه باید بعد از تاریخ شروع پروژه باشد'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'startDate' => convert_date($this->startDate, 'gregorian')]);
        $this->merge([
            'endDate' => convert_date($this->endDate, 'gregorian')]);
    }


}
