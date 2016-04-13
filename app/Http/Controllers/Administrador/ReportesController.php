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
        return 'Matriculados_'.time();
    }
}

class ReportesController extends Controller
{
    protected $ReportesRepo;
    public function __construct(ReportesRepo $ReportesRepo)
    {
        $this->ReportesRepo = $ReportesRepo;
    }

    public function getReportegraficos(){
        $periodo = DB::table('periodomatricula')->orderBy('idperiodomatricula','desc')->take(1)->get();
        //$periodo[0]->idperiodomatricula;
        $sede = DB::table('alumnomatricula')
        ->select(

            DB::raw("(select count(*) from alumnomatricula where idsede = 1 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as sede1"),
            DB::raw("(select count(*) from alumnomatricula where idsede = 2 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as sede2"),

            DB::raw("(select count(*) from alumnomatricula where idsede = 1 and idnivel = 1 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as inicial1"),
            DB::raw("(select count(*) from alumnomatricula where idsede = 1 and idnivel = 2 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as primaria1"),
            DB::raw("(select count(*) from alumnomatricula where idsede = 1 and idnivel = 3 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as secundaria1"),

            DB::raw("(select count(*) from alumnomatricula where idsede = 2 and idnivel = 4 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as inicial2"),
            DB::raw("(select count(*) from alumnomatricula where idsede = 2 and idnivel = 5 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as primaria2"),
            DB::raw("(select count(*) from alumnomatricula where idsede = 2 and idnivel = 6 and idperiodomatricula = {$periodo[0]->idperiodomatricula}) as secundaria2")

            )
        ->where('idperiodomatricula', $periodo[0]->idperiodomatricula)
        ->take(1)
        ->get();

        $nivel1 = DB::table('nivel')->where('idsede', 1)->get();
        $nivel2 = DB::table('nivel')->where('idsede', 2)->get();

        $data = [
            'data'   => $sede,
            'nivel1' => $nivel1,
            'nivel2' => $nivel2
        ];
        return view('matricula.reportes.graficos', $data);
    }

    public function getReportegraficosdetails($nivel){
        $periodo = DB::table('periodomatricula')
        ->orderBy('idperiodomatricula','desc')
        ->take(1)
        ->get();

        $grados = DB::table('alumnomatricula')
        ->where('idperiodomatricula', $periodo[0]->idperiodomatricula)
        ->where('idnivel', $nivel)
        ->groupBy('idgrado')
        ->get();

        return view('matricula.reportes.graficosDetail', compact('nivel'));

    }

    public function getAlumnosNotas(Request $request)
    {
      $notas = DB::table('notacurso')
        ->select('c.nombre','nota_number','notacurso.created_at as registro','p.nombre as periodo')
        ->leftJoin('curso as c','c.idcurso','=','notacurso.idcurso')
        ->leftJoin('periodomatricula as p','p.idperiodomatricula','=','notacurso.idperiodomatricula')
        ->where('notacurso.idperiodomatricula',$request['idperiodo'])
        ->where('idbimestre',$request['idbimestre'])
        ->where('idalumno',$request['idalumno'])
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
      $arrayGet = [
        'filtro'    => $request->input('filtro'),
        'idperiodo' => $request->input('periodo'),
        'idsede'  => $request->input('sede'),
        'idnivel' => $request->input('nivel'),
        'idgrado' => $request->input('grado')
        ];

        $alumnos = $this->ReportesRepo->getAlumnos($arrayGet);

        if($alumnos){
            return view('matricula.reportes.alumnos', compact('alumnos'));
        }
        else{
            return $redirect->back();
        }
    }

    public function getAlumnosjson(Request $request)
    {
      $arrayGet = [
        'filtro'    => $request->input('filtro'),
        'idperiodo' => $request->input('periodo'),
        'idsede'  => $request->input('sede'),
        'idnivel' => $request->input('nivel'),
        'idgrado' => $request->input('grado')
        ];

        $alumnos = $this->ReportesRepo->getAlumnos($arrayGet);



        if($alumnos){
            return response()->json($alumnos);
        }
        else{
            return $redirect->back();
        }
    }

    public function getAlumnosExcel(Request $request, UserListExport $export)
    {
      $arrayGet = [
        'filtro'    => $request->input('filtro'),
        'idperiodo' => $request->input('periodo'),
        'idsede'  => $request->input('sede'),
        'idnivel' => $request->input('nivel'),
        'idgrado' => $request->input('grado')
        ];
      $alumnos = $this->ReportesRepo->getAlumnos($arrayGet);
      return $export->sheet('matriculados_'.time(), function($sheet) use($alumnos)
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

    public function getAlumnosPagosExcel(Request $request)
    {
        $idperiodo = $request['periodo'];
        $idsede    = $request['sede'];
        $idnivel   = $request['nivel'];
        $idgrado   = $request['grado'];
        $dni       = $request['dni'];
        $mensualidades=$request['mensualidad'];
        $periodo = DB::table('periodomatricula')->take(1)->orderBy('idperiodomatricula','desc')->get();
        $alumnos = Alumno::
            select('codigo','fullname as Alumno','Dni','Direccion','alumnodeudas.mes as Mes','p.monto','apo.p_nombres as Padre','apo.a_nombres as Madre','Telefono',
                'apo.p_telefonofijo as p1','apo.p_telefonotrabajo as p2','apo.p_celular as p3',
                'apo.m_telefonofijo as p4','apo.m_telefonotrabajo as p5','m_celular as p6')
            ->leftJoin('alumnodeudas','alumnodeudas.idalumno','=','alumno.idalumno')
            ->leftJoin('mensualidades as m', 'alumno.idalumno', '=', 'm.idalumno')
            ->leftJoin('pension as p', 'm.idpension', '=', 'p.idpension')
            ->leftJoin('alumnomatricula as am','am.idalumno','=','alumno.idalumno')
            ->leftJoin('alumnoapoderado as apo','apo.idalumno','=','alumno.idalumno')
            ->where('alumnodeudas.idperiodomatricula', $periodo[0]->idperiodomatricula)
            ->where('alumno.impedimento','<>','1');
            if($idperiodo) {
              $alumnos->where('am.idperiodomatricula','=',$idperiodo);
            }
            if ($idsede) {
              $alumnos->where('am.idsede','=',$idsede);
            }
            if ($idnivel) {
              $alumnos->where('am.idnivel','=',$idnivel);
            }
            if ($idgrado) {
              $alumnos->where('am.idgrado','=',$idgrado);
            }
            if ($dni) {
              $alumnos->where('alumno.dni','=',$dni);
            }
            if ($mensualidades) {
         $alumnos->where('alumnodeudas.mes','=',$mensualidades);
          $alumnos->where('alumnodeudas.status','=','0');
      }
      
        $alumnos = $alumnos->groupBy('alumno.idalumno')->get();

        $meses = array( '01'=> 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo',
            '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Setiembre', '10' => 'Octubre',
            '11' => 'Noviembre', '12' => 'Diciembre'
        );

        $newalumnos = array();

        foreach ($alumnos as $alumno) {
            $alumno = $alumno['attributes'];
            $alumno['Mes'] = $meses[$alumno['Mes']];
            $alumno['Otros numeros'] = array();
            for($i = 1; $i < 6; $i++){
                if(!empty($alumno['p'.$i])){
                    $alumno['Otros numeros'][] = $alumno['p'.$i];
                }
                unset($alumno['p'.$i]);
            }
            $alumno['Otros numeros'] = implode(', ', $alumno['Otros numeros']);
            $newalumnos[] = $alumno;
        }

        //dd($alumnos);


        Excel::create(date('Y-m-d'), function($excel) use($newalumnos)
        {
          $excel->sheet('Pagos', function($sheet) use($newalumnos)  {
              $sheet->fromArray($newalumnos);
          });
        })->export('xls');
        return Redirect::back();
    }
}
