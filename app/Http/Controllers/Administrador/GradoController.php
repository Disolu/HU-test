<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GradoRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\GradoRepo;
use Session;
use Redirect;

class GradoController extends Controller
{
    private $path = "administrador";
    private $subpath = "grado";
    protected $GradoRepo;

    public function __construct(GradoRepo $GradoRepo)
    {
        $this->GradoRepo = $GradoRepo;
    }

    public function index()
    {
        $grados = $this->GradoRepo->getGrados();
        return view("{$this->path}.{$this->subpath}.index", compact('grados'));
    }

    public function create()
    {
        return view("{$this->path}.{$this->subpath}.new");
    }

    public function store(GradoRequest $request)
    {
        $grado = $this->GradoRepo->SaveGrado($request->all());
        if($grado){
            Session::flash('message-success', 'Se registro correctamente el grado');            
            return redirect()->route('grado');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');            
            return redirect()->route('gradonew');
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
        $grado = $this->GradoRepo->deleteGrado($id);
        if($grado)
        {
            Session::flash('message-success', 'El grado ha sido eliminado');  
            return redirect()->route('grado');
        }
        else{
            return redirect()->back()->withInput(); 
        }
    }
}
