<?php
namespace App\Core\Repositories\Matricula;

use App\Core\Entities\PeriodoMatricula;
use App\Core\Entities\Sede;
use App\Core\Entities\Nivel;
use App\Core\Entities\Grado;
use App\Core\Entities\Seccion;
use App\Core\Entities\Aula;
use App\Core\Entities\Vacante;
use App\Core\Entities\TipoPension;
use App\Core\Entities\EstadoMatricula;
use App\Core\Entities\EstadoAlumno;

class VacanteMatriculaRepo {
    //Estado de alumno
    public function getEstadoAlumno()
    {
        return EstadoAlumno::           
        select('idestadoalumno','nombre')
        ->get();
    }

    //Tipos de Pension
    public function getTipoPension()
    {
        return TipoPension::           
        select('idtipopension','nombre')
        ->get();
    }

    //Estados de Matricula
    public function getEstadoMatricula()
    {
        return EstadoMatricula::           
        select('idestadomatricula','nombre')
        ->get();
    }

	//Verificar si el Alumno esta matriculado en el último periodo
    public function getAllPeriodos()
    {
        return PeriodoMatricula::        	
        select('idperiodomatricula','nombre')
        ->get();
    }

    //El último vacante
    public function getLastVacante()
    {
        return Vacante::           
        select('qty_vacantes','qty_matriculados')
        ->orderBy('idvacante', 'desc')
        ->take(1)
        ->get();
    }

    //El ultimo periodo
    public function getLastPeriodo()
    {
        return PeriodoMatricula::
        select('idperiodomatricula')
        ->orderBy('idperiodomatricula', 'desc')
        ->take(1)
        ->get();
    }

    //Todas las sedes
    public function getAllSedes()
    {
        return Sede::        	
        select('nombre','idsede')
        ->get();
    }

    //Niveles, por sede
    public function getNiveles($sede_id)
    {
        return Nivel::        	
        select('nombre','idnivel')
        ->where('idsede','=', $sede_id)
        ->get();
    }
    //Grados, por sede & por nivel
    public function getGrados($idsede, $idnivel)
    {
        return Grado::        	
        select('nombre','idgrado')
        ->where('idsede','=', $idsede)
        ->where('idnivel','=', $idnivel)
        ->get();
    }
    //Secciones, por sede, nivel & grado
    public function getSecciones($idsede, $idnivel, $idgrado)
    {
        return Seccion::        	
        select('nombre','idseccion')
        ->where('idsede','=', $idsede)
        ->where('idnivel','=', $idnivel)
        ->where('idgrado','=', $idgrado)
        ->get();
    }
    //Aulas, por sede, nivel, grado & seccion
    public function getAulas($idsede, $idnivel, $idgrado, $idseccion)
    {
        return Aula::        	
        select('nombre','idaula')
        ->where('idsede','=', $idsede)
        ->where('idnivel','=', $idnivel)
        ->where('idgrado','=', $idgrado)
        ->where('idseccion','=', $idseccion)
        ->get();
    }
    //Cantidad de vacantes por: Sede, Nivel, Grado, Seccion y Periodo de Matricula
    public function getVacantes($idsede, $idnivel, $idgrado, $idseccion, $idperiodo)
    {
        return Vacante::        	
        select('qty_vacantes','qty_matriculados')
        ->where('idsede','=', $idsede)
        ->where('idnivel','=', $idnivel)
        ->where('idgrado','=', $idgrado)
        ->where('idseccion','=', $idseccion)
        ->where('idperiodomatricula','=', $idperiodo)
        ->get();
    }
}
