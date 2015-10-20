<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuarios extends Model
{
    use SoftDeletes;
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $fillable = [
    'id',
    'nombre', 
    'user', 
    'email', 
    'idrol', 
    'password'
    ];

    public function rol()
    {
        return $this->hasOne('App\Core\Entities\Rol', 'idroluser', 'idrol');
    }
}
