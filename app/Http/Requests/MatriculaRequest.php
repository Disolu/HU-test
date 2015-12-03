<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatriculaRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'seccion'  => 'required|integer|not_in:0',
            'nivel'    => 'required|integer|not_in:0',
            'sede'     => 'required|integer|not_in:0',
            'grado'    => 'required|integer|not_in:0',
            'periodo'=> 'required|integer|not_in:0',
            'estado'=> 'required|integer|not_in:0',
            'alu_tipopension'=> 'required|integer|not_in:0',
            'pension'  => 'required|integer|not_in:0'
        ];
    }
}
