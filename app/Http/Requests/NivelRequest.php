<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NivelRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'idsede' => 'required'
        ];
    }
}
