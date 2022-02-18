<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CanecaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ['campo1'=>'required'];
    }
}
