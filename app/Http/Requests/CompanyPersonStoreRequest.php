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
            "startDate" => ['date', 'nullable', 'before:today'],
            "endDate" => ['date', 'nullable', 'after:startDate', 'before:today'],
            "semat" => ['string', 'nullable'],
            "section" => ['string', 'nullable'],
            "reasonLeavingJob" => ['string', 'nullable'],
        ];
    }

    public function messages()
    {
        return [
            'company_id.exists'=>'شرکت مورد نظر در لیست شرکت ها نیست',
            'startDate.before' => 'تاریخ شروع به کار باید قبل از امروز باشد',
            'endDate.before' => 'تاریخ اتمام کار باید قبل از امروز باشد',
            'endDate.after' => 'تاریخ اتمام کار باید بعد از تاریخ شروع به کار باشد',

        ];
    }

}
