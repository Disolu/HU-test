<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bimestre extends Model
{
	use SoftDeletes;
    protected $table = 'bimestre';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre',
    ];
}
