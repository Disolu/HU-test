<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\VacanteRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\VacanteRepo;
use App\Core\Repositories\PeriodoRepo;
use Session;
use Redirect;

class VacanteController extends Controller
{
    private $path = "administrador";
    private $subpath = "vacante";
    protected $VacanteRepo;

    public function __construct(VacanteRepo $VacanteRepo, PeriodoRepo $PeriodoRepo)
    {
        $this->VacanteRepo = $VacanteRepo;
        $this->PeriodoRepo = $PeriodoRepo;
    }

    public function index()
    {
        $vacantes = $this->VacanteRepo->getVacantes();
        return view("{$this->path}.{$this->subpath}.index", compact('vacantes'));
    }

    public function create()
    {
        return view("{$this->path}.{$this->subpath}.new");
    }

    public function store(VacanteRequest $request)
    {
        $periodomatricula = $this->PeriodoRepo->getLastPeriodo();
        $seccion = $this->VacanteRepo->SaveVacantes($request->all(), $periodomatricula[0]->idperiodomatricula);
        if($seccion){
            Session::flash('message-success', 'Se registro correctamente los vacantes');            
            return redirect()->route('vacante');
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $vacante = $this->VacanteRepo->deleteVacante($id);
        if($vacante)
        {
            Session::flash('message-success', 'Los vacantes ha sido eliminados');  
            return redirect()->route('vacante');
        }
        else{
            return redirect()->back(); 
        } 
    }
}
