<?php
namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;

use App\Core\Repositories\Administrador\ReportesRepo;

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

    public function getAlumnos(Request $request)
    {
        $idperiodo = $request->input('periodo');
        $idsede    = $request->input('sede');
        $idnivel   = $request->input('nivel');
        $idgrado   = $request->input('grado');

        $alumnos = $this->ReportesRepo->getAlumnos($idperiodo, $idsede, $idnivel, $idgrado);

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
}
