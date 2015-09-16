<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class AlumnoDatos extends Model
{
    protected $table = 'alumnodatos';
    protected $fillable = [
        'tipo_sangre',
        'idreligion',
        'email',
        'qty_hermanos',
        'celular',
        'seguro',
        'foto',
        'idalumno',
        'usercreate',
        'userupdate'
    ];
}
