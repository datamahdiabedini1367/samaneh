<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUserAssign extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'users'=>['array'],
            'users.*'=>['exists:users,id'],
        ];
    }
}
