<?php
namespace App\Core\Repositories\Alumno;
use App\Core\Entities\AlumnoDatos;

class AlumnoOtherDataRepo {
    public function getOtherDataByID($alumno)
    {
         return AlumnoDatos::  
         select('*')
         ->where('idalumno','=', $alumno)
         ->take(1)
         ->orderBy('idalumnosdatos','desc')
         ->get();        
    }
}