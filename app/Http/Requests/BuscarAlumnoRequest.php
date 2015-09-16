<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BuscarAlumnoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'alumno' => 'required|max:50'
        ];
    }
}
