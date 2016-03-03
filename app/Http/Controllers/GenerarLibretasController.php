<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Core\Entities\Cursos;
use App\Core\Entities\Alumno;
use App\Core\Entities\NotaCurso;
use App\Core\Entities\NotaTarjeta;
use App\Core\Entities\Tarjeta;
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
    $alumno = DB::table('alumno')->where('idalumno', $idalumno)->get();
    return view('notas.generar.libreta', compact('alumno'));
  }

  public function generateOptimist($idalumno, Request $request)
  {
    $nbimestre = !empty($request['bimestre']) ? $request['bimestre'] : 1;
    $alumno = Alumno::with('matricula')->where('idalumno',$idalumno)->first();
    $tarjeta = Tarjeta::with('tarjetabloque')->where('idnivel',$alumno->matricula->idnivel)->first();
    $qnotas = NotaTarjeta::where('idtarjeta',$tarjeta->idtarjeta)
                            ->where('idalumno',$alumno->idalumno)
                            ->where('idbimestre',$request['bimestre'])
                            ->where('idperiodomatricula',$alumno->matricula->idperiodomatricula)
                            ->get();

    $notas = array();

    foreach ($qnotas as $nota) {
        $notas[$nota->idbloquecriterio] = $nota;
    }

    return view('notas.generar.optimist', compact('alumno', 'tarjeta','notas'));
  }

  public function generateProgrest($idalumno, Request $request)
  {
    $nbimestre = !empty($request['bimestre']) ? $request['bimestre'] : 1;
    $alumno = DB::table('alumno')->where('idalumno', $idalumno)->get();
    return view('notas.generar.progrest', compact('alumno', 'nbimestre'));
  }
}
