<?php
namespace App\Core\Repositories;
use App\Core\Entities\Informes;
use Auth;

class InformesRepo {
    public function SaveInforme($request)
    {
        return Informes::create([
            'nombres'   => $request['nombres'],
            'dni'       => $request['dni'],
            'colegio'   => $request['colegio'],
            'direccion' => $request['distrito'],
            'motivo'    => $request['motivo'],
            'idgrado'   => $request['grado'],
            'comentario'=> $request['comentario'],
            'usercreate' => Auth::user()->id,
            'updated_at' => ''
        ]);
    }
    public function listInformes()
    {
        return Informes::all();
    }
}
