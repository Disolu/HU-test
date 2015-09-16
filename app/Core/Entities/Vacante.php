<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $table = 'vacante';
    protected $fillable = [
    'idvacante',
    'qty_vacantes', 
    'qty_matriculados',

    'idseccion', 
    'idgrado', 
    'idnivel',
    'idsede',
    'idperiodomatricula',
    'usercreate'
    ];
}
