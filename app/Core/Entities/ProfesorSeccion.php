<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfesorSeccion extends Model
{
    use SoftDeletes;
    protected $table = 'profesorseccion';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idprofesorseccion', 
    'idseccion', 
    'idprofesorcurso', 
    ];

    public function profesorcurso()
    {
    	return $this->belongsTo('App\Core\Entities\ProfesorCurso','idprofesorcurso','idprofesorcurso');
    }

    public function seccion()
    {
        return $this->belongsTo('App\Core\Entities\Seccion','idseccion','idseccion');
    }
}
