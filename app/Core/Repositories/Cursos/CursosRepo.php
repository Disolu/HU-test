<?php
namespace App\Core\Repositories\Cursos;
use App\Core\Entities\Cursos;

class CursosRepo {
	//Registrar Usuario
    public function SaveCurso($request)
    {
	  	$cursos = Cursos::create([
            'nombre' => $request['nombre'],
            'idgrado' => $request['grado']
        ]);
        return $cursos;
    }

    public function getCursos()
    {
		return $cursos = Cursos::with('grado')->orderBy('idcurso','desc')->get();
	}

    public function deleteCurso($id)
    {
        return Cursos::where('idcurso', $id)->delete();
    }
}
