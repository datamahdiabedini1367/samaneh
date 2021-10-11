<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCompanyAssign extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'companies'=>['array'],
            'companies.*'=>['exists:companies,id'],
            ];
    }

    public function messages()
    {
        return [
            'companies.*.exists'=>'شرکت/شرکتهای انتخاب شده یافت نشد',
        ];
    }
}
