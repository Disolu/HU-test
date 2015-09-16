<?php
namespace App\Core\Repositories\Matricula;
use App\Core\Entities\PeriodoMatricula;

class PeriodoMatriculaRepo {
	//Matricula activa
    public function getPeriodoMatricula($fecha)
    {
        return PeriodoMatricula::        	
        select('nombre','inicio','fin')
        ->where('fin', '>=', $fecha)
        ->take(1)
        ->get();
    }
    //Último periodo de matricula existente 
    public function getLastPeriodoMatricula()
    {
        return PeriodoMatricula::        	
        select('idperiodomatricula','nombre')
        ->orderBy('created_at','desc')->take(1)->get();
    }
}
