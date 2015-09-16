<?php
namespace App\Core\Repositories;
use App\Core\Entities\Alumno;
use App\Core\Entities\PeriodoMatricula;

class PeriodoRepo {
    public function getAlumno($alumno)
    {
        return Alumno::        	
        select('nombres', 'apellido_paterno', 'apellido_materno', 'codigo','impedimento')
        ->where('nombres','LIKE','%'.$alumno.'%')
        ->orWhere('apellido_paterno','LIKE','%'.$alumno.'%')
        ->orWhere('apellido_materno','LIKE','%'.$alumno.'%')
        ->orWhere('dni', $alumno)
        ->get();
    }
    public function getLastPeriodo()
    {
        return PeriodoMatricula::
        select('idperiodomatricula','nombre')
        ->orderBy('idperiodomatricula', 'desc')
        ->take(1)
        ->get();
    }
}
