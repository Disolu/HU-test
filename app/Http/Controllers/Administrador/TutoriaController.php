<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use DB;
use Auth;
use App\Core\Repositories\Administrador\NotasRepo;

class TutoriaController extends Controller
{
    protected $NotasRepo;
    public function __construct(NotasRepo $NotasRepo)
    {
      $this->NotasRepo = $NotasRepo;
    }

    public function register($id)
    {
      $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
      $alumno = DB::table('alumno')->where('idalumno',$id)->get();

      $notastutoria = DB::table('notatutoria')
        ->where('idalumno', $id)
        ->where('idperiodomatricula',$lastPeriodo[0]->idperiodomatricula)
        ->orderBy('idbimestre','asc')
        ->get();
      return view('tutoria.index', compact('alumno','notastutoria'));
    }
    public function store($id, Request $request)
    {
      $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
      $datehow = Date('Ymd');
      $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow); 

      if($fechanota)
      {
        $bimestre = $fechanota[0]->idbimestre;
        DB::table('notatutoria')->insert(
            [
              "apreciacion"             => $request["apreciacion$bimestre"],
              "respeto"                 => $request["respeto$bimestre"],
              "puntualidad"             => $request["puntualidad$bimestre"],
              "responsabilidad"         => $request["responsabilidad$bimestre"],
              "presentacion"            => $request["presentacion$bimestre"],
              "tardanza_justificada"    => $request["tardanza_justificada$bimestre"],
              "tardanza_injustificada"  => $request["tardanza_injustificada$bimestre"],
              "inasistencia_just"       => $request["inasistencia_just$bimestre"],
              "inasistencia_injust"     => $request["inasistencia_injust$bimestre"],
              "avance"                  => $request["avance$bimestre"],
              "materiales"              => $request["materiales$bimestre"],
              "reuniones"               => $request["reuniones$bimestre"],
              "higene"                  => $request["higene$bimestre"],
              "agenda"                  => $request["agenda$bimestre"],
              "idbimestre"              => 1,
              "idalumno"                => $id,
              "idperiodomatricula"      => $lastPeriodo[0]->idperiodomatricula,
              "idtutor"                 => Auth::user()->id,
              "created_at"              => date('Y-m-d H:i:s')
            ]
        );
      }

      return redirect()->back();
    }
    
    public function registerOptimist()
    {
        return view('tutoria.optimist');
    }

    public function registerProgrest()
    {
        return view('tutoria.progrest');
    }

}