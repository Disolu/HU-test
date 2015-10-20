<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pension extends Model
{
    use SoftDeletes;
    protected $table = 'pension';
    protected $dates = ['deleted_at'];
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
