<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InformesSearchRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
        ];
    }
}
