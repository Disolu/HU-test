<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VacanteRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'qty_vacantes' => 'required',
            'sede' => 'required',
            'nivel' => 'required',
            'grado' => 'required',
            'seccion' => 'required',
        ];
    }
}
