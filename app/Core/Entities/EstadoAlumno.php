<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoAlumno extends Model
{
	use SoftDeletes;
    protected $table = 'estadoalumno';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre',
    'idestadoalumno'
    ];
}
