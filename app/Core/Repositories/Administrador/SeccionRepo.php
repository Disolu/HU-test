<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Seccion;
use Auth;

class SeccionRepo {
   
	public function getSecciones()
	{
	  $secciones = Seccion::all();
	  return $secciones;
	}

	public function SaveSeccion($request)
	{
    $seccion = Seccion::create([
      'nombre' => $request['nombre'],
      'idsede' => $request['sede'],
      'idnivel'=> $request['nivel'],
      'idgrado'=> $request['grado'],
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $seccion;
	}	

  public function deleteSeccion($id)
    {
        return Seccion::where('idseccion', $id)->delete();
    }
}