<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SedeRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\SedeRepo;
use Session;
use Redirect;

class SedeController extends Controller
{
    private $path = "administrador";
    private $subpath = "sede";
    protected $SedeRepo;

    public function __construct(SedeRepo $SedeRepo)
    {
        $this->SedeRepo = $SedeRepo;
    }

    public function index()
    {
        $sedes = $this->SedeRepo->getSedes();
        return view("{$this->path}.{$this->subpath}.index", compact('sedes'));
    }

    public function create()
    {
        return view("{$this->path}.{$this->subpath}.new");
    }

    public function store(SedeRequest $request)
    {
        $sede = $this->SedeRepo->SaveSede($request->all());
        if($sede){
            Session::flash('message-success', 'Se registro correctamente la sede');            
            return redirect()->route('sede');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');
            return redirect()->route('sedenew');
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
        $sede = $this->SedeRepo->deleteSede($id);
        if($sede)
        {
            Session::flash('message-success', 'La sede ha sido eliminado');  
            return redirect()->route('sede');
        }
        else{
            return redirect()->back()->withInput(); 
        }
    }
}
