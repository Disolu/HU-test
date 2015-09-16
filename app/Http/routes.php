<?php

//RUTAS LIBRES, CON LOGIN
Route::group( ['middleware' => ['auth'], 'prefix'=>'alumno'], function() {
	//REPORTES
	Route::post('reportes', ['as' => 'reportesAlumnos', 'uses' => 'Administrador\ReportesController@getAlumnos']);
	Route::get('reportesexcel/{periodo}/{sede}/{nivel}/{grado}/{seccion}', ['as' => 'reportesexcel', 'uses' => 'Administrador\ReportesController@getAlumnosExcel']);

	//OBSERVACION
	Route::get('observacion/{id}', ['as' => 'observacion', 'uses' => 'Alumno\ObservacionController@show'])->where('id', '[0-9]+');
	Route::post('observacion/{id}', ['as' => 'observacion', 'uses' => 'Alumno\ObservacionController@store'])->where('id', '[0-9]+');
	
	//Archivos Alumnos PDF
	Route::get('pdfcompromiso/{id}/{periodo}', ['as' => 'compromisoPdf', 'uses' => 'PdfController@compromiso'])->where('id', '[0-9]+');
	Route::get('pdfpreferencial/{id}/{periodo}', ['as' => 'preferencialPdf', 'uses' => 'PdfController@anexoPreferencial'])->where('id', '[0-9]+');
	Route::get('pdfespecial/{id}/{periodo}', ['as' => 'especialPdf', 'uses' => 'PdfController@anexoEspecial'])->where('id', '[0-9]+');

	//Ver detalles del alumno, step 2 matricula
	Route::get('/{id}', ['as' => 'alumnodetalle', 'uses' => 'Matricula\AlumnosController@show'])->where('id', '[0-9]+');
	Route::post('saveArchivosDataUsers/{id}', ['as' => 'saveArchivosDataUsers', 'uses' => 'Matricula\AlumnoUploadController@saveArchivosDataUsers'])->where('id', '[0-9]+');
	//Buscando al alumno
	Route::get('buscar', ['as' => 'alumnobuscar', 'uses' => 'Matricula\AlumnosController@buscar']);
	Route::post('buscar', ['as' => 'alumnobuscar', 'uses' => 'Matricula\AlumnosController@getAlumno']);
	//Nombre del alumno
	Route::get('name', ['as' => 'name', 'uses' => 'Matricula\AlumnosController@getNameAlumno']);
	
	//Editar Alumno
	Route::get('editar/{id}', ['as' => 'alumno', 'uses' => 'Matricula\AlumnosController@edit'])->where('id', '[0-9]+');
	Route::put('editar/{id}', ['as' => 'updatealumno', 'uses' => 'Matricula\AlumnosController@update'])->where('id', '[0-9]+');

	//Consultar Vacante para un alumno existente
	Route::get('searchvacante/{id}', ['as' => 'searchvacante', 'uses' => 'Matricula\VacanteController@viewVacante'])->where('id', '[0-9]+');
	Route::get('vacante', ['as' => 'vacante', 'uses' => 'Matricula\VacanteController@getVacante']);
	//Consultar Vacante para un alumno nuevo
	Route::get('searchvacantes', ['as' => 'searchvacantes', 'uses' => 'Matricula\VacanteController@viewVacantes']);
	
	//CRUD alumno
	Route::get('matricular/{id}', ['as' => 'matricular', 'uses' => 'Matricula\AlumnosController@showMatricula'])->where('id', '[0-9]+');
	Route::post('matricular/{id}', ['as' => 'matricular', 'uses' => 'Matricula\AlumnosController@registerMatricula'])->where('id', '[0-9]+');
	
	//Matricular Alumno
	Route::get('matricula', ['as' => 'matricula', 'uses' => 'Matricula\AlumnosController@showNewMatricula']);

	//Vista para la ruta inicial.
	Route::get('/', function () { return view('administrador.index'); });

	//API para la consulta de vacantes
	Route::group( ['middleware' => ['auth'], 'prefix'=>'api/v1'], function() {
		// Cargardores de Data para Consulta de Vacantes
	    Route::get('getPeriodos','Matricula\VacanteController@getPeriodos');
	    Route::get('getSedes', 'Matricula\VacanteController@getSedes');
	    Route::get('getNivel', 'Matricula\VacanteController@getNivel');
	    Route::get('getGrados', 'Matricula\VacanteController@getGrados');	    
	    Route::get('getSecciones', 'Matricula\VacanteController@getSecciones');	 
	    Route::get('getAulas', 'Matricula\VacanteController@getAulas');
	    Route::get('getVacantes', 'Matricula\VacanteController@getVacantes');	

	    // Respuesta para la consulta de alumnos
	    Route::get('responsebuscar', ['as' => 'responsebuscar', 'uses' => 'Matricula\AlumnosController@getAlumno']);
	    Route::get('getAlumnoByID', 	['as' => 'getOtherDataByID', 'uses' => 'Matricula\AlumnosController@getAlumnoByID']);    
	    Route::get('getApoderadosByID', ['as' => 'getApoderadosByID','uses' => 'Matricula\AlumnosController@getApoderadosByID']); 
	    Route::get('getOtherDataByID',  ['as' => 'getOtherDataByID', 'uses' => 'Matricula\AlumnosController@getOtherDataByID']);    

	    //Registrar alumno
	    Route::get('addAlumno', 'Matricula\AlumnosController@addAlumno');

	    //Traer las pensiones con filtros
		Route::get('getPensiones',  ['as' => 'getPensiones', 'uses' => 'Administrador\PensionController@getPensiones']);    	    
    });

});

//ADMINISTRADOR
Route::group( ['middleware' => ['auth','administrador'], 'prefix'=>'admin'], function() {

	Route::get('/', function () {
	    return view('administrador.index');
	});
	Route::get('pension', ['as' => 'pension', 'uses' => 'Administrador\PensionController@index']);
	Route::post('pension', ['as' => 'pension', 'uses' => 'Administrador\PensionController@create']);
	//Reportes
	Route::get('reportes', ['as' => 'reportes', 'uses' => 'Administrador\ReportesController@getAlumnosxSeccion']);
	Route::resource('usuarios', 'Administrador\UsuariosController', ['as' => 'usuarios']);
});

//AREA RESPONSABLE
Route::group( ['middleware' => ['auth','responsable'], 'prefix'=>'responsable'], function() {
	Route::get('/', function () {
	    return view('responsable.index');
	});
});

//AREA PROFESOR
Route::group( ['middleware' => ['auth','profesor'], 'prefix'=>'profesor'], function() {
	Route::get('/', function () {
	    return view('profesor.index');
	});
});

//AREA SECRETARIA
Route::group( ['middleware' => ['auth','secretaria'], 'prefix'=>'secretaria'], function() {
	Route::get('/', function () {
	    return view('secretaria.index');
	});
});

//AREA LEGAL
Route::group( ['middleware' => ['auth','legal'], 'prefix'=>'legal'], function() {
	Route::get('/', function () {
	    return view('legal.index');
	});
});

//LOGIN
Route::get('/', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('auth/login', ['middleware' => 'guest', 'as' => 'login', 'uses' => 'LoginController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'LoginController@getLogout']);
