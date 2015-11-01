<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InformesRequest;
use App\Http\Requests\InformesSearchRequest;
use App\Core\Repositories\InformesRepo;
use Session;
class InformesController extends Controller
{
    private $path = "informe";
    protected $informesRepo;

    public function __construct(InformesRepo $informesRepo)
    {
        $this->informesRepo = $informesRepo;
    }

    public function showInformes()
    {
        return view("{$this->path}.index");
    }

    public function registerInforme(InformesRequest $request)
    {
        $informe = $this->informesRepo->SaveInforme($request->all());

        if($informe){
            Session::flash('message-success', 'Se registro correctamente el informe');
            return redirect()->route('listInformes');
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar el registro');
            return redirect()->route('informes');
        }
    }

    public function listInformes()
    {
        $informes = $this->informesRepo->listInformes();
        return view("{$this->path}.list", compact("informes"));

    }

    public function searchInformes(InformesSearchRequest $request)
    {
        $request['sede'];
        $request['nivel'];
        $request['grado'];
    }
}
