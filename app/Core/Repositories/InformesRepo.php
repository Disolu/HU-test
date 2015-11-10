<?php
namespace App\Core\Repositories;
use App\Core\Entities\Informes;
use App\Core\Entities\PeriodoMatricula;
use Auth;

class InformesRepo {
    public function SaveInforme($request)
    {
        return Informes::create([
            'nombres'   => $request['nombres'],
            'dni'       => $request['dni'],
            'colegio'   => $request['colegio'],
            'direccion' => $request['distrito'],
            'motivo'    => $request['motivo'],
            'idgrado'   => $request['grado'],
            'idnivel'   => $request['nivel'],
            'idsede'    => $request['sede'],
            'comentario'=> $request['comentario'],
            'usercreate' => Auth::user()->id,
            'updated_at' => ''
        ]);
    }
    
    public function listInformes()
    {
        return Informes::all();
    }

    public function getSearchInforme($idsede, $idnivel, $idgrado)
    {
        $query = Informes::select('*');

        if ($idsede) {
            $query->where('idsede','=',$idsede);
        }
        if ($idnivel) {
            $query->where('idnivel','=',$idnivel);
        }
        if ($idgrado) {
            $query->where('idgrado','=',$idgrado);
        }
        return $query->get();
    }

    public function MatriculaVSInformes()
    {
        return Informes::select('informes.created_at as fechaInforme','a.*','m.*','m.created_at as fechaMatricula')
        ->leftJoin('alumno as a', 'informes.dni', '=', 'a.dni')
        ->leftJoin('alumnomatricula as m', 'a.idalumno', '=', 'm.idalumno')
        ->get();
    }

    public function allPeriodos()
    {
        return PeriodoMatricula::all();
    }

    public function searchInformesvsMatricula($periodo)
    {
        return Informes::select('informes.created_at as fechaInforme','a.*','m.*','m.created_at as fechaMatricula')
        ->leftJoin('alumno as a', 'informes.dni', '=', 'a.dni')
        ->leftJoin('alumnomatricula as m', 'a.idalumno', '=', 'm.idalumno')
        ->where('m.idperiodomatricula',$periodo)
        ->get();
    }
    
}
