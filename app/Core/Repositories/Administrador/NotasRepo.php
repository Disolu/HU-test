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

    public function getAlumnos($idcurso, $grado, $seccion ,$periodo)
    {
        return AlumnoMatricula::
            select('*',
            DB::raw("(select nota_number from notacurso as nc where nc.idbimestre = 1 and nc.idperiodomatricula = {$periodo} and nc.idcurso = {$idcurso} and nc.idalumno = alumnomatricula.idalumno) as bimestre1"),
            DB::raw("(select nota_number from notacurso as nc where nc.idbimestre = 2 and nc.idperiodomatricula = {$periodo} and nc.idcurso = {$idcurso} and nc.idalumno = alumnomatricula.idalumno) as bimestre2"),
            DB::raw("(select nota_number from notacurso as nc where nc.idbimestre = 3 and nc.idperiodomatricula = {$periodo} and nc.idcurso = {$idcurso} and nc.idalumno = alumnomatricula.idalumno) as bimestre3"),
            DB::raw("(select nota_number from notacurso as nc where nc.idbimestre = 4 and nc.idperiodomatricula = {$periodo} and nc.idcurso = {$idcurso} and nc.idalumno = alumnomatricula.idalumno) as bimestre4"))

            ->where('alumnomatricula.idperiodomatricula',$periodo)
            ->where('alumnomatricula.idgrado', $grado)
            ->where('alumnomatricula.idseccion', $seccion)

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