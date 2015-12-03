<?php 
	if(Auth::user()->idrol==1)
	{
		$variable = "layouts.index";
	} 
	elseif(Auth::user()->idrol==2)
	{
		$variable = "layouts.responsable";	
	}
	elseif(Auth::user()->idrol==3)
	{
		$variable = "layouts.secretaria";	
	}
	elseif(Auth::user()->idrol==4)
	{
		$variable = "layouts.profesor";	
	}
	elseif(Auth::user()->idrol==5)
	{
		$variable = "layouts.legal";	
	}
?>
@extends("$variable")
@section('cuerpo')
<div class="box-consulta panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Matricular Alumno</h3>
	</div>
	<div class="panel-body">
		@include('alertas.request')
		{!! Form::open(array('route' => ['matricular', $id] )) !!}
		<div id="mensajes">
			<div style="display:none" class="msl alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4>Oh!, Tenemos un Problema!</h4>
				<p>No hay datos Seleccionados!</p>
			</div>
			<div style="display:none" class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4>Oh!, Tenemos un Problema!</h4>
				<p>No hay Vacantes Disponibles para ésta aula !</p>
			</div>
			<div style="display:none" class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4>¡En buena hora!</h4>
				<p>Se encontraron: <span class="num_vacantes"></span> Vacantes, para el aula seleccionada!</p>
				<p>
					<button type="submit" class="btn btn-success">Matricular Alumno</button>
				</p>
			</div>
		</div>
		<fieldset>
			<div class="form-group">
				<select name="periodo" id="cboPeriodo" class="form-control mb-md" data-bind="options: periodos, optionsText: 'nombre', optionsValue: 'idperiodomatricula', value: pediodoSeleccionado"></select>
			</div>
		</fieldset>
		
		<fieldset>
			<div class="form-group">
				<select name="sede"  id="cboSede" class="form-control mb-md" data-bind="options: sedes, optionsText: 'nombre', optionsValue: 'idsede',  optionsCaption: 'Seleccione una Sede', value: sedeSeleccionada"></select>
			</div>
		</fieldset>
		<fieldset>
			<div class="form-group">
				<select name="nivel"  id="cboNivel" class="form-control mb-md" data-bind="options: niveles, optionsText: 'nombre', optionsValue: 'idnivel',  optionsCaption: 'Seleccione un Nivel', value: nivelSeleccionado"></select>
			</div>
		</fieldset>
		<fieldset>
			<div class="form-group">
				<select name="grado"  id="cboGrado" class="form-control mb-md" data-bind="options: grados, optionsText: 'nombre', optionsValue: 'idgrado',  optionsCaption: 'Seleccione un Grado', value: gradoSeleccionado"></select>
			</div>
		</fieldset>
		<fieldset>
			<div class="form-group">
				<select name="seccion"  id="cboSeccion" class="form-control mb-md" data-bind="options: secciones, optionsText: 'nombre', optionsValue: 'idseccion',  optionsCaption: 'Seleccione una Seccion', value: seccionSeleccionado"></select>
			</div>
		</fieldset>

		<div class="col-xs-12">
			<div class="panel panel-info">
				
				<div class="col-xs-4">
					<label>Tipo de Pension</label> <br>

					<div class="btn-group" data-toggle="buttons">
						@foreach($TipoPension as $pension )
						<label class="btn btn-default  btn-sm tipopension" id="{!! $pension->idtipopension !!}">
							<input type="radio" name="alu_tipopension" autocomplete="off" value="{!! $pension->idtipopension !!} "> 
							{!! $pension->nombre !!} 
						</label>
						@endforeach
						<div class="selectPension" style="display:none">
							<div class="form-group">
								<select name="pension" id="pension" class="form-control mb-md" data-bind="value: pension"></select>
							</div>
						</div>
					</div>

				</div>
				<div class="col-xs-6">
					<label>Estado de Matricula</label> <br>
					<div class="btn-group" data-toggle="buttons">
						@foreach($EstadoMatricula as $estado )
						<label class="btn btn-default  btn-sm">
							<input type="radio" name="estado" autocomplete="off" value="{!! $estado->idestadomatricula !!}"> 
							{!! $estado->nombre !!}
						</label>
						@endforeach	
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	
	<div class="panel-footer">
		<button id="consultar" type="submit" class="btn btn-primary">Matricular</button>
	</div>
	{!! Form::close() !!}
</div>
@stop

@section('scripts')
@parent
	{!! Html::script('assets/javascripts/knockout-3.3.0.js') !!}

	<!-- KnockoutJS Mapping http://knockoutjs.com/documentation/plugins-mapping.html -->
	{!! Html::script('assets/javascripts/knockout.mapping.min.js') !!}

	<!-- jQuery Cookie -->
	{!! Html::script('assets/javascripts/jquery.cookie.js') !!}
<script type="text/javascript">
	$(document).ready(function(){
		var baseURL = "{!! config('app.urlglobal') !!}";		
		$(".tipopension").click(function(){
			var tipopension =  $(this).attr('id');			

			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getPensiones",
				data: { tipo : tipopension, sede : $("#cboSede option:selected").val(), nivel : $("#cboNivel option:selected").val()},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (data) {		    		
					$(".selectPension").show();
					console.log(data);
					var $selectPension = $("#pension");
					$selectPension.empty();
					$selectPension.append($("<option>Pensiones</option>"));

					$.each(data.pensiones, function(i, item) {
						$selectPension.append($("<option></option>").attr("value", item.idpension).text(item.monto));
					}); 

				},
				error: function (data) {
					console.log(data);
					$(".selectPension").hide();
				}
			});	    
		});
	});
</script>
<script>
	var baseURL = "{!! config('app.urlglobal') !!}";
	function VacantesFormViewModel () {
		var fo = this;

		fo.periodos = ko.observableArray([]);
		fo.pediodoSeleccionado = ko.observable(null);
		fo.sedes    = ko.observableArray([]);
		fo.sedeSeleccionada    = ko.observable(null);
		fo.niveles  = ko.observableArray([]);
		fo.nivelSeleccionado   = ko.observable(null);
		fo.grados   = ko.observableArray([]);
		fo.gradoSeleccionado   = ko.observable(null);
		fo.secciones= ko.observableArray([]);
		fo.seccionSeleccionada = ko.observable(null);
		fo.aulas    = ko.observableArray([]);
		fo.aulaSeleccionada    = ko.observable(null);

		fo.cargarperiodos = function () {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getPeriodos",
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var periodosRaw =  e.periodos;
                //limpio el arrray
                fo.periodos.removeAll();
                for (var i = 0; i < periodosRaw.length; i++) {
                	fo.periodos.push(periodosRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.cargarsedes = function () {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getSedes",
				dataType: "json",               
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var sedesRaw =  e.sedes;
                //limpio el arrray
                fo.sedes.removeAll();
                for (var i = 0; i < sedesRaw.length; i++) {
                	fo.sedes.push(sedesRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.cargarNiveles = function (sedeSeleccionada) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getNivel",
				data: {sede:sedeSeleccionada},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var nivelesRaw =  e.nivel;
                //limpio el arrray
                fo.niveles.removeAll();
                for (var i = 0; i < nivelesRaw.length; i++) {
                	fo.niveles.push(nivelesRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.sedeSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarNiveles(newValue);
			}
		});

		fo.cargarGrados = function (sede , nivel) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getGrados",
				data: {sede:sede, nivel:nivel},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var gradosRaw =  e.grado;
                //limpio el arrray
                fo.grados.removeAll();
                for (var i = 0; i < gradosRaw.length; i++) {
                	fo.grados.push(gradosRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.nivelSeleccionado.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarGrados(fo.sedeSeleccionada() ,newValue);
			}
		});

		fo.cargarSecciones = function (sede , nivel, grado) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getSecciones",
				data: {sede:sede, nivel:nivel, grado:grado},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var seccionRaw =  e.secciones;
                //limpio el arrray
                fo.secciones.removeAll();
                for (var i = 0; i < seccionRaw.length; i++) {
                	fo.secciones.push(seccionRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.gradoSeleccionado.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarSecciones(fo.sedeSeleccionada(), fo.nivelSeleccionado(), newValue);
			}
		});

		fo.cargarAulas = function (sede , nivel, grado, seccion) {
			$.ajax({
				type: "GET",
				url: baseURL + "/api/v1/getAulas",
				data: {sede:sede, nivel:nivel, grado:grado, seccion:seccion},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var aulasRaw =  e.aulas;
                //limpio el arrray
                fo.aulas.removeAll();
                for (var i = 0; i < aulasRaw.length; i++) {
                	fo.aulas.push(aulasRaw[i]);
                };
            },
            error: function (r) {
                // Luego...
            }
        });
		}

		fo.seccionSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarAulas(fo.sedeSeleccionada(), fo.nivelSeleccionado(), fo.gradoSeleccionado(), newValue);
			}
		});

		fo.guardarCookie = function (sede, nivel, grado, seccion, aula) {
			$.cookie('idsede'   , sede,   { expires: 1 , path:'/'});
			$.cookie('idnivel'  , nivel,  { expires: 1 , path:'/'});
			$.cookie('idgrado'  , grado,  { expires: 1 , path:'/'});
			$.cookie('idseccion', seccion,{ expires: 1 , path:'/'});
			$.cookie('idaula'   , aula,   { expires: 1 , path:'/'});
		}

		fo.aulaSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.guardarCookie(fo.sedeSeleccionada(), fo.nivelSeleccionado(), fo.gradoSeleccionado(), fo.seccionSeleccionada(), fo.aulaSeleccionada(),newValue);
			}
		});

		fo.consultaVacantes = function () {
			var sede = fo.sedeSeleccionada();
			alert(sede);
			var nivel= fo.nivelSeleccionado();
			var grado= fo.gradoSeleccionado();
			var seccion = fo.seccionSeleccionada();
			$.ajax({
				type: "GET",
				url: baseURL+"/api/v1/getVacantes",
				data: {sede:sede, nivel:nivel, grado:grado, seccion:seccion},
				dataType: "json",
				contentType: "application/json; charset=utf-8",
				success: function (e) {
					var num = e.vacantes;
					if (num > 0) {
						$(".num_vacantes").html(num);
						$(".alert-success").show();
						$(".alert-danger").hide();
					}else{
						$(".alert-danger").show();
						$(".alert-success").hide();
					};
				},
				error: function (){
					$(".alert-danger").hide();
					$(".alert-success").hide();
					$(".msl").show();
				}
			});
		}

		fo.matricularAlumno = function () {
			var c_dni = $.cookie('alu_dni');
			if (c_dni) {
				window.location = baseURL+"perfildealumno/"+c_dni;
			}else{
				window.location = baseURL+"/buscar";
			};
		}

		fo.cargarperiodos();
		fo.cargarsedes();       
	}    
	var viewModel = new VacantesFormViewModel();

	$(function(){
		ko.applyBindings(viewModel, $("#page-wrapper")[0]); 
	});
</script>
@stop