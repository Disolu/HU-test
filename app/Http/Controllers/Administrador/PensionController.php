<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use App\Http\Requests\PensionRequest;

use App\Core\Repositories\Administrador\PensionRepo;
use App\Core\Repositories\PeriodoRepo;
use App\Core\Entities\Pension;
use DB;

class PensionController extends Controller
{
    protected $PensionRepo;
    protected $PeriodoRepo;

    public function __construct(PensionRepo $PensionRepo, PeriodoRepo $PeriodoRepo)
    {
        $this->PensionRepo = $PensionRepo;
        $this->PeriodoRepo = $PeriodoRepo;
    }
    //Traer las pensiones
    public function getPensiones(Request $request)
    {
        $idtipo = $_GET['tipo'];
        $idsede = $_GET['sede'];
        $idnivel= $_GET['nivel'];

        //último periodo disponible.
        $getLastPeriodo = $this->PeriodoRepo->getLastPeriodo();
        //Las pensiones disponibles.
        $pensiones = $this->PensionRepo->getPensiones($idtipo, $idsede, $idnivel, $getLastPeriodo[0]->idperiodomatricula);

        return response()->json([
            'pensiones' =>  $pensiones
            ], 200)
        ->setCallback($request->input('callback'));
    }

    public function getPensionesUpdateAlumno(Request $request)
    {
        $idtipo  = $_GET['tipo'];
        $idnivel = $_GET['nivel'];

        $getLastPeriodo = $this->PeriodoRepo->getLastPeriodo();
        $pensiones = DB::table('pension')
        ->where('idtipopension', $idtipo)
        ->where('idnivel', $idnivel)
        ->where('idperiodomatricula', $getLastPeriodo[0]->idperiodomatricula)
        ->get();

        return response()->json([
            'pensiones' =>  $pensiones
            ], 200)
        ->setCallback($request->input('callback'));
    }

    public function index()
    {
        //Para llenar los combos
        $tipopensiones = $this->PensionRepo->getAllTipoPension();
        $sedes         = $this->PensionRepo->getAllSedes();
        $niveles       = $this->PensionRepo->getAllNiveles();
        $periodos      = $this->PensionRepo->getAllPeriodos();

        //Para llenar las tablas
        $uno = 1;
        $dos = 2;
        $pensionesSede01     = $this->PensionRepo->getAllPensiones($periodos[0]->idperiodomatricula, $uno);
        $pensionesSede02     = $this->PensionRepo->getAllPensiones($periodos[0]->idperiodomatricula, $dos);

        return view('administrador.pensiones.index', compact('tipopensiones','sedes','niveles','periodos','pensionesSede01','pensionesSede02'));
    }

    public function create(PensionRequest $request)
    {

      if( !empty($request->input('inicial')) && !empty($request->input('final')) )
      {

        for($i=$request['inicial']; $i<=$request['final']; $i=$i+5)
        {
           //Recojo todos los montos y los voy comparando 1 x uno
           $validaPension = $this->PensionRepo->getValidacionMonto($request['tipopension'], $request['nivel'], $request['sede'], $i, $request['periodo']);
          if($validaPension->isEmpty())
          {
            $pension = Pension::create([
            'idtipopension'      => $request['tipopension'],
            'idnivel'            => $request['nivel'],
            'idsede'             => $request['sede'],
            'monto'              => $i,
            'idperiodomatricula' => $request['periodo'],
            'usercreate'         => $request->user()->id
            ]);
            
          }
          else{
            Session::flash('message-danger', "El monto S/. {$validaPension[0]->monto} ya esta registrado, porfavor cambielo"); 
            return Redirect::back()->withInput();
          }          
        }
        Session::flash('message-success', 'Registro con éxito'); 
        return Redirect::back()->withInput();
      }
      else
      {
        $validaPension = $this->PensionRepo->getValidacionMonto($request['tipopension'], $request['nivel'], $request['sede'], $request['monto'], $request['periodo']);
        if($validaPension->isEmpty())
        {
            $pension = Pension::create([
            'idtipopension'      => $request['tipopension'],
            'idnivel'            => $request['nivel'],
            'idsede'             => $request['sede'],
            'monto'              => $request['monto'],
            'idperiodomatricula' => $request['periodo'],
            'usercreate'         => $request->user()->id
            ]);

          if($pension){
            Session::flash('message-success', 'Registro con éxito'); 
            return Redirect::back()->withInput();
          }
          else{
            Session::flash('message-danger', 'No se pudo registrar la pensión');    
          } 
        }
        else{
            Session::flash('message-danger', "El monto S/. {$validaPension[0]->monto} ya esta registrado, porfavor cambielo"); 
            return Redirect::back()->withInput();
        }                 
      } 
   
    }

    public function store(Request $request)
    {
        //
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
