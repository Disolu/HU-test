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
            $cursos = $this->NotasRepo->getCursosProfesor($lastPeriodo[0]->idperiodomatricula);

            $datehow = Date('Y-m-d');
            $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow); 
            return view('administrador.notas.list', compact('cursos','fechanota'));
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
    
    public function register($grado, $idcurso, $idseccion)
    {
        $datehow = Date('Y-m-d');

        $lastPeriodo = $this->NotasRepo->getLastPeriodoMatricula();
        $alumnos = $this->NotasRepo->getAlumnos($grado, $idseccion, $lastPeriodo[0]->idperiodomatricula);
        $fechanota = $this->NotasRepo->getFechaNota($lastPeriodo[0]->idperiodomatricula, $datehow);    
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
}
