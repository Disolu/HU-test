<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Mensualidades extends Model
{
    use SoftDeletes;
    protected $table = 'mensualidades';
    protected $fillable = [
    'idmensualidades', 
    'mes', 
    'idpension', 
    'idalumno',
    'usercreate',
    'userupdate',
    'created_at',
    'updated_at'
    ];
}
