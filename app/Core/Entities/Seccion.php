<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'seccion';
    protected $fillable = [
    'idgrado', 
    'name',
    'idsede', 
    'qty_vacantes',
    'idnivel', 
    'usercreate'
    ];

    public function nivel()
    {
    	return $this->belongsTo('App\Core\Entities\Nivel','idnivel','idnivel');
    }


}
