<?php
namespace App\Http\Controllers\Alumno;
use App\Core\Entities\Alumno;
use App\Core\Entities\AlumnoApoderado;
use App\Core\Entities\AlumnoMatricula;
use App\Core\Entities\AlumnoDatos;
use App\Core\Entities\AlumnoObservacion;

use App\Core\Repositories\Alumno\AlumnoRepo;
use App\Core\Repositories\Matricula\PeriodoMatriculaRepo;
use App\Core\Repositories\Matricula\VacanteMatriculaRepo;
use App\Core\Repositories\Matricula\AlumnoMatriculaRepo;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AlumnosObservacion;
use Session;
use Redirect;
use App\Http\Controllers\Controller;

class ObservacionController extends Controller
{
	  protected $AlumnoRepo;
	  protected $PeriodoMatriculaRepo;
	  protected $VacanteRepo;
	  protected $AlumnoMatriculaRepo;

	  public function __construct(
	    AlumnoRepo $AlumnoRepo, 
	    PeriodoMatriculaRepo $PeriodoMatriculaRepo,
	    VacanteMatriculaRepo $VacanteRepo,
	    AlumnoMatriculaRepo $AlumnoMatriculaRepo
	    )
	  {
	    $this->AlumnoRepo = $AlumnoRepo;
	    $this->PeriodoMatriculaRepo = $PeriodoMatriculaRepo;
	    $this->VacanteRepo = $VacanteRepo;
	    $this->AlumnoMatriculaRepo = $AlumnoMatriculaRepo;
	  }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(AlumnosObservacion $request, $id)
    {
      //Alumno Observacion
      $observacion = AlumnoObservacion::create([
        'idalumno'         => $id,
        'titulo'           => $request['titulo'],
        'idtipoobservacion'=> $request['tipoobservacion'],
        'observacion'      => $request['observacion'],
        'usercreate'       => $request->user()->id
        ]);

      if($observacion)
      {
        //SI LA OBSERVACION ES IGUAL A "IMPEDIMENTO", ACTUALIZAMOS EL ESTADO DEL ALUMNO
        if($request['tipoobservacion'] == 4)
        {
            Alumno::
            where('idalumno', $id)
            ->update
            ([
              "impedimento"  => 1
            ]);
        }
        Session::flash('message-success', 'Fue agregada la observación con éxito');            
        return redirect()->back();
      }
      else
      {
        Session::flash('message-danger', 'Lo sentimos ocurrio un error inesperado');            
        return redirect()->back();
      }
    }

    public function show($id)
    {
    	$periodomatricula = $this->PeriodoMatriculaRepo->getLastPeriodoMatricula();  

        $matricula 		  = $this->AlumnoMatriculaRepo->getAllDataAlumno($id, $periodomatricula[0]->idperiodomatricula);
        $alumno    		  = $this->AlumnoRepo->getAlumnoJoins($id);    
    	$observaciones 	  = $this->AlumnoRepo->getAllObservaciones($id);

    	if($matricula->isEmpty())
    	{
            Session::flash('message-danger', ' No hemos encontrado suficientes datos para mostrar la pagina solicitada, consulte con el administrador de sistemas');
            return redirect()->back();            
        }
        else
        { 
        return view('alumno.observacion',compact('observaciones','periodomatricula','matricula','alumno','observaciones','id'));
    	}
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
