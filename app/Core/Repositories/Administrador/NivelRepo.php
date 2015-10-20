<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Nivel;
use App\Core\Entities\Sede;
use Auth;

class NivelRepo {
   
  public function getNiveles()
  {
    $nivel = Nivel::all();
    return $nivel;
  }

  public function getSedes()
  {
    $sede = Sede::all();
    return $sede;
  }

	public function SaveNivel($request)
	{
    $nivel = Nivel::create([
      'nombre' => $request['nombre'],
      'idsede' => $request['idsede'],
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $nivel;
	}

  public function deleteNivel($id)
  {
      return Nivel::where('idnivel', $id)->delete();
  }
}