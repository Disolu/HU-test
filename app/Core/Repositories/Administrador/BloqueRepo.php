<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Tarjeta;
use App\Core\Entities\Bloque;
use App\Core\Entities\TarjetaBloqueCriterio;
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
  
  public function lastTarjeta()
  {
    return Bloque::orderby('created_at','DESC')->take(1)->get();
  }

  public function SaveBloque($request)
  {
    $tarjeta = Bloque::create([
      'nombre' => $request['nombre'],
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $tarjeta;
  }
  public function SaveCriterio($data)
  {
    $tarjeta = TarjetaBloqueCriterio::create([
      'criterio' => $data['criterio'],
      'idtarjetabloque' => $data['idtarjetabloque'],
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $tarjeta;
  }
}