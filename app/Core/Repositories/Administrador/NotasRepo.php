<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\FechaNota;
use App\Core\Entities\PeriodoMatricula;
use App\Core\Entities\Bimestre;
use App\Core\Entities\ProfesorCurso;
use App\Core\Entities\AlumnoMatricula;
use Auth;
use DB;

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
            //leftJoin('notacurso as nc','nc.idalumno','=','alumnomatricula.idalumno')
            select('*', DB::raw("(select count(*) from notacurso where idbimestre = 1 and idperiodomatricula = {$periodo} ) as bimestre1"))
            ->where('idperiodomatricula',$periodo)
            ->where('idgrado', $grado)
            ->where('idseccion', $seccion)
            //->groupBy('nc.idalumno')
            ->get();
    }

    public function showFechanotas($periodo)
    {
        return FechaNota::
        where('idperiodomatricula', $periodo)
        ->where('idfechanota', $periodo)->take(1)->get();   
    }

    public function updatePeriodoNota($request, $id)
    {
        $user = FechaNota::where('idfechanota', $id)
        ->update([
            'fecha_inicio' => $request['start'],
            'fecha_fin'    => $request['end'],
        ]);
        return $user;
    }

    public function getFechaNota($periodo, $datehow)
    {
        return FechaNota::
        where('idperiodomatricula', $periodo)
        //->whereBetween($datehow, [$fecha_inicio, $fecha_fin])
        ->get();
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