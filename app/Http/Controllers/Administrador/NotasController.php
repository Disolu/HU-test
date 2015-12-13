<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PeriodoNotasRequest;
use App\Http\Requests\RegistroNotasRequest;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use App\Core\Repositories\Administrador\NotasRepo;
use App\Core\Entities\Cursos;
use App\Core\Entities\NotaCurso;
use DB;
use Auth;

class NotasController extends Controller
{
    protected $NotasRepo;
    public function __construct(NotasRepo $NotasRepo)
    {
        $this->NotasRepo = $NotasRepo;
    }

    public function index()
    {
        $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
        if(count($lastPeriodo) > 0)
        {
          $cursospe = DB::table('profesorcurso as pc')
            ->select('pc.idprofesorcurso','cu.idcurso','cu.nombre','ps.idseccion')
            ->leftJoin('curso as cu','cu.idcurso','=','pc.idcurso')
            ->leftJoin('profesorseccion as ps','ps.idprofesorcurso','=','pc.idprofesorcurso')
            ->where('pc.idperiodomatricula',$lastPeriodo[0]->idperiodomatricula)
            ->where('pc.iduser', Auth::user()->id)
            ->groupBy('pc.idprofesorcurso')
            ->get();
          $tutorias = DB::table('profesortutoria as pt')
            ->select('s.nombre as seccion','s.idseccion as idsection','g.nombre as grado','n.nombre as nivel','sd.nombre as sede')
              ->leftJoin('seccion as s','s.idseccion','=','pt.idseccion')
              ->leftJoin('grado as g','g.idgrado','=','s.idgrado')
              ->leftJoin('nivel as n','n.idnivel','=','g.idnivel')
              ->leftJoin('sede as sd','sd.idsede','=','n.idsede')
              ->where('pt.idperiodomatricula',$lastPeriodo[0]->idperiodomatricula)
              ->where('pt.idprofesor', Auth::user()->id)
              ->get();
          $datehow = Date('Ymd');
          $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow); 
          return view('administrador.notas.list', compact('tutorias','cursospe','fechanota'));
        }
        else
        {
            return view('matricula.periodo.not');
        }
    }

    public function create()
    {
        $bimestres = $this->NotasRepo->getBimestre();
        $periodonotas = $this->NotasRepo->periodoNotas();
        return view('administrador.notas.index',compact('bimestres','periodonotas'));
    }

    public function store(PeriodoNotasRequest $request)
    {
        $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
        $fechanotas = $this->NotasRepo->SaveFechaNota($request->all(), $lastPeriodo[0]->idperiodomatricula);

        if($fechanotas){
            Session::flash('message-success', 'Se registro correctamente las fechas para subir las notas');            
            return Redirect::back();   
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar los campos');            
            return Redirect::back()->withInput();   
        }
    }
    
    public function register($idcurso, $idseccion)
    {
        $datenow = Date('Ymd');
        $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
        $tutoria = DB::table('profesortutoria')
          ->where('idseccion',$idseccion)
          ->where('idperiodomatricula', $lastPeriodo[0]->idperiodomatricula)
          ->where('idprofesor', Auth::user()->id)
          ->get();
        $datape = DB::table('curso')
            ->leftJoin('grado','grado.idgrado','=','curso.idgrado')
            ->where('idcurso', $idcurso)
            ->take(1)
            ->get();

        $alumnos = $this->NotasRepo->getAlumnos($idcurso, $datape[0]->idgrado, $idseccion, $lastPeriodo[0]->idperiodomatricula);
        $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datenow);
        $namecurso = Cursos::where('idcurso', $idcurso)->get();

        if(count($fechanota)>0)
        {
            return view('administrador.notas.register', compact('tutoria','alumnos','fechanota','lastPeriodo', 'idcurso','idseccion','namecurso'));
        }
        else{
            Session::flash('message-danger', ' aun no puedes subir las notas, te encuentras fuera de fecha.');            
            return Redirect::back();   
        }
    }

    public function registerNotas(RegistroNotasRequest $request)
    {
        for ($i=0; $i < count($request['idalumno']); $i++) { 
            $notaNumber = 0;
            $notaChar = 0;
            if(is_numeric($request['bimestreINota'][$i])){
                $notaNumber = $request['bimestreINota'][$i];
            }
            else{
                $notaChar = $request['bimestreINota'][$i];
            }

            $notacurso = NotaCurso::where('idalumno',$request['idalumno'][$i])
              ->where('idperiodomatricula', $request['idperiodo'])
              ->where('idcurso',$request['idcurso'])
              ->first();

            if(!$notacurso){
                $notacurso = new NotaCurso;
            }
            $notacurso->idbimestre         = $request['idbimestre'];
            $notacurso->idperiodomatricula = $request['idperiodo'];
            $notacurso->idcurso            = $request['idcurso'];
            $notacurso->idseccion          = $request['idseccion'];
            $notacurso->nota_number        = $notaNumber;
            $notacurso->nota_char          = $notaChar;
            $notacurso->idalumno           = $request['idalumno'][$i];
            $notacurso->usercreate         = Auth::user()->id;
            $notacurso->updated_at         = '';
            $notacurso->save();
        }
        Session::flash('message-success', ' La notas se han registrado con éxito.');            
        return Redirect::back();   
    }

    public function edit($id)
    {
        $bimestres = $this->NotasRepo->getBimestre();
        $periodonotas = $this->NotasRepo->showFechanotas($id);
        return view('administrador.notas.edit_periodo', compact('bimestres','periodonotas'));
    }

    public function update(Request $request, $id)
    {
        $periodonotas = $this->NotasRepo->updatePeriodoNota($request->all(), $id);

        if($periodonotas){
            Session::flash('message-success', 'Se actualizo correctamente el periodo de notas');            
            return redirect()->route('fechanotas');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al actualizar el periodo de notas');            
            return redirect()->route('fechanotas');
        }
    }

    public function destroy($id)
    {
        $fechanotas = $this->NotasRepo->deleteFechanotas($id);
        if($fechanotas)
        {
            Session::flash('message-success', 'La ha sido eliminado la fecha de nota');  
            return redirect()->route('fechanotas');
        }
        else{
            return redirect()->back()->withInput(); 
        }
    }

    public function registerTarjetaNotas()
    {
      return view('administraador.notas.newnotatarjeta');
    }
}
