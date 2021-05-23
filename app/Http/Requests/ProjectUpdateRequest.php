<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required'],
            'startDate'=>['string','nullable'],
            'endDate'=>['string','nullable'],
            'description'=>['string','nullable']
        ];
    }
}
