<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumnoDatos extends Model
{
    use SoftDeletes;
    protected $table = 'alumnodatos';
    protected $dates = ['deleted_at'];
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
