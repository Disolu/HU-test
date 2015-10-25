<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bloque extends Model
{
    use SoftDeletes;
    protected $table = 'bloque';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    'idbloque', 
    'nombre', 
    'usercreate'
    ];
}
