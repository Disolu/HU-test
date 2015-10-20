<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfesorCursoRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'profesor' => 'required|min:1|not_in:0'
        ];
    }
}
