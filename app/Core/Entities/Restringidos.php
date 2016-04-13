<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restringidos extends Model
{
    use SoftDeletes;
    protected $table = 'restringidos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fullname',
        'dni',
        'observacion'
   
    ];
}