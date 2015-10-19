<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Tarjeta;
use App\Core\Entities\Nivel;
use Auth;

class BloqueRepo {
   
  public function getBloques()
  {
    $tarjeta = Tarjeta::all();
    return $tarjeta;
  }

  public function getTarjetas()
  {
    $nivel = Tarjeta::orderBy('idnivel','desc')->get();
    return $nivel;
  }

	public function SaveTarjeta($request)
	{
    $tarjeta = Tarjeta::create([
      'nombre' => $request['nombre'],
      'idnivel' => $request['idnivel'],
      'updated_at' => ''
    ]);
    return $tarjeta;
	}
}