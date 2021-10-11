<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'firstName' => ['required','string'],
            'nikeName' => ['nullable','string'],
            'lastName' => ['required','string'],
            'fatherName' => ['string','nullable'],
            'motherName' => ['string','nullable'],
            'married' => ['in:0,1'],
            'birthdate' => ['string','nullable'],
            'birthdatePlace' => ['string','nullable'],
            'gender' => ['required','in:0,1'],
            'nationalCode' => ['unique:persons,nationalCode','string','nullable'],
            'address' => ['string','nullable'],
            'bio' => ['string','nullable'],
            'entertainments' => ['string','nullable'],
            'personalFavorites' => ['string','nullable'],
            'politicalOrientation' => ['string','nullable'],
            'languageUse' => ['string','nullable'],
        ];
    }
    public function messages()
    {
        return [
            'firstName.required'=>"نام اجباریست",
//            'nikeName.required'=>"نام مستعار اجباریست",
            'lastName.required'=>"نام خانوادگی اجباریست",
            'gender.required'=>"جنسیت انتخاب نشده است",
            'nationalCode.unique'=>"کد ملی تکراری است",
        ];
    }

    protected function prepareForValidation()
    {
            $this->merge([
                'birthdate' => convert_date($this->birthdate, 'gregorian'),
            ]);
    }


}
