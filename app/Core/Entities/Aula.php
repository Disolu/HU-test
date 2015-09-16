<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aula';
    protected $fillable = [
    'name', 
    'idseccion', 
    'idgrado', 
    'idnivel',
    'idsede',
    'usercreate'
    ];
}
