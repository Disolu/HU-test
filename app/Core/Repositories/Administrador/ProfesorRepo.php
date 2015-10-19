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

    public function lastRegister()
    {
        return ProfesorCurso::orderBy('created_at','desc')->take(1)->get();
    }
}