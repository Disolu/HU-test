<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    use SoftDeletes;
    protected $table = 'nivel';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre', 
    'idsede', 
    'idnivel', 
    'usercreate'
    ];

    public function grado()
    {
    	return $this->hasMany('App\Core\Entities\Grado', 'idnivel', 'idnivel');
    }

    public function sede()
    {
        return $this->belongsTo('App\Core\Entities\Sede','idsede','idsede');
    }
}
