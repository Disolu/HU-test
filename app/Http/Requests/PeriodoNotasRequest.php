<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PeriodoNotasRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bimestre' => 'required|numeric',
            'start' => 'required',
            'end' => 'required'
        ];
    }
}
