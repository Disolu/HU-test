<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PeriodoRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
        ];
    }
}
