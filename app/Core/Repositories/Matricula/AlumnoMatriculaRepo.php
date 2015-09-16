<?php
namespace App\Core\Repositories\Matricula;
use App\Core\Entities\AlumnoMatricula;
use App\Core\Entities\AlumnoArchivos;

class AlumnoMatriculaRepo {
	//Verificar si el Alumno esta matriculado en el último periodo
    public function getAllDataAlumno($idalumno, $idperiodomatricula){

        return AlumnoMatricula::               
        leftJoin('alumno', 'alumnomatricula.idalumno', '=', 'alumno.idalumno')
        ->leftJoin('alumnodatos', 'alumnomatricula.idalumno', '=', 'alumnodatos.idalumno')
        ->leftJoin('periodomatricula', 'alumnomatricula.idperiodomatricula', '=', 'periodomatricula.idperiodomatricula')
        ->leftJoin('sede', 'alumnomatricula.idsede', '=', 'sede.idsede')
        ->leftJoin('nivel', 'alumnomatricula.idnivel', '=', 'nivel.idnivel')
        ->leftJoin('grado', 'alumnomatricula.idgrado', '=', 'grado.idgrado')
        ->leftJoin('seccion', 'alumnomatricula.idseccion', '=', 'seccion.idseccion')
        ->leftJoin('pension', 'alumnomatricula.idpension', '=', 'pension.idpension')
        ->leftJoin('users', 'alumnomatricula.usercreate', '=', 'users.id')
        ->leftJoin('tipopension', 'alumnomatricula.idtipopension', '=', 'tipopension.idtipopension')
        
        ->select(
            'alumnomatricula.idalumno','alumnomatricula.idperiodomatricula','alumnomatricula.idtipopension as id_tipopension',
            'alumno.nombres as alu_nombres','apellido_paterno','apellido_materno','sexo','codigo','dni','telefono','direccion','telefono','alumnomatricula.created_at as fechamatricula',
            'alumnodatos.email','celular',
            'periodomatricula.nombre as nombreperiodo',
 
            'sede_nombre',
            'nivel_nombre',
            'grado.name as grado_nombre',
            'seccion.name as seccion_nombre',
            'monto',
            'pension.monto as monto',
            'users.name as nombreusuario',
            'tipopension.name as tipopension_nombre'
            )        
        ->where('alumnomatricula.idalumno','=', $idalumno)
        ->where('alumnomatricula.idperiodomatricula','=', $idperiodomatricula)
        ->take(1)
        ->get();
    }
    //Archivos del alumno
    public function getFilesAlumno($idalumno, $idperiodomatricula){
        return AlumnoArchivos::    
        select('idalumnoarchivos','compromiso_url','anexo_url','reciboluz_url','dni_apoderado')        
        ->where('idalumno','=', $idalumno)
        ->where('idperiodomatricula','=', $idperiodomatricula)
        ->take(1)
        ->get();
    }
}
