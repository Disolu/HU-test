<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Vacante;
use Auth;

class VacanteRepo {

	public function getVacantes()
	{
	  $vacantes = Vacante::with('seccion')->with('grado')->with('nivel')->with('sede')->with('periodo')->get();

	  return $vacantes;
	}

	public function SaveVacantes($request, $idperiodomatricula)
	{
    $seccion = Vacante::create([
      'qty_vacantes' => $request['qty_vacantes'],
      'idsede' => $request['sede'],
      'idnivel'=> $request['nivel'],
      'idgrado'=> $request['grado'],
      'idseccion'=> $request['seccion'],
      'idperiodomatricula'=> $idperiodomatricula,
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $seccion;
	}

  public function deleteVacante($id)
  {
      $vacante = Vacante::where('idvacante', $id)->delete();
      return $vacante;
  }
}
