<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class AlumnoMatricula extends Model
{
    protected $table = 'alumnomatricula';
    protected $primaryKey = 'idalumnomatricula';
    protected $fillable = [
    'idalumno',  
    'idseccion',         
    'idnivel',           
    'idsede',            
    'idgrado',           
    'idperiodomatricula',
    'idpension',
    'idperiodomatricula',
    'idestadomatricula',
    'idtipopension',
    'usercreate'
    ];
    public function seccion()
    {
        return $this->belongsTo('App\Core\Entities\Seccion','idseccion','idseccion');
    }
    public function nivel()
    {
        return $this->belongsTo('App\Core\Entities\Nivel','idnivel','idnivel');
    }
    public function sede()
    {
        return $this->belongsTo('App\Core\Entities\Sede','idsede','idsede');
    }
    public function grado()
    {
        return $this->belongsTo('App\Core\Entities\grado','idgrado','idgrado');
    }
    public function alumno()
    {
        return $this->belongsTo('App\Core\Entities\Alumno', 'App\Core\Entities\AlumnoMatricula', 'idalumno', 'idseccion');
    }
}
