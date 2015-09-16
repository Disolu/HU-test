<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class AlumnoObservacion extends Model
{
    protected $table = 'alumnoobservacion';
    protected $fillable = [
        'idalumnoobservacion',
        'titulo',
        'observacion',
        'idtipoobservacion',
        'idalumno',
        'usercreate',
        'userupdate'
    ];
}
