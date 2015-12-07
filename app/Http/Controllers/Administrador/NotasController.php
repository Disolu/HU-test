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
            /*
            $cursospe = DB::table('profesorcurso as pc')
                ->select('pc.idprofesorcurso','cu.idcurso','cu.nombre as curso','sede.nombre as sede','sede.idsede','nivel.idnivel','nivel.nombre as nivel','grado.nombre as grado','grado.idgrado','s.nombre as seccion','s.idseccion',
                DB::raw("(select count(*) from alumnomatricula where idseccion =  ps.idseccion and idperiodomatricula = {$lastPeriodo[0]->idperiodomatricula} ) as qty"))
                ->join('curso as cu','cu.idcurso','=','pc.idcurso')
                ->join('profesorseccion as ps','ps.idprofesorcurso','=','pc.idprofesorcurso')
                ->join('seccion as s','s.idseccion','=','ps.idseccion')
                ->join('sede','sede.idsede','=','s.idsede')
                ->join('nivel','nivel.idnivel','=','s.idnivel')
                ->join('grado','grado.idgrado','=','s.idgrado')
                ->where('pc.idperiodomatricula',$lastPeriodo[0]->idperiodomatricula)
                ->where('pc.iduser', Auth::user()->id)
                ->groupBy('pc.idprofesorcurso')
                ->get();
            */

            $datehow = Date('Y-m-d');
            $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow); 
            return view('administrador.notas.list', compact('cursospe','fechanota'));
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
            return view('administrador.notas.register', compact('alumnos','fechanota','lastPeriodo', 'idcurso','idseccion','namecurso'));
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
            DB::table('notacurso')->insert([
                [
                'idbimestre'         => $request['idbimestre'], 
                'idperiodomatricula' => $request['idperiodo'],
                'idcurso'            => $request['idcurso'],
                'idseccion'          => $request['idseccion'],
                'nota_number'        => $notaNumber,
                'nota_char'          => $notaChar,
                'idalumno'           => $request['idalumno'][$i],
                'usercreate'         => Auth::user()->id,
                'updated_at'         => ''
                ],
            ]);
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
