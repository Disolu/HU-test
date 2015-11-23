<?php
namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Artisan;
use App\Core\Repositories\Administrador\ReportesRepo;
use DB;
use Excel;
use App\Core\Entities\Alumno;

class UserListExport extends \Maatwebsite\Excel\Files\NewExcelFile {
    public function getFilename()
    {
        return 'reporteAlumnos';
    }
}

class ReportesController extends Controller
{
    protected $ReportesRepo;
    public function __construct(ReportesRepo $ReportesRepo)
    {
        $this->ReportesRepo = $ReportesRepo;
    }

    public function getAlumnosNotas(Request $request)
    {
      $notas = DB::table('notacurso')
        ->select('c.nombre','nota_number','notacurso.created_at as registro','p.nombre as periodo')

        ->leftJoin('curso as c','c.idcurso','=','notacurso.idcurso')
        ->leftJoin('periodomatricula as p','p.idperiodomatricula','=','notacurso.idperiodomatricula')

        ->where('notacurso.idperiodomatricula',$request['idperiodo'])
        ->where('idbimestre',$request['idbimestre'])
        ->get();
        
      return response()->json($notas)->setCallback($request->input('callback'));  
    }

    public function generador()
    {
        Artisan::call('payments:generate-payments');
        Session::flash('message-success', 'Se generaron los registros de pago con éxito');            
        return redirect()->back();
    }

    public function getAlumnos(Request $request)
    {
        $filtro    = $request->input('filtro');
        $idperiodo = $request->input('periodo');
        $idsede    = $request->input('sede');
        $idnivel   = $request->input('nivel');
        $idgrado   = $request->input('grado');

        $alumnos = $this->ReportesRepo->getAlumnos($idperiodo, $idsede, $idnivel, $idgrado, $filtro);

        if($alumnos){
            return view('matricula.reportes.alumnos', compact('alumnos','idperiodo','idsede','idnivel','idgrado'));
        }
        else{
            return $redirect->back();
        }
    }

    public function getAlumnosExcel($periodo, $sede, $nivel, $grado, UserListExport $export)
    {
        $alumnos = $this->ReportesRepo->getAlumnos($periodo, $sede, $nivel, $grado);
        return $export->sheet('sheetName', function($sheet) use($alumnos)
        {
            $sheet->fromArray($alumnos);
        })->export('xls');
    }

    public function getAlumnosxSede(Request $request)
    {
        $Sede01 = $this->ReportesRepo->getAlumnosxSede(1,1);
        $Sede02 = $this->ReportesRepo->getAlumnosxSede(2,1);
        echo "Cantidad de alumnos matriculados en la sede (2do Sector): ". count($Sede01)."<br>";
        echo "Cantidad de alumnos matriculados en la sede (Las Brisas): ". count($Sede02)."<br>";
    }
    
    public function getAlumnosxSeccion()
    {
        $alumnomatricula = $this->ReportesRepo->getAlumnosxSeccion();
        return view('matricula.reportes.matriculados', compact('alumnomatricula'));        
    }
    
    public function getAlumnosxGrado(Request $request)
    {
        $Sede01 = $this->ReportesRepo->getAlumnosxSede(1,1);
        $Sede02 = $this->ReportesRepo->getAlumnosxSede(2,1);
        echo "Cantidad de alumnos matriculados en la sede (2do Sector): ". count($Sede01)."<br>";
        echo "Cantidad de alumnos matriculados en la sede (Las Brisas): ". count($Sede02)."<br>";
    }

    public function getAlumnosxNivel(Request $request)
    {
        $Sede01 = $this->ReportesRepo->getAlumnosxSede(1,1);
        $Sede02 = $this->ReportesRepo->getAlumnosxSede(2,1);
        echo "Cantidad de alumnos matriculados en la sede (2do Sector): ". count($Sede01)."<br>";
        echo "Cantidad de alumnos matriculados en la sede (Las Brisas): ". count($Sede02)."<br>";
    } 

    public function getAlumnosPagosExcel()
    {
      $periodo = DB::table('periodomatricula')->take(1)->orderBy('idperiodomatricula','desc')->get();
      $alumnos = Alumno::
            select('codigo','fullname as Alumno','Dni','Direccion','p.monto','apo.p_nombres as Padre','apo.a_nombres as Madre','direccion','Telefono')
            ->leftJoin('alumnodeudas','alumnodeudas.idalumno','=','alumno.idalumno')
            ->leftJoin('mensualidades as m', 'alumno.idalumno', '=', 'm.idalumno')
            ->leftJoin('pension as p', 'm.idpension', '=', 'p.idpension')
            ->leftJoin('alumnomatricula as am','am.idalumno','=','alumno.idalumno')
            ->leftJoin('alumnoapoderado as apo','apo.idalumno','=','alumno.idalumno')

            ->where('alumnodeudas.idperiodomatricula', $periodo[0]->idperiodomatricula)
            ->where('alumno.impedimento','<>','1')
            ->groupBy('alumno.idalumno')
            ->get();

      Excel::create(date('Y-m-d'), function($excel) use($alumnos) 
      {
          $excel->sheet('Pagos', function($sheet) use($alumnos)  {
              $sheet->fromArray($alumnos);
          });
      })->export('xls');
      return Redirect::back();
    }  
}
