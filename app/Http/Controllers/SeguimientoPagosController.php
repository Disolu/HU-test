<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Administrador\ReportesRepo;
use DB;

class SeguimientoPagosController extends Controller
{
  protected $reporteRepo;
  public function __construct(ReportesRepo $reporteRepo)
  {
    $this->reporteRepo = $reporteRepo;
  }

  public function showSeguimientoPagos()
  {
    $periodo = DB::table('periodomatricula')->take(1)->orderBy('idperiodomatricula','desc')->get();
      $pagos = DB::table('alumno')
          ->leftJoin('alumnodeudas','alumnodeudas.idalumno','=','alumno.idalumno')
          ->leftJoin('mensualidades as m', 'alumno.idalumno', '=', 'm.idalumno')
          ->leftJoin('pension as p', 'm.idpension', '=', 'p.idpension')
          ->where('alumnodeudas.idperiodomatricula', $periodo[0]->idperiodomatricula)
          ->where('alumno.impedimento','<>','1')
          ->groupBy('alumno.idalumno')
          ->get();

      return view('administrador.pagos.seguimiento', compact('pagos'));
  }

  public function SeguimientoPagosAjax(Request $request)
  {
      $alumno = $request['idalumno'];

      $periodo = DB::table('periodomatricula')->take(1)->get();
      $alumno  = DB::table('alumnodeudas')
        ->select('p.monto as montopagar','alumnodeudas.mes as mesdeuda','status')
        ->leftJoin('mensualidades as m','alumnodeudas.idalumno','=','m.idalumno')
        ->leftJoin('pension as p','m.idpension','=','p.idpension')

        ->where('alumnodeudas.idalumno', $alumno)
        ->where('alumnodeudas.idperiodomatricula', $periodo[0]->idperiodomatricula)
        ->get();

      return response()->json($alumno)->setCallback($request->input('callback'));
  }

  public function searchSeguimientoPagos(Request $request)
  {
    $pagos = $this->reporteRepo->SeguimientoPagos($request->all());
    return view('administrador.pagos.seguimiento', compact('pagos'));
  }
}
