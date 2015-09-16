<?php
namespace App\Http\Controllers\Matricula;

use App\Core\Entities\AlumnoArchivos;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Redirect;
use App\Http\Controllers\Controller;
use App\Core\Repositories\Matricula\AlumnoMatriculaRepo;
use App\Core\Repositories\Matricula\PeriodoMatriculaRepo;


class AlumnoUploadController extends Controller {

protected $AlumnoMatricula;
protected $PeriodoMatricula;

    public function __construct(
      AlumnoMatriculaRepo $AlumnoMatricula,
      PeriodoMatriculaRepo $PeriodoMatricula){
      $this->AlumnoMatricula = $AlumnoMatricula;
      $this->PeriodoMatricula = $PeriodoMatricula;
    }

    public function saveArchivosDataUsers(Request $request, $id)
    {
        $idperiodomatricula = $this->PeriodoMatricula->getLastPeriodoMatricula();
        $archivos = $this->AlumnoMatricula->getFilesAlumno($id, $idperiodomatricula[0]->idperiodomatricula);

        $files =[];
        if ($request->file('file1')){
          $files[] = $request->file('file1');
        } 
        else{
          $files[] = null;
        }
        if ($request->file('file2')){
          $files[] = $request->file('file2');
        } 
        else{
          $files[] = null;
        }
        if ($request->file('file3')){
          $files[] = $request->file('file3');
        } 
        else{
          $files[] = null;
        }
        if ($request->file('file4')){
          $files[] = $request->file('file4');    
        } 
        else{
          $files[] = null;
        }

              foreach ($files as $file){
                if(!empty($file) && $file != null)
                {
                  $filename=$file->getClientOriginalName();
                  $file->move(base_path().'/public/uploads/', $filename);                        
                }
              }

              $compromiso_url = (!empty($files[0]) ? $files[0]->getClientOriginalName() : "vacio");    
              $anexo_url      = (!empty($files[1]) ? $files[1]->getClientOriginalName() : "vacio");    
              $reciboluz_url  = (!empty($files[2]) ? $files[2]->getClientOriginalName() : "vacio");    
              $dni_apoderado  = (!empty($files[3]) ? $files[3]->getClientOriginalName() : "vacio");

          if($archivos->isEmpty())
          {
            $archivos = new AlumnoArchivos;
              $archivos->usercreate = $request->user()->id;
              $archivos->idalumno = $id;
              $archivos->idperiodomatricula = $idperiodomatricula[0]->idperiodomatricula;
              $archivos->compromiso_url = empty($files[0])? 'vacio' : $files[0]->getClientOriginalName();
              $archivos->anexo_url      = empty($files[1])? 'vacio' : $files[1]->getClientOriginalName();
              $archivos->reciboluz_url  = empty($files[2])? 'vacio' : $files[2]->getClientOriginalName();
              $archivos->dni_apoderado  = empty($files[3])? 'vacio' : $files[3]->getClientOriginalName(); 
              $archivos->save();
            Session::flash('message-success', ' Archivos subidos con éxito'); 
            return redirect()->route('alumnodetalle', $id); 
          }
          else
          {
            AlumnoArchivos::
            where('idalumnoarchivos', $archivos[0]->idalumnoarchivos)
            ->update
            ([
              'usercreate'        => $request->user()->id,
              'idalumno'          => $id,
              'idperiodomatricula'=> $idperiodomatricula[0]->idperiodomatricula,
              'compromiso_url'    => $compromiso_url,
              'anexo_url'         => $anexo_url,
              'reciboluz_url'     => $reciboluz_url,
              'dni_apoderado'     => $dni_apoderado
            ]);
            Session::flash('message-success', ' Nuevos archivos han sido subidos'); 
            return redirect()->route('alumnodetalle', $id); 
          }

    }
}

          
