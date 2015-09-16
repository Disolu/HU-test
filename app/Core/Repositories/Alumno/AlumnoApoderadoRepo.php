<?php
namespace App\Core\Repositories\Alumno;
use App\Core\Entities\AlumnoApoderado;

class AlumnoApoderadoRepo {
    public function getApoderadosByID($alumno)
    {
        return AlumnoApoderado::  
         select('*')
         ->where('idalumno','=', $alumno)
         ->take(1)
         ->orderBy('idalumnoapoderado','desc')
         ->get();   
    }
    public function getAllDataApoderado($alumno)
    {
    	return AlumnoApoderado::  
         select('*')
         ->where('idalumno','=', $alumno)
         ->take(1)
         ->orderBy('idalumnoapoderado','desc')
         ->get();   
    }
}