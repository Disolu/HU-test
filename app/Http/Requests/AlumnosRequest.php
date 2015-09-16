<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class AlumnosRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'nombres'          => 'required|min:4|max:30|regex:/^[\pL\s]+$/u', 
        'apellido_paterno' => 'required|min:4|max:20|regex:/^[\pL\s]+$/u', 
        'apellido_materno' => 'required|min:4|max:20|regex:/^[\pL\s]+$/u', 
        'sexo'             => 'required|size:1', 
        'fecha_nacimiento' => 'date', 
        'dni'              => 'required|numeric|integer|digits:8', 
        'telefono'         => 'numeric|min:7',
        'direccion'        => 'min:4',
        'alu_estado'       => 'required|integer|not_in:0',
        'estadoalumno'     => 'required|integer|not_in:0',
        'impedimento'      => 'required|integer',
        //Padre
        "p_nombres"         => 'min:4|max:30|regex:/^[\pL\s]+$/u',
        "p_apellidos"       => 'min:4|max:50|regex:/^[\pL\s]+$/u',
        "p_dni"             => 'integer|digits:8',
        "p_estadocivil"     => '',
        "p_lugarresidencia" => '',
        "p_telefonofijo"    => 'integer',
        "p_telefonotrabajo" => 'integer',
        "p_celular"         => 'integer',
        "p_email"           => 'email',

        //Madre    
        "m_nombres"         => 'min:4|max:30|regex:/^[\pL\s]+$/u',
        "m_apellidos"       => 'min:4|max:50|regex:/^[\pL\s]+$/u',
        "m_dni"             => 'integer|digits:8',
        "m_estadocivil"     => '',
        "m_lugarresidencia" => '',
        "m_telefonofijo"    => 'integer',
        "m_telefonotrabajo" => 'integer',
        "m_celular"         => 'integer',
        "m_email"           => 'email',

        //Apoderado 
        "a_nombres"         => 'min:4|max:30|regex:/^[\pL\s]+$/u',
        "a_apellidos"       => 'min:4|max:50|regex:/^[\pL\s]+$/u',
        "a_dni"             => 'integer|digits:8',
        "a_estadocivil"     => '',
        "a_lugarresidencia" => '',
        "a_telefonofijo"    => 'integer',
        "a_telefonotrabajo" => 'integer',
        "a_celular"         => 'integer',
        "a_email"           => 'email',

        //Otross Datos    
        "tiposangre"    => 'min:2|max:10',
        "idreligion"    => 'integer|not_in:0',
        "email"         => 'email',
        "qty_hermanos"  => 'integer',
        "celular"       => 'integer',
        "seguro"        => 'min:2|max:20'
        ];
    }
}
