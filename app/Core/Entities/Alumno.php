<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use SoftDeletes;
    protected $table = 'alumno';
    protected $primaryKey = 'idalumno';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idalumno',
    'codigo', 
    'nombres', 
    'apellido_paterno', 
    'apellido_materno', 
    'sexo', 
    'impedimento',
    'fecha_nacimiento', 
    'dni', 
    'telefono',
    'direccion',
    'iddepartamento',
    'idprovincia',
    'idestadoalumno',
    'iddistrito',
    'usercreate'
    ];   

    public function apoderado()
    {
        return $this->hasOne('App\Core\Entities\AlumnoApoderado','idalumno');
    }
    public function otherdata()
    {
        return $this->hasOne('App\Core\Entities\AlumnoDatos','idalumno');
    }
    public function archivos()
    {
        return $this->hasOne('App\Core\Entities\AlumnoArchivos','idalumno');
    }
    public function matricula()
    {
        return $this->hasOne('App\Core\Entities\AlumnoMatricula','idalumno');
    }
    public function deudas()
    {
        return $this->hasMany('App\Core\Entities\AlumnoDeudas','idalumno');
    }
}
