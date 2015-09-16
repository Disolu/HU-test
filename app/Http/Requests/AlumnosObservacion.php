<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class AlumnosObservacion extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'          => 'required',
            'tipoobservacion' => 'required|integer|not_in:0',
            'observacion'     => 'required|min:10|max:400'
        ];
    }
}
