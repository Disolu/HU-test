<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroNotasRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bimestreINota[]' => 'alpha_num',
            'bimestreIINota[]' => 'alpha_num',
            'bimestreIIINota[]' => 'alpha_num',
            'bimestreIVNota[]' => 'alpha_num'
        ];
    }
}
