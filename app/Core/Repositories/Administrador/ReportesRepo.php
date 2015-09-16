<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\AlumnoMatricula;

class ReportesRepo {
    
    public function getAlumnos($idperiodo,$idsede, $idnivel, $idgrado, $idseccion)
    {
        $query = AlumnoMatricula::
         leftJoin('alumno', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
         ->leftJoin('pension', 'alumnomatricula.idpension', '=', 'pension.idpension')
         ->leftJoin('users', 'alumnomatricula.usercreate', '=', 'users.id')
         ->select('fullname','codigo','idestadoalumno','monto','users.name as nameregister');

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
        if ($idseccion) {
            $query->where('alumnomatricula.idseccion','=',$idseccion);
        }
        return $query->get();
    }
    public function getAlumnosxSede($idsede, $idperiodomatricula)
    {
        return AlumnoMatricula::            
         select('idalumnomatricula')
         ->where('idsede','=',$idsede)
         ->where('idperiodomatricula','=',$idperiodomatricula)          
         ->get();
    }
    public function getAlumnosxSeccion()
    {
        return AlumnoMatricula::with(['seccion','nivel','sede','grado','alumno'])
        ->select('*', \DB::raw('count(*) as total'))
        ->groupBy('idseccion')
        ->groupBy('idnivel')
        ->groupBy('idgrado')
        ->get();
    }
    public function getAlumnosxGrado($idgrado, $idperiodomatricula)
    {
        return AlumnoMatricula::            
         select('idalumnomatricula')
         ->where('idgrado','=',$idgrado)
         ->where('idperiodomatricula','=',$idperiodomatricula)  
         ->get();
    }
    public function getAlumnosxNivel($idnivel, $idperiodomatricula)
    {
        return AlumnoMatricula::            
         select('idalumnomatricula')
         ->where('idnivel','=',$idnivel)
         ->where('idperiodomatricula','=',$idperiodomatricula)  
         ->get();
    }
}