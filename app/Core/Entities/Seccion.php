<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seccion extends Model
{
    use SoftDeletes;
    protected $table = 'seccion';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idseccion',
    'idgrado', 
    'nombre',
    'idsede', 
    'qty_vacantes',
    'idnivel', 
    'usercreate'
    ];

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
