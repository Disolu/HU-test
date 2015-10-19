<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoApoderado extends Model
{
    use SoftDeletes;
    protected $table = 'alumnoapoderado';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'p_nombre',
    'p_apellido',
    'p_dni',
    'p_estadocivil',
    'p_lugarresidencia',
    'p_telefonofijo',
    'p_telefonotrabajo',
    'p_celular',
    'p_email',

    'm_nombres',
    'm_apellido',
    'm_dni',
    'm_estadocivil',
    'm_lugarresidencia',
    'm_telefonofijo',
    'm_telefonotrabajo',
    'm_celular',
    'm_email',

    'a_nombres',
    'a_apellidos',
    'a_dni',
    'a_estadocivil',
    'a_lugarresidencia',
    'a_telefonofijo',
    'a_telefonotrabajo',
    'a_celular',
    'a_email',

    'idalumno',
    'usercreate',
    'userupdate'
    ];
}
