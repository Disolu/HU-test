<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SedeRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'sede_direccion' => 'required',
        ];
    }
}
