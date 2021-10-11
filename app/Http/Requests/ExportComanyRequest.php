<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportComanyRequest extends FormRequest
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
        ];
    }
    protected function prepareForValidation()
    {
            $this->merge([
                'registration_date' => convert_date($this->registration_date, 'gregorian'),
            ]);
    }
}
