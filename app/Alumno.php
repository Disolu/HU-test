<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';
    protected $fillable = [
    'nombres', 
    'apellido_paterno', 
    'apellido_materno', 
    'sexo', 
    'fecha_nacimiento', 
    'dni', 
    'telefono',
    'direccion',
    'iddepartamento',
    'idprovincia',
    'iddistrito',
    'iduser'
    ];

}
