<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $table = 'pension';
    protected $fillable = [
    'idpension', 
    'idtipopension',
    'idnivel',
    'idsede',
    'monto',
    'idperiodomatricula',
    'usercreate'
    ];
}
