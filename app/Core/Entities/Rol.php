<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
	use SoftDeletes;
    protected $table = 'roluser';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idroluser', 
    'nombre'
    ];
}
