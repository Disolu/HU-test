<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoMatricula extends Model
{
	use SoftDeletes;
    protected $table = 'estadomatricula';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre',
    'idestadomatricula'
    ];
}
