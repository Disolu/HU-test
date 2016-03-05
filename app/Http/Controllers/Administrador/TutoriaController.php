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
use App\Core\Entities\TarjetaBloque;
use App\Core\Entities\NotaTarjeta;
use App\Core\Entities\Cursos;
use App\Core\Entities\Alumno;
use App\Core\Entities\NotaCurso;
use App\Core\Entities\Tarjeta;

class TutoriaController extends Controller
{
    protected $NotasRepo;
    public function __construct(NotasRepo $NotasRepo)
    {
      $this->NotasRepo = $NotasRepo;
    }

    public function tutoria($idseccion)
    {
      $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
      $datehow = Date('Ymd');
      $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow); 
      
      $alumnos = DB::table('alumnomatricula')
      ->leftJoin('alumno as a','a.idalumno','=','alumnomatricula.idalumno')
      ->where('idseccion', $idseccion)
      ->where('idperiodomatricula', $lastPeriodo[0]->idperiodomatricula)
      ->get();

      $nivel   = DB::table('seccion')->where('idseccion',$idseccion)->get();
      $tarjetas = DB::table('tarjeta')->where('idnivel',$nivel[0]->idnivel)->get();
      return view('administrador.notas.tutoria', compact('alumnos','fechanota','tarjetas','idseccion'));
    }

    public function storeTutoria($id, Request $request)
    {
      $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
      $datehow = Date('Ymd');
      $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow);

      for($i=0; $i<count($request['bloque']); $i++)
      {

        $bloque = $request['bloque'][$i];
        for ($j=0; $j<count($request["criterio_$bloque"]) ; $j++) 
        {
          
          $criterio = $request["criterio_$bloque"][$j];
          for ($k=0; $k<count($request["value_$criterio"]); $k++) 
          {
            $value = explode("_", $request["value_$criterio"][$k]);
            $notatarjeta = new NotaTarjeta;
            $notatarjeta->S                  = ($value[1] == 'S')  ? 1 : 0;
            $notatarjeta->CS                 = ($value[1] == 'CS') ? 1 : 0;
            $notatarjeta->AV                 = ($value[1] == 'AV') ? 1 : 0;
            $notatarjeta->N                  = ($value[1] == 'N')  ? 1 : 0;
            $notatarjeta->idtarjeta          = $request["tarjeta"];
            $notatarjeta->idbloque           = $request['bloque'][$i];
            $notatarjeta->idbloquecriterio   = $request["criterio_$bloque"][$j];
            $notatarjeta->idbimestre         = $fechanota[0]->idbimestre;
            $notatarjeta->idperiodomatricula = $lastPeriodo[0]->idperiodomatricula;
            $notatarjeta->idtutor            = Auth::user()->id;
            $notatarjeta->idalumno           = $id;
            $notatarjeta->created_at         = date('Y-m-d H:i:s');
            $notatarjeta->updated_at = '';
            $notatarjeta->save();

            //echo "BLOQUE: ".$request['bloque'][$i] . " CRITERIO: " .$request["criterio_$bloque"][$j]. " VALUE: " . $value[1] ."<br>";
          }
        }
      }
      echo '<script type="text/javascript">'
               , 'history.go(-2);'
               , '</script>';
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
    
    public function typetarjeta($id, $tarjeta)
    {
      $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
      $datehow = Date('Ymd');
      $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow);

      $alumno = Alumno::with('matricula')->where('idalumno',$id)->first();
      //Load Tarjeta
      $tarjeta = Tarjeta::with('tarjetabloque')->where('idnivel',$alumno->matricula->idnivel)->first();

      $qnotas = NotaTarjeta::where('idtarjeta',$tarjeta->idtarjeta)
                          ->where('idalumno',$alumno->idalumno)
                          ->where('idbimestre',$fechanota[0]->idbimestre)
                          ->where('idperiodomatricula',$alumno->matricula->idperiodomatricula)
                          ->get();
      $notas = array();

      foreach ($qnotas as $nota) {
          $notas[$nota->idbloquecriterio] = $nota;
      }


      return view('tutoria.optimist', compact('alumno','tarjeta','fechanota','notas'));
    }

    public function savetarjeta($id,$tarjeta,Request $request){
        $alumno = $id;
        $datehow = Date('Ymd');
        $alumno = Alumno::with('matricula')->where('idalumno',$alumno)->first();
        $tarjeta = Tarjeta::with('tarjetabloque')->where('idnivel',$alumno->matricula->idnivel)->first();
        $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
        $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow);
        foreach($request->input('nota') as $key => $nota){
            $data = explode('-',$key);
            if(isset($nota['id'])){

                $notaTarjeta = NotaTarjeta::find($nota['id']);
            }else{
                $notaTarjeta = new NotaTarjeta();
            }
            $notaTarjeta->S = ($nota['value'] == 'S')? 1 : 0;
            $notaTarjeta->CS = ($nota['value'] == 'CS')? 1 : 0;
            $notaTarjeta->AV = ($nota['value'] == 'AV')? 1 : 0;
            $notaTarjeta->N = ($nota['value'] == 'N')? 1 : 0;
            $notaTarjeta->idtarjeta = $tarjeta->idtarjeta;
            $notaTarjeta->idbloque = $data[0];
            $notaTarjeta->idbloquecriterio = $data[1];
            $notaTarjeta->idbimestre = $fechanota[0]->idbimestre;
            $notaTarjeta->idperiodomatricula = $alumno->matricula->idperiodomatricula;
            $notaTarjeta->idtutor = Auth::user()->id;
            $notaTarjeta->idalumno = $alumno->idalumno;
            $notaTarjeta->save();
        }

      return redirect()->route('typetarjeta',[$id,$tarjeta->idtarjeta]);
    }


    public function registerProgrest($id)
    {
      dd($request->all());

      //$bloques = DB::table('')
      //NECESITO TODOS LOS BLOQUES POR NIVEL
        //NECESITO TODOS LOS CRITERIOS QUE ESTAN DENTRO DE LOS BLOQUES
      //NECESITO A LOS ALUMNOS.
      $alumno = DB::table('alumno')->where('idalumno',$id)->get();
      return view('tutoria.progrest', compact('alumno'));
    }

}