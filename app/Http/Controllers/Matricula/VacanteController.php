<?php

namespace App\Http\Controllers\Matricula;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Core\Repositories\Matricula\VacanteMatriculaRepo;

class VacanteController extends Controller
{
    protected $VacanteRepo;
    public function __construct(VacanteMatriculaRepo $VacanteRepo)
    {
        $this->VacanteRepo = $VacanteRepo;
    }

    //Manda a la vista para matricular al alumno existente
    public function viewVacante($id)
    {
        $TipoPension = $this->VacanteRepo->getTipoPension();
        $EstadoMatricula = $this->VacanteRepo->getEstadoMatricula();
        return view( 'matricula.vacante.index', compact('id','EstadoMatricula','TipoPension') );
    }
    //Manda a la vista para matricular a un alumno nuevo
    public function viewVacantes()
    {
        return view( 'matricula.vacante.search' );
    }
    

    public function getPeriodos(Request $request)
    {   
        $data = $this->VacanteRepo->getAllPeriodos();
        return response()->json([
            'periodos' =>  $data
            ], 200)
        ->setCallback($request->input('callback'));
    }
    
    public function getSedes(Request $request)
    {        
        $rawSedes = $this->VacanteRepo->getAllSedes();
        return response()->json([
            'sedes' =>  $rawSedes
            ],
            200)
        ->setCallback($request->input('callback'));
    }  
    
    public function getNivel(Request $request)
    {
        $sede_id = $_GET['sede'];
        $nivel = $this->VacanteRepo->getNiveles($sede_id);
        return response()->json([
            'nivel' =>  $nivel
            ], 200)
        ->setCallback($request->input('callback'));
    }

    public function getGrados(Request $request)
    {
        $idsede = $_GET['sede'];
        $idnivel = $_GET['nivel'];
        $grados = $this->VacanteRepo->getGrados($idsede, $idnivel);
        return response()->json([
            'grado' =>  $grados
            ], 200)
        ->setCallback($request->input('callback'));
    }
    
    public function getSecciones(Request $request)
    {
        $idsede = $_GET['sede'];
        $idnivel = $_GET['nivel'];
        $idgrado = $_GET['grado'];
        $secciones = $this->VacanteRepo->getSecciones($idsede, $idnivel, $idgrado);
        return response()->json([
            'secciones' =>  $secciones
            ], 200)
        ->setCallback($request->input('callback'));
    }
    
    public function getAulas(Request $request)
    {
        $idsede = $_GET['sede'];
        $idnivel = $_GET['nivel'];
        $idgrado = $_GET['grado'];
        $idseccion = $_GET['seccion'];

        $aulas = $this->VacanteRepo->getAulas($idsede, $idnivel, $idgrado, $idseccion);
        return response()->json([
            'aulas' =>  $aulas
            ], 200)
        ->setCallback($request->input('callback'));
    }

    public function getVacantes(Request $request)
    {
        $idsede    = $_GET['sede'];
        $idnivel   = $_GET['nivel'];
        $idgrado   = $_GET['grado'];
        $idseccion = $_GET['seccion'];
        
        //Recoge el ultimo periodo disponible
        $periodo = $this->VacanteRepo->getLastPeriodo();
        //Recoge las vacantes, filtrados por los parametros
        $fofi = $this->VacanteRepo->getVacantes($idsede, $idnivel, $idgrado, $idseccion, $periodo[0]->idperiodomatricula);
        //Vacantes disponibles
        $vacantes = ($fofi[0]->qty_vacantes - $fofi[0]->qty_matriculados);
        //Enviamos la cantidad de vacantes por json
        return response()->json([
           'vacantes' =>  $vacantes
           ], 200)
        ->setCallback($request->input('callback'));
    }

}
