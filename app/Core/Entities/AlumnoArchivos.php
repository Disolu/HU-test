<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoArchivos extends Model
{
    use SoftDeletes;
    protected $table = 'alumnoarchivos';
    protected $primaryKey = 'idalumnoarchivos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idalumno',
    'idalumnoarchivos',
    'anexo_url',
    'reciboluz_url',
    'dni_apoderado',
    'idperiodomatricula',
    'usercreate',
    ];
}
