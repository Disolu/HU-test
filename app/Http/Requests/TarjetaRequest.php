<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TarjetaRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'idnivel'  => 'required'
        ];
    }
}
