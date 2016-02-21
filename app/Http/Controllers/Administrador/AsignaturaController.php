<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CursoRequest;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Cursos\CursosRepo;
use Redirect;
use Session;

class AsignaturaController extends Controller
{

    protected $CursosRepo;

    public function __construct(CursosRepo $CursosRepo)
    {
        $this->CursosRepo = $CursosRepo;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        $cursos = $this->CursosRepo->getCursos();
        $order = [];
        foreach($cursos as $curso){
            if(!isset($order[$curso->grado->sede->idsede])){
                $order[$curso->grado->sede->idsede] = ['name'=>$curso->grado->sede->nombre,'niveles'=>[]];
            }

            if(!isset($order[$curso->grado->sede->idsede]['niveles'][$curso->grado->idnivel])){
                $order[$curso->grado->sede->idsede]['niveles'][$curso->grado->idnivel] = ['name'=>$curso->grado->nivel->nombre,'grados'=>[]];
            }

            if(!isset($order[$curso->grado->sede->idsede]['niveles'][$curso->grado->idnivel]['grados'][$curso->grado->idgrado])){
                $order[$curso->grado->sede->idsede]['niveles'][$curso->grado->idnivel]['grados'][$curso->grado->idgrado] = ['name'=>$curso->grado->nombre,'cursos'=>[]];
            }
            $order[$curso->grado->sede->idsede]['niveles'][$curso->grado->idnivel]['grados'][$curso->grado->idgrado]['cursos'][] = $curso;

        }

        return view('administrador.asignaturas.index', compact('order'));
    }

    public function store(CursoRequest $request)
    {
        $cursos = $this->CursosRepo->SaveCurso($request->all());

        if($cursos){
            Session::flash('message-success', 'Se registro correctamente al usuario');
            return Redirect::back();
        }
        else{
            Session::flash('message-danger', 'Ocurrio un error al validar al usuario');
            return Redirect::back()->withInput();
        }
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
        $curso = $this->CursosRepo->deleteCurso($id);
        if($curso)
        {
            Session::flash('message-success', 'La asignatura ha sido eliminado');
            return redirect()->route('asignaturas');
        }
        else{
            return redirect()->back()->withInput();
        }
    }
}
