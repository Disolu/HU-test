<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sede extends Model
{
	use SoftDeletes;
    protected $table = 'sede';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre', 
    'idsede', 
    'sede_direccion', 
    'usercreate'
    ];
}
