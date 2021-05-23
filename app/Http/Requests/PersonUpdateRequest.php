<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'firstName' => ['required'],
            'nikeName' => ['string','nullable'],
            'lastName' => ['required'],
            'fatherName' => ['string','nullable'],
            'motherName' => ['string','nullable'],
            'married' => ['in:0,1'],
            'birthdate' => ['string','nullable'],
            'birthdatePlace' => ['string','nullable'],
            'gender' => ['in:0,1'],
            'nationalCode' => ['string','nullable'],
            'address' => ['string','nullable'],
            'bio' => ['string','nullable'],
            'entertainments' => ['string','nullable'],
            'personalFavorites' => ['string','nullable'],
            'politicalOrientation' => ['string','nullable'],
            'languageUse' => ['string','nullable'],
        ];
    }
}
