<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaTarjeta extends Model
{
    use SoftDeletes;
    protected $table = 'notatarjeta';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'idnotatarjeta',
        'S',     
        'CS',                 
        'AV',                
        'N',                  
        'idtarjeta',
        'idbloque',         
        'idbloquecriterio',
        'idbimestre',  
        'idperiodomatricula',
        'idtutor',
        'idalumno',           
        'created_at',
        'updated_at'     
    ];
}
