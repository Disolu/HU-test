<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodoMatricula extends Model
{
    use SoftDeletes;
    protected $table = 'periodomatricula';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idperiodomatricula',
    'nombre', 
    'inicio', 
    'fin', 
    'usercreate',
    'idnivel',
    'updated_at'
    ];
}