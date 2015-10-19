<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TarjetaRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\TarjetaRepo;
use Session;
use Redirect;

class TarjetasController extends Controller
{
    private $path = "administrador";
    private $subpath = "tarjetas";
    protected $TarjetaRepo;

    public function __construct(TarjetaRepo $TarjetaRepo)
    {
        $this->TarjetaRepo = $TarjetaRepo;
    }

    public function index()
    {

        $tarjetas = $this->TarjetaRepo->getTarjetas();
        return view("{$this->path}.{$this->subpath}.index", compact('tarjetas'));
    }

    public function create()
    {
        $niveles = $this->TarjetaRepo->getNiveles();
        return view("{$this->path}.{$this->subpath}.new", compact('niveles'));
    }

    public function store(Request $request)
    {
        $tarjeta = $this->TarjetaRepo->SaveTarjeta($request->all());
        if($tarjeta){
            Session::flash('message-success', 'Se registro correctamente la tarjeta');            
            return redirect()->route('tarjetas');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');            
            return redirect()->route('tarjetanew');
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
        //
    }
}
