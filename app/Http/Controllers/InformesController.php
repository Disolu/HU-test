<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InformesRequest;
use App\Http\Requests\InformesSearchRequest;
use App\Core\Repositories\InformesRepo;
use Session;
use DB;

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
        $idsede    = $request->input('sede');
        $idnivel   = $request->input('nivel');
        $idgrado   = $request->input('grado');

        $informes = $this->informesRepo->getSearchInforme($idsede, $idnivel, $idgrado);
        
        if($informes){
            return view("{$this->path}.list", compact('informes','idsede','idnivel','idgrado'));
        }
        else{
            return $redirect->back();
        }
    }

    public function searchInformesvsMatricula(Request $request)
    {
        $idperiodo = $request->input('periodo');

        $vs = $this->informesRepo->searchInformesvsMatricula($idperiodo);
        $periodos = $this->informesRepo->allPeriodos();

        if($vs){
            return view("{$this->path}.vs", compact('vs','periodos'));
        }
        else{
            return $redirect->back();
        }
    }

    public function showMatriculaInformes()
    {
        $periodos = $this->informesRepo->allPeriodos();
        $vs = $this->informesRepo->MatriculaVSInformes();
        return view("{$this->path}.vs", compact("vs",'periodos'));
    }

    public function home()
    {
      $query = DB::table('informes')
      ->selectRaw(
       "DATE_FORMAT(created_at,'%Y%m') as mes, 
       (select count(*) from informes where idsede = 1 and DATE_FORMAT(created_at,'%Y%m') = mes) as brisas, 
       (select count(*) from informes where idsede = 2 and DATE_FORMAT(created_at,'%Y%m') = mes) as sector2")
      ->groupBy(DB::raw( "DATE_FORMAT(created_at,'%Y%m')" ) )
      ->get();

      return view('administrador.index', compact('query'));
    }

    public function searchInformesGraph(Request $request)
    {
      $query = DB::table('informes')
      ->selectRaw('count(*) as qty, DATE_FORMAT(created_at,"%Y%m") as mes');

      if($request['sede'])
      {
        $query->where('idsede', $request['sede']);
      }
      if($request['nivel'])
      {
        $query->where('idnivel', $request['nivel']);
      }
      if($request['grado'])
      {
        $query->where('idgrado', $request['grado']);
      }

      $query->groupBy(DB::raw( "DATE_FORMAT(created_at,'%Y%m')" ) );
      return view('administrador.chartInforme')->with('query',$query->get());
    }
}
