<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Role_has_permissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
