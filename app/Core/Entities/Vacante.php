<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacante extends Model
{
    use SoftDeletes;
    protected $table = 'vacante';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idvacante',
    'qty_vacantes', 
    'qty_matriculados',

    'idseccion', 
    'idgrado', 
    'idnivel',
    'idsede',
    'idperiodomatricula',
    'usercreate'
    ];

    public function seccion()
    {
        return $this->belongsTo('App\Core\Entities\Seccion','idseccion','idseccion');
    }

    public function grado()
    {
        return $this->belongsTo('App\Core\Entities\Grado','idgrado','idgrado');
    }

    public function nivel()
    {
        return $this->belongsTo('App\Core\Entities\Nivel','idnivel','idnivel');
    }

    public function sede()
    {
        return $this->belongsTo('App\Core\Entities\Sede','idsede','idsede');
    }
}
