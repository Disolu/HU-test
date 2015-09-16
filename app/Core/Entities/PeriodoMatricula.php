<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class PeriodoMatricula extends Model
{
    protected $table = 'periodomatricula';
    protected $fillable = [
    'nombre', 
    'inicio', 
    'fin', 
    'idsede', 
    'idnivel'
    ];
}
