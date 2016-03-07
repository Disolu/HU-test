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
    $nivel = $idnivel   = $request['nivel'];
    $idgrado   = $request['grado'];
    $idseccion = $request['seccion'];
    $dni       = $request['dni'];

    $all = $request->all();
    $dataAlumnos = array();
    if(!empty($all)){

      $periodo = DB::table('periodomatricula')->take(1)->orderBy('idperiodomatricula','desc')->get();
      $tarjeta = Tarjeta::with('tarjetabloque')->where('idnivel',$idnivel)->first();
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
        //dd($tarjeta);
    }
    return view('libreta.libreta', compact('dataAlumnos','tarjeta','nivel'));
  }

  public function generateLibreta($idalumno)
  {
    $alumno = DB::table('alumno')->where('idalumno', $idalumno)->get();
    $periodo = DB::table('periodomatricula')->take(1)->orderBy('idperiodomatricula','desc')->first();
    $notatutoria = DB::table('notatutoria')->where('idalumno', $idalumno)
                  ->where('idperiodomatricula', $periodo->idperiodomatricula)->get();

    $notacurso = DB::table('notacurso')
                  ->Join('curso','curso.idcurso','=','notacurso.idcurso')
                  ->where('idalumno', $idalumno)
                  ->where('idperiodomatricula', $periodo->idperiodomatricula)->get();

    $tutoria = array();
    $notas = array();
    foreach($notatutoria as $nota){
      $tutoria[$nota->idbimestre] = $nota;
    }

    foreach($notacurso as $nota){
      if(!isset($notas[$nota->idbimestre]))  $notas[$nota->idbimestre] = array();
      $notas[$nota->idbimestre][$nota->nombre] = $nota;
    }


    return view('notas.generar.libreta', compact('alumno','tutoria','notas'));
  }

  public function generateOptimist($idalumno, Request $request)
  {
    $nbimestre = !empty($request['bimestre']) ? $request['bimestre'] : 1;
    $alumno = Alumno::with('matricula')->where('idalumno',$idalumno)->first();
    $tarjeta = Tarjeta::with('tarjetabloque')->where('idnivel',$alumno->matricula->idnivel)->first();
    $qnotas = NotaTarjeta::where('idtarjeta',$tarjeta->idtarjeta)
                            ->where('idalumno',$alumno->idalumno)
                            ->where('idbimestre',$nbimestre)
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
