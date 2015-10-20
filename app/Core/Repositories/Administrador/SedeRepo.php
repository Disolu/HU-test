<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Sede;
use Auth;
class SedeRepo {
   
  public function getSedes()
  {
    $sedes = Sede::all();
    return $sedes;
  }

	public function SaveSede($request)
	{
    $sede = Sede::create([
      'nombre' => $request['nombre'],
      'sede_direccion' => $request['sede_direccion'],
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $sede;
	}

  public function deleteSede($id)
    {
        return Sede::where('idsede', $id)->delete();
    }
}