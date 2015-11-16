<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Matricula\PeriodoMatriculaRepo;
use App\Http\Requests\PeriodoRequest;
use Auth;
use Redirect;
use Session;

class PeriodoMatriculaController extends Controller
{
    private $path = "matricula";
    private $subpath = "periodo";
    protected $PeriodoMatriculaRepo;

    public function __construct(PeriodoMatriculaRepo $PeriodoMatriculaRepo)
    {
        $this->PeriodoMatriculaRepo = $PeriodoMatriculaRepo;
    }

    public function create()
    {
        $periodos = $this->PeriodoMatriculaRepo->getPeriodos();
        return View($this->path.".".$this->subpath.".index", compact('periodos'));
    }

    public function store(PeriodoRequest $request)
    {
        $iduser = Auth::user()->id;
        $periodo = $this->PeriodoMatriculaRepo->savePeriodoMatricula($request, $iduser);
        if($periodo){
            Session::flash('message-success', 'Se registro correctamente el periodo');            
            return redirect()->route('periodo');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');            
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $periodo = $this->PeriodoMatriculaRepo->getPeriodo($id);
        return View($this->path.".".$this->subpath.".edit", compact('periodo'));
    }

    public function update(PeriodoRequest $request, $id)
    {
        $periodo = $this->PeriodoMatriculaRepo->updatePeriodo($request->all(), $id);

        if($periodo){
            Session::flash('message-success', 'Se actualizo correctamente el periodo');            
            return redirect()->route('periodo');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al actualizar al periodo');            
            return redirect()->route('periodo');
        }
    }

    public function destroy($id)
    {
        $periodo = $this->PeriodoMatriculaRepo->deletePeriodo($id);
        if($periodo)
        {
            Session::flash('message-success', 'El periodo ha sido eliminado');  
            return redirect()->route('periodo');
        }
        else{
            return redirect()->back(); 
        } 
    }
}
