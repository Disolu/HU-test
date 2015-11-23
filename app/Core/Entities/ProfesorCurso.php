<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfesorCurso extends Model
{
    use SoftDeletes;
    protected $table = 'profesorcurso';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idprofesorcurso',
    'iduser', 
    'idcurso', 
    'idperiodomatricula', 
    ];

    public function curso()
    {
    	return $this->hasMany('App\Core\Entities\Cursos','idcurso','idcurso');
    }

    public function profesor()
    {
        return $this->belongsTo('App\Core\Entities\Usuarios','iduser','id');
    }

    public function secciones()
    {
        return $this->hasMany('App\Core\Entities\ProfesorSeccion','idprofesorcurso','idprofesorcurso');
    }
}
