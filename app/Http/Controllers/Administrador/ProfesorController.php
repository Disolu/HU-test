<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use App\Core\Entities\Nivel;
use App\Core\Entities\Usuarios;
use App\Core\Entities\Sede;
use App\Core\Repositories\Administrador\ProfesorRepo;
use App\Core\Repositories\Matricula\PeriodoMatriculaRepo;
use App\Http\Requests\ProfesorCursoRequest;
use DB;

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

    public function create()
    {
        $nivel = Nivel::with('grado')->get();
        $profesores = Usuarios::where('idrol',4)->get();
        $sedes = Sede::with('niveles')->get();
        return view('administrador.profesores.asignaturas', compact('sedes','nivel','profesores'));
    }

    public function store(ProfesorCursoRequest $request)
    {
      $periodo  = $this->ProfesorRepo->getLastPeriodoMatricula();
      $profesorCurso = $this->ProfesorRepo->getProfesorCurso($periodo[0]->idperiodomatricula, $request['profesor']);
            
      if(count($profesorCurso) == 0)
      {
        for ($h=0; $h < count($request['secciontutoria']); $h++) 
        { 
          DB::table('profesortutoria')->insert([
            [
            'idseccion'  => $request['secciontutoria'][$h], 
            'idprofesor' => $request['profesor'],
            'idperiodomatricula' => $periodo[0]->idperiodomatricula,
            'created_at' => date('Y-m-d H:i:s')
            ]
          ]);
        }
        for ($i=0; $i< count($request['curso']); $i++) {
          $curso = $request['curso'][$i];
          $this->ProfesorRepo->SaveProfesorCurso($request, $request['curso'][$i], $periodo[0]->idperiodomatricula);
          //Una vez registrado, traigo su ID:
          $lastRegister = $this->ProfesorRepo->lastRegister();
          for ($j=0; $j<count($request["seccion_$curso"]); $j++)
          { 
            $this->ProfesorRepo->SaveProfesorSeccion($lastRegister[0]->idprofesorcurso, $request["seccion_$curso"][$j]);
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
        for ($h=0; $h < count($request['secciontutoria']); $h++) 
        { 
          DB::table('profesortutoria')->insert([
            [
            'idseccion'  => $request['secciontutoria'][$h], 
            'idprofesor' => $request['profesor'],
            'idperiodomatricula' => $periodo[0]->idperiodomatricula,
            'created_at' => date('Y-m-d H:i:s')
            ]
          ]);
        }
      }
      Session::flash('message-success', 'Se registro al profesor con los cursos seleccionados');            
      return Redirect::route('showprofesor');
    }

    public function show()
    {
        $periodomatricula = $this->PeriodoMatriculaRepo->getLastPeriodoMatricula();

        $uniqueProfesores = $this->ProfesorRepo->getUniqueProfesores($periodomatricula[0]->idperiodomatricula);

        $profesores = $this->ProfesorRepo->getProfesorAsignaturas($periodomatricula[0]->idperiodomatricula);
        return view('administrador.profesores.list', compact('uniqueProfesores','profesores'));
    }

    public function destroy($id)
    {
        $profesor = $this->ProfesorRepo->deleteRelacion($id);
        if($profesor)
        {
            Session::flash('message-success', 'El curso y las secciones asignadas han sido eliminadas');
            return redirect()->route('showprofesor');
        }
        else{
            return redirect()->back(); 
        }
    }

    public function destroySeccion($id)
    {
        $profesor = $this->ProfesorRepo->deleteSeccion($id);
        if($profesor)
        {
            Session::flash('message-success', 'La sección asignada han sido eliminada');
            return redirect()->route('showprofesor');
        }
        else{
            return redirect()->back();
        }
    }

}
