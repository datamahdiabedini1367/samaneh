<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationalUpdateRequest extends FormRequest
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
            'grade' => ['required', 'string'],
            'major' => ['string', 'nullable'],
            'universityName' => ['string', 'nullable'],
            'address' => ['string', 'nullable'],
            'average' => ['string', 'nullable'],
            "startDate" => ['date', 'nullable', 'before:today'],
            "endDate" => ['date', 'nullable', 'after:startDate', 'before:today'],
        ];

    }

    public function messages()
    {
        return [
            'grade.required' => 'فیلد مقطع تحصیلی اجباریست.',
            'startDate.before' => 'تاریخ شروع باید قبل از امروز باشد.',
            'endDate.before' => 'تاریخ اتمام باید قبل از امروز باشد.',
            'endDate.after' => 'تاریخ اتمام باید بعد از تاریخ شروع باشد.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'edit_startDate' => convert_date($this->startDate, 'gregorian')]);
        $this->merge([
            'edit_endDate' => convert_date($this->endDate, 'gregorian'),
        ]);
    }


}
