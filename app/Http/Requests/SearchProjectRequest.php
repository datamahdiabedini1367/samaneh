<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SearchProjectRequest extends FormRequest
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
            "phrase" => ['string'],
            "field" => ['in:name,description,startDate,endDate,all']
        ];
    }
    public function messages()
    {
        return [
            "field.in"=>'فیلد مورد نظر به درستی انتخاب نشده است',
        ];
    }
}
