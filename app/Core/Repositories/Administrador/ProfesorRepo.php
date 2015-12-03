<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\ProfesorCurso;
use App\Core\Entities\ProfesorSeccion;
use App\Core\Entities\PeriodoMatricula;

class ProfesorRepo {
    public function SaveProfesorCurso($request, $curso, $periodo)
    {
        $profesor = ProfesorCurso::create([
            'iduser'            => $request['profesor'],
            'idcurso'           => $curso,
            'idperiodomatricula'=> $periodo
        ]);
        return $profesor;
    }

    public function SaveProfesorSeccion($idcurso, $idseccion)
    {
        $profesor = ProfesorSeccion::create([
            'idseccion'       => $idseccion,
            'idprofesorcurso' => $idcurso,
        ]);
        return $profesor;
    }

    public function getLastPeriodoMatricula()
    {
        return PeriodoMatricula::           
        select('idperiodomatricula','nombre')
        ->orderBy('created_at','desc')->take(1)->get();
    }

    public function getProfesorCurso($idperiodo, $idprofe)
    {
        return ProfesorCurso::where('iduser', $idprofe)->where('idperiodomatricula',$idperiodo)->get();
    }

    public function lastRegister()
    {
        return ProfesorCurso::orderBy('created_at','desc')->take(1)->get();
    }

    public function getProfesorAsignaturas($idperiodo)
    {
        return ProfesorCurso::where('idperiodomatricula', $idperiodo)
            //->groupBy('iduser')
            ->orderBy('created_at','desc')
            ->get();
    }

    public function deleteRelacion($id)
    {
        $data = ProfesorCurso::where('idprofesorcurso', $id)->delete();
        $data = ProfesorSeccion::where('idprofesorcurso', $id)->delete();
        return $data;
    }
}