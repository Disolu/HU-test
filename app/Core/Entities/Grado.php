<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grado';
    protected $fillable = [
    'idgrado', 
    'name',
    'idsede', 
    'idnivel', 
    'usercreate'
    ];
}
