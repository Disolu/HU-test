<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\TipoPension;
use Auth;

class TipoPensionRepo {

    public function saveTipoPension($request)
    {
      $pension = TipoPension::create([
      'nombre'      => $request['nombre'],
      'usercreate'  => Auth::user()->id,
      'updated_at'  => ''
      ]);
    }

    public function allTipoPension()
    {
    	$pension = TipoPension::all();
    	return $pension;
    }
}