<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectPersonAssign extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'persons'=>['array'],
            'persons.*'=>['exists:persons,id'],
        ];
    }
    public function messages()
    {
        return [
             'persons.*.exists'=>'فرد انتخاب شده در سیستم یافت نشد',
        ];
    }
}
