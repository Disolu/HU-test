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
use App\Core\Repositories\Matricula\PeriodoMatriculaRepo;
use App\Http\Requests\ProfesorCursoRequest;

class ProfesorController extends Controller
{

    protected $ProfesorRepo;
    protected $PeriodoMatriculaRepo;

    public function __construct(
        ProfesorRepo $ProfesorRepo,
        PeriodoMatriculaRepo $PeriodoMatriculaRepo
        )
    {
        $this->ProfesorRepo = $ProfesorRepo;
        $this->PeriodoMatriculaRepo = $PeriodoMatriculaRepo;
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
      $periodo  = $this->ProfesorRepo->getLastPeriodoMatricula();
      //PROFESOR CURSO (Verifica si el profesor ya esta registrado en el periodo actual)
      $profesorCurso = $this->ProfesorRepo->getProfesorCurso($periodo[0]->idperiodomatricula,$request['profesor']);

      if(count($profesorCurso) == 0)
      {
        for ($i=0; $i<count($request['curso']); $i++) { 
          //Guardar al profesor con cada curso
          $profesor = $this->ProfesorRepo->SaveProfesorCurso($request, $request['curso'][$i], $periodo[0]->idperiodomatricula);
          //Una vez registrado, traigo su ID:
          $lastRegister = $this->ProfesorRepo->lastRegister();
          if(count($lastRegister) > 0)
          {
              $idcurso = $lastRegister[0]->idprofesorcurso;
              for ($i=0; $i<count($request['seccion']); $i++) 
              { 
                  $this->ProfesorRepo->SaveProfesorSeccion($idcurso, $request['seccion'][$i]);
              }
          }
        }
      }
      else
      {
          $idcurso = $profesorCurso[0]->idprofesorcurso;
          for ($i=0; $i<count($request['seccion']); $i++) 
          { 
              $this->ProfesorRepo->SaveProfesorSeccion($idcurso, $request['seccion'][$i]);
          }
      }
        Session::flash('message-success', 'Se registro al profesor con los cursos seleccionados');            
        return Redirect::route('showprofesor');
    }

    public function show()
    {
        $periodomatricula = $this->PeriodoMatriculaRepo->getLastPeriodoMatricula();    
        $profesores = $this->ProfesorRepo->getProfesorAsignaturas($periodomatricula[0]->idperiodomatricula);
        return view('administrador.profesores.list', compact('profesores'));
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
        $profesor = $this->ProfesorRepo->deleteRelacion($id);
        if($profesor)
        {
            Session::flash('message-success', 'La relación ha sido eliminado');  
            return redirect()->route('showprofesor');
        }
        else{
            return redirect()->back(); 
        }
    }
}
