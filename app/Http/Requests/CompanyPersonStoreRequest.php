<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyPersonStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
//            'startDate' => convert_date($this->startDate,'jalali'),
//            'endDate' => convert_date($this->endDate,'jalali'),
        ]);
    }
}
