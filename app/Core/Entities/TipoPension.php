<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class TipoPension extends Model
{
    protected $table = 'tipopension';
    protected $fillable = [
    'name', 
    'idtipopension'
    ];
}
