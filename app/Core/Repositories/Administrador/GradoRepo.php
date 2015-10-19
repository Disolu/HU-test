<?php
namespace App\Core\Repositories\Administrador;
use App\Core\Entities\Grado;
use Auth;

class GradoRepo {
   
  public function getGrados()
  {
    $grados = Grado::all();
    return $grados;
  }

	public function SaveGrado($request)
	{
    $grado = Grado::create([
      'nombre' => $request['nombre'],
      'idnivel'=> $request['nivel'],
      'idsede' => $request['sede'],
      'usercreate' => Auth::user()->id,
      'updated_at' => ''
    ]);
    return $grado;
	}

  public function deleteGrado($id)
    {
        return Grado::where('idgrado', $id)->delete();
    }
}