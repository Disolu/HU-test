<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use App\Http\Requests\TipoPensionRequest;
use App\Core\Repositories\Administrador\TipoPensionRepo;

class TipoPensionController extends Controller
{
    protected $TipoPensionRepo;
    private $path = "administrador";
    private $subpath = "pensiones";

    public function __construct(TipoPensionRepo $TipoPensionRepo)
    {
        $this->TipoPensionRepo = $TipoPensionRepo;
    }

    public function index()
    {
    }

    public function create()
    {
        $tipopensiones =  $this->TipoPensionRepo->allTipoPension();
        return view("{$this->path}.{$this->subpath}.new_tipopension", compact('tipopensiones'));
    }

    public function store(TipoPensionRequest $request)
    {
      $tipopension =  $this->TipoPensionRepo->saveTipoPension($request);
      if($tipopension){
            Session::flash('message-success', 'Se registro correctamente el tipo de pensión');            
            return redirect()->route('tipopensionnew');
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
        //
    }
}
