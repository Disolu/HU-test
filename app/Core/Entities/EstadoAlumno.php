<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class EstadoAlumno extends Model
{
    protected $table = 'estadoalumno';
    protected $fillable = [
    'nombre',
    'idestadoalumno'
    ];
}
