<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FechaNota extends Model
{
	use SoftDeletes;
    protected $table = 'fechanota';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idfechanota',
    'idbimestre', 
    'idperiodomatricula', 
    'fecha_inicio', 
    'fecha_fin',
    ];

    public function bimestre()
    {
    	return $this->belongsTo('App\Core\Entities\Bimestre','idbimestre','idbimestre');
    }

    public function periodomatricula()
    {
        return $this->belongsTo('App\Core\Entities\PeriodoMatricula','idperiodomatricula','idperiodomatricula');
    }
}
