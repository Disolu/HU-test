<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informes extends Model
{
    use SoftDeletes;
    protected $table = 'informes';
    protected $primaryKey = 'idinforme';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idinforme',
    'dni', 
    'colegio', 
    'direccion',
    'motivo',
    'idgrado', 
    'usercreate',
    'userupdate'
    ];   
}