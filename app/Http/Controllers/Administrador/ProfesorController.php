<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use App\Core\Entities\Nivel;
use App\Core\Entities\Usuarios;
use App\Core\Repositories\Administrador\ProfesorRepo;
use App\Http\Requests\ProfesorCursoRequest;

class ProfesorController extends Controller
{

    protected $ProfesorRepo;

    public function __construct(ProfesorRepo $ProfesorRepo)
    {
        $this->ProfesorRepo = $ProfesorRepo;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $nivel = Nivel::with('grado')->get();
        $profesores = Usuarios::where('idrol',4)->get();
        return view('administrador.profesores.asignaturas', compact('nivel','profesores'));
    }

    public function store(ProfesorCursoRequest $request)
    {
        for ($i=0; $i<count($request['curso']); $i++) { 
            //Guardar al profesor con cada curso
            $periodo  = $this->ProfesorRepo->getLastPeriodoMatricula();
            $profesor = $this->ProfesorRepo->SaveProfesorCurso($request, $request['curso'][$i], $periodo[0]->idperiodomatricula);
            
            //Una vez registrado, traigo su ID:
            $lastRegister = $this->ProfesorRepo->lastRegister();
            if(count($lastRegister) > 0)
            {
                $idcurso = $lastRegister[0]->idprofesorcurso;
                for ($i=0; $i<count($request['seccion']); $i++) { 
                    $this->ProfesorRepo->SaveProfesorSeccion($idcurso, $request['seccion'][$i]);
                }
            }
        }
            Session::flash('message-success', 'Se registro al profesor con los cursos seleccionados');            
            return Redirect::back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
