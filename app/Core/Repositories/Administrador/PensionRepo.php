<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\TipoPension;
use App\Core\Entities\Sede;
use App\Core\Entities\Nivel;
use App\Core\Entities\PeriodoMatricula;
use App\Core\Entities\Pension;

class PensionRepo {
    public function getAllPensiones($idperiodomatricula, $sede)
    {
        return Pension::            
         select('idpension','tipopension.name as nametipopension','pension.idsede','monto','users.name as nameuser','nivel_nombre')
         ->leftJoin('users', 'pension.usercreate', '=', 'users.id')
         ->leftJoin('nivel', 'pension.idnivel', '=', 'nivel.idnivel')
         ->leftJoin('tipopension', 'pension.idtipopension', '=', 'tipopension.idtipopension')
         ->where('pension.idperiodomatricula','=',$idperiodomatricula)
         ->where('pension.idsede','=', $sede)
         ->orderBy('idpension','desc')
         ->get();
    }
    public function getPensiones($idtipo, $idsede, $idnivel, $idperiodomatricula)
    {
        return Pension::            
         select('idpension','monto')
         ->where('idtipopension','=',$idtipo)
         ->where('idsede','=',$idsede)
         ->where('idnivel','=',$idnivel)
         ->where('idperiodomatricula','=',$idperiodomatricula)
         ->get();
    }
    public function getAllTipoPension()
    {
        return TipoPension::            
         select('idtipopension','name')
         ->get();
    }
    public function getAllSedes()
    {
        return Sede::            
         select('idsede','sede_nombre')
         ->get();
    }
    public function getAllNiveles()
    {
        return Nivel::            
         select('idnivel','nivel_nombre')
         ->get();
    }
    public function getAllPeriodos()
    {
        return PeriodoMatricula::            
         select('idperiodomatricula','nombre')
         ->take(1)
         ->orderBy('idperiodomatricula','desc')
         ->get();
    }
    public function getValidacionMonto($idtipopension, $idnivel, $idsede, $monto, $idperiodomatricula)
    {
        return Pension::            
         select('idtipopension','monto')
         ->where('idtipopension','=', $idtipopension)
         ->where('idnivel','=', $idnivel)
         ->where('idsede','=', $idsede)
         ->where('monto','=', $monto)
         ->where('idperiodomatricula','=', $idperiodomatricula)
         ->take(1)
         ->get();
    }
}