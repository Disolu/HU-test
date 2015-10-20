<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SeccionRequest extends Request
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
            'nivel' => 'required',
            'grado' => 'required',
        ];
    }
}
