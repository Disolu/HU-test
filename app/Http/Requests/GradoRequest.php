<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GradoRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'sede' => 'required',
            'nivel' => 'required'
        ];
    }
}
