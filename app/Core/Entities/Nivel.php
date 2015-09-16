<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'nivel';
    protected $fillable = [
    'nivel_nombre', 
    'idsede', 
    'idnivel', 
    'usercreate'
    ];
}
