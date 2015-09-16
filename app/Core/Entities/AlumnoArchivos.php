<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class AlumnoArchivos extends Model
{
    protected $table = 'alumnoarchivos';
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
