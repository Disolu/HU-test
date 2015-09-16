<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sede';
    protected $fillable = [
    'sede_nombre', 
    'idsede', 
    'sede_direccion', 
    'usercreate'
    ];
}
