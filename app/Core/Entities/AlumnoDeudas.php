<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoDeudas extends Model
{
    protected $table = 'alumnodeudas';
    protected $fillable = [
        'idalumnodeudas',
        'mes',
        'idalumno',
        'usercreate',
        'idperiodomatricula',
        'userupdate',
        'status',
        'created_at',
        'updated_at'
    ];
}
