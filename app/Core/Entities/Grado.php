<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    use SoftDeletes;
    protected $table = 'grado';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idgrado', 
    'nombre',
    'idsede', 
    'idnivel', 
    'usercreate'
    ];

    public function curso()
    {
    	return $this->hasMany('App\Core\Entities\Cursos', 'idgrado', 'idgrado');
    }

    public function nivel()
    {
        return $this->belongsTo('App\Core\Entities\Nivel','idnivel','idnivel');
    }

    public function seccion()
    {
        return $this->belongsTo('App\Core\Entities\Seccion','idgrado','idseccion');
    }

    public function secciones()
    {
        return $this->hasMany('App\Core\Entities\Seccion','idgrado','idgrado');
    }

    public function matriculados()
    {
        return $this->hasMany('App\Core\Entities\AlumnoMatricula','idgrado','idgrado');
    }
}
