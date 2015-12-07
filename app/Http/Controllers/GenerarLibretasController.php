<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Redirect;

class GenerarLibretasController extends Controller
{

  public function generarLibretas(Request $request)
  {
    $idsede    = $request['sede'];
    $idnivel   = $request['nivel'];
    $idgrado   = $request['grado'];
    $idseccion = $request['seccion'];
    $dni       = $request['dni'];

    $periodo = DB::table('periodomatricula')->take(1)->orderBy('idperiodomatricula','desc')->get();
    $alumnos = DB::table('alumnomatricula')
    ->select('alumno.idalumno','fullname','codigo','idestadoalumno','users.nombre as nameregister','telefono')
     ->leftJoin('alumno', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
     ->leftJoin('alumnodeudas','alumnodeudas.idalumno','=','alumno.idalumno')
     ->leftJoin('users', 'alumnomatricula.usercreate', '=', 'users.id')
     ->where('alumnodeudas.idperiodomatricula', $periodo[0]->idperiodomatricula);

      if ($idsede) {
          $alumnos->where('alumnomatricula.idsede','=',$idsede);
      }
      if ($idnivel) {
          $alumnos->where('alumnomatricula.idnivel','=',$idnivel);
      }
      if ($idgrado) {
          $alumnos->where('alumnomatricula.idgrado','=',$idgrado);
      }
      if ($idseccion) {
          $alumnos->where('alumnomatricula.idseccion','=',$idseccion);
      }
      if ($dni) {
          $alumnos->where('alumno.dni','=',$dni);
      }
      
      $alumnos->where('alumno.impedimento','<>','1');
      $alumnos->groupBy('alumno.idalumno');
      $alumnos->get();

      $dataAlumnos = $alumnos->get();
    return view('libreta.libreta', compact('dataAlumnos'));
  }

  public function generateLibreta($idalumno)
  {
    return view('notas.generar.libreta');
  }

  public function generateOptimist($idalumno)
  {
    return view('notas.generar.optimist');
  }

  public function generateProgrest($idalumno)
  {
    return view('notas.generar.progrest');
  }
}