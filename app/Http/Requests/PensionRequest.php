<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PensionRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipopension' => 'required|integer|not_in:0', 
            'nivel'       => 'required|integer|not_in:0', 
            'sede'        => 'required|integer|not_in:0', 
            'periodo'     => 'required|integer|not_in:0',
            'monto'       => 'integer|not_in:0',
            'inicial'     => 'integer|not_in:0',
            'final'       => 'integer|not_in:0',
        ];
    }
}
