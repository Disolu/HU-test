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
    'iduser', 
    'idcurso', 
    'idperiodomatricula', 
    ];

    public function curso()
    {
    	return $this->belongsTo('App\Core\Entities\Cursos','idcurso','idcurso');
    }
}
