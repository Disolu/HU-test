<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aula extends Model
{
	use SoftDeletes;
    protected $table = 'aula';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre', 
    'idseccion', 
    'idgrado', 
    'idnivel',
    'idsede',
    'usercreate'
    ];
}
