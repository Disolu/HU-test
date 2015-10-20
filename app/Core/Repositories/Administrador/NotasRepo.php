<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\FechaNota;
use App\Core\Entities\PeriodoMatricula;
use App\Core\Entities\Bimestre;
use App\Core\Entities\ProfesorCurso;
use App\Core\Entities\AlumnoMatricula;
use Auth;

class NotasRepo {
   
    public function SaveFechaNota($request, $periodo)
    {
        $fechanota = FechaNota::create([
            'idbimestre'         => $request['bimestre'],
            'idperiodomatricula' => $periodo,
            'fecha_inicio'  => $request['start'],
            'fecha_fin'     => $request['end'],
        ]);
        return $fechanota;
    }
    
    public function getBimestre()
    {
        return Bimestre::           
        select('idbimestre','nombre')->get();
    }

    public function periodoNotas()
    {
        return FechaNota::           
        select('idfechanota','idbimestre','fecha_inicio','fecha_fin')->get();
    }    
    public function getAlumnos($grado, $seccion ,$periodo)
    {
        return AlumnoMatricula::
        where('idperiodomatricula',$periodo)
        ->where('idgrado', $grado)
        ->where('idseccion', $seccion)
        ->get();
    }

    public function getFechaNota($periodo, $datehow)
    {
        return FechaNota::
        where('idperiodomatricula', $periodo)
        ->where('fecha_fin','>', $datehow)->get();
    }
    public function getCursosProfesor($periodo)
    {
        return ProfesorCurso::
        select('iduser','idcurso')
        ->where('idperiodomatricula',$periodo)
        ->where('iduser', Auth::user()->id)
        ->get();
    }

    public function getLastPeriodoMatricula()
    {
        return PeriodoMatricula::           
        select('idperiodomatricula','nombre')
        ->orderBy('created_at','desc')->take(1)->get();
    }

    public function deleteFechanotas($id)
    {
        return FechaNota::where('idfechanota', $id)->delete();
    }

}