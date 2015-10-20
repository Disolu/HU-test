<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoObservacion extends Model
{
    use SoftDeletes;
    protected $table = 'alumnoobservacion';
    protected $dates = ['deleted_at'];
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
