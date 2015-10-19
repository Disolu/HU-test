<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NivelRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\NivelRepo;
use Session;
use Redirect;

class NivelController extends Controller
{
    private $path = "administrador";
    private $subpath = "nivel";
    protected $NivelRepo;

    public function __construct(NivelRepo $NivelRepo)
    {
        $this->NivelRepo = $NivelRepo;
    }

    public function index()
    {
        $niveles = $this->NivelRepo->getNiveles();
        return view("{$this->path}.{$this->subpath}.index", compact('niveles'));
    }

    public function create()
    {
        $sedes = $this->NivelRepo->getSedes();
        return view("{$this->path}.{$this->subpath}.new", compact('sedes'));
    }

    public function store(NivelRequest $request)
    {
        $nivel = $this->NivelRepo->SaveNivel($request->all());
        if($nivel){
            Session::flash('message-success', 'Se registro correctamente el nivel');            
            return redirect()->route('nivel');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');            
            return redirect()->route('nivelnew');
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
        $nivel = $this->NivelRepo->deleteNivel($id);
        if($nivel)
        {
            Session::flash('message-success', 'El nivel ha sido eliminado');  
            return redirect()->route('nivel');
        }
        else{
            return redirect()->back()->withInput(); 
        }
    }
}
