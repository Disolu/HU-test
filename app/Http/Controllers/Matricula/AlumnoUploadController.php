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
        //THIS IS WRONG
        /*if ($request->file('file1')){
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
        }*/

          for($i=1; $i < 5; $i++){
            if($request->file('file'.$i)){
              $file = $request->file('file'.$i);
              $file->newname = md5(time().'_'.$i);
              $files[] = $file;
            }else{
              //this is wrong too but to much work to do
              $files[] = null;
            }
          }



          foreach ($files as $file){
            if(!empty($file) && $file != null)
            {
              //THIS IS WRONGGGG
              //$filename=$file->getClientOriginalName();
              $file->move(base_path().'/public/uploads/', $file->newname);
            }
          }

          if($archivos->isEmpty())
          {
            $archivos = new AlumnoArchivos;
              $archivos->usercreate = $request->user()->id;
              $archivos->idalumno = $id;
              $archivos->idperiodomatricula = $idperiodomatricula[0]->idperiodomatricula;
              $archivos->compromiso_url = empty($files[0])? '' : $files[0]->newname;
              $archivos->anexo_url      = empty($files[1])? '' : $files[1]->newname;
              $archivos->reciboluz_url  = empty($files[2])? '' : $files[2]->newname;
              $archivos->dni_apoderado  = empty($files[3])? '' : $files[3]->newname;
              $archivos->save();
            Session::flash('message-success', ' Archivos subidos con éxito');
            return redirect()->route('alumnodetalle', $id);
          }
          else
          {

            $archivo = AlumnoArchivos::where('idalumnoarchivos',$archivos[0]->idalumnoarchivos)->first();
            $filenames = array('compromiso_url','anexo_url','reciboluz_url','dni_apoderado');

            for($i = 0; $i < 4; $i++){
              if(!empty($files[$i])){
                $archivo->$filenames[$i] = $files[$i]->newname;
              }
            }

            $archivo->save();

            Session::flash('message-success', ' Nuevos archivos han sido subidos');
            return redirect()->route('alumnodetalle', $id);
          }

    }
}


