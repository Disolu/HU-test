<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SeccionRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\SeccionRepo;
use Session;
use Redirect;

class SeccionController extends Controller
{
    private $path = "administrador";
    private $subpath = "seccion";
    protected $SeccionRepo;

    public function __construct(SeccionRepo $SeccionRepo)
    {
        $this->SeccionRepo = $SeccionRepo;
    }

    public function index()
    {
        $secciones = $this->SeccionRepo->getSecciones();
        return view("{$this->path}.{$this->subpath}.index", compact('secciones'));
    }

    public function create()
    {
        return view("{$this->path}.{$this->subpath}.new");
    }

    public function store(SeccionRequest $request)
    {
        $seccion = $this->SeccionRepo->SaveSeccion($request->all());
        if($seccion){
            Session::flash('message-success', 'Se registro correctamente la sección');            
            return redirect()->route('seccion');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');            
            return redirect()->route('seccionnew');
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
        $seccion = $this->SeccionRepo->deleteSeccion($id);
        if($seccion)
        {
            Session::flash('message-success', 'La sección ha sido eliminada');  
            return redirect()->route('seccion');
        }
        else{
            return redirect()->back()->withInput(); 
        }
    }
}
