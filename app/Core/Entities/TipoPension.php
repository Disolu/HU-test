<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPension extends Model
{
	use SoftDeletes;
    protected $table = 'tipopension';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'nombre', 
    'usercreate',
    'updated_at'
    ];
}
