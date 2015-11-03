<?php
namespace App\Core\Repositories;
use App\Core\Entities\Informes;
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
        $query = Informes::
         leftJoin('alumno', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
         ->leftJoin('pension', 'alumnomatricula.idpension', '=', 'pension.idpension')
         ->leftJoin('users', 'alumnomatricula.usercreate', '=', 'users.id')
         ->select('fullname','codigo','idestadoalumno','monto','users.nombre as nameregister');

        if($idperiodo) {
            $query->where('alumnomatricula.idperiodomatricula','=',$idperiodo);
        }
        if ($idsede) {
            $query->where('alumnomatricula.idsede','=',$idsede);
        }
        if ($idnivel) {
            $query->where('alumnomatricula.idnivel','=',$idnivel);
        }
        if ($idgrado) {
            $query->where('alumnomatricula.idgrado','=',$idgrado);
        }
        return $query->get();
    }
}
