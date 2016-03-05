<?php
namespace App\Core\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaTutoria extends Model
{
    use SoftDeletes;
    protected $table = 'notatutoria';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'idnotatutoria';
}
