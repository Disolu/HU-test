<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;

class EstadoMatricula extends Model
{
    protected $table = 'estadomatricula';
    protected $fillable = [
    'name',
    'idestadomatricula'
    ];
}
