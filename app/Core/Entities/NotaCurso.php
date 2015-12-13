<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaCurso extends Model
{
    use SoftDeletes;
    protected $table = 'notacurso';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'idnotacurso';
    protected $fillable = [
    'idnotacurso', 
    'idbimestre', 
    'idperiodomatricula', 
    'idalumno',
    'idcurso',
    'idseccion',
    'nota_number',
    'nota_char',
    'usercreate',
    'userupdate',
    'created_at'
    ];
}
