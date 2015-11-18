<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\AlumnoMatricula;
use App\Core\Entities\PeriodoMatricula;

class ReportesRepo {
    
  public function getAlumnos($idperiodo,$idsede, $idnivel, $idgrado)
  {
      $query = AlumnoMatricula::
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

  public function SeguimientoPagos($request)
  {
    $idperiodo = $request['periodo'];
    $idsede    = $request['sede'];
    $idnivel   = $request['nivel'];
    $idgrado   = $request['grado'];

    $periodo = PeriodoMatricula::take(1)->orderBy('idperiodomatricula','desc')->get();
    
    $pagos = AlumnoMatricula::
    select('alumno.idalumno','fullname','codigo','idestadoalumno','monto','users.nombre as nameregister','telefono')
     
     ->leftJoin('alumno', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
     ->leftJoin('alumnodeudas','alumnodeudas.idalumno','=','alumno.idalumno')
     ->leftJoin('mensualidades as m', 'alumno.idalumno', '=', 'm.idalumno')
     ->leftJoin('pension as p', 'm.idpension', '=', 'p.idpension')
     ->leftJoin('users', 'alumnomatricula.usercreate', '=', 'users.id')
     ->where('alumnodeudas.idperiodomatricula', $periodo[0]->idperiodomatricula);

      if($idperiodo) {
          $pagos->where('alumnomatricula.idperiodomatricula','=',$idperiodo);
      }
      if ($idsede) {
          $pagos->where('alumnomatricula.idsede','=',$idsede);
      }
      if ($idnivel) {
          $pagos->where('alumnomatricula.idnivel','=',$idnivel);
      }
      if ($idgrado) {
          $pagos->where('alumnomatricula.idgrado','=',$idgrado);
      }
      
      $pagos->where('alumno.impedimento','<>','1');
      $pagos->groupBy('alumno.idalumno');

      return $pagos->get();
      
  }
}