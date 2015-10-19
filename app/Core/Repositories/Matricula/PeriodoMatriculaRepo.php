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

    public function getPeriodo($id)
    {
        return PeriodoMatricula::
        where('idperiodomatricula', $id)
        ->take(1)
        ->get();
    }

    public function getPeriodos()
    {
        return PeriodoMatricula::orderBy('idperiodomatricula','desc')->get();
    }

    //Último periodo de matricula existente 
    public function getLastPeriodoMatricula()
    {
        return PeriodoMatricula::        	
        select('idperiodomatricula','nombre')
        ->orderBy('created_at','desc')->take(1)->get();
    }

    //Último periodo de matricula existente 
    public function savePeriodoMatricula($request, $iduser)
    {
        $periodo = PeriodoMatricula::create([
            'nombre'  => $request['nombre'],
            'inicio'  => $request['inicio'],
            'fin'     => $request['fin'],
            'usercreate' => $iduser,
            'updated_at' => ''
        ]);
        return $periodo;
    }

    public function updatePeriodo($request, $id)
    {
        $periodo = PeriodoMatricula::where('idperiodomatricula', $id)
            ->update([
                'nombre'=> $request['nombre'],
                'inicio'  => $request['inicio'],
                'fin' => $request['fin']
            ]);
        return $periodo;
    }

    public function deletePeriodo($id)
    {
        $vacante = PeriodoMatricula::where('idperiodomatricula', $id)->delete();
        return $vacante;
    }

}
