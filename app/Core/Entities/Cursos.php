<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cursos extends Model
{
	use SoftDeletes;
    protected $table = 'curso';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre',
    'idgrado',
    ];

    public function grado()
    {
    	return $this->belongsTo('App\Core\Entities\Grado','idgrado','idgrado')->with('sede')->with('nivel');
    }
    public function secciones()
    {
        return $this->hasMany('App\Core\Entities\Seccion','idgrado','idgrado');
    }
}
