<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InformesRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombres' => 'required',
            'dni' => 'required',
            'colegio' => 'required',
            'distrito' => 'required',
            'motivo' => 'required',
            'comentario'=>'required'
        ];
    }
}
