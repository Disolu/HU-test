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
<div class="col-lg-12">
@include('alertas.request')
@include('alertas.success')
@include('alertas.error')
<header class="panel-heading">
				<h2 class="panel-title">Generar libretas</h2>
			</header>
{!! Form::open(['route' => 'generarlibretas', 'method' => 'GET']) !!}
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2">
		  	<fieldset>
	  			<select class="form-control mb-md" name="bimestre" required="">
						<option value="1">Bimestre I</option>
						<option value="2">Bimestre II</option>
						<option value="3">Bimestre III</option>
						<option value="4">Bimestre VI</option>
					</select>
		  	</fieldset>
		  </div>

		  <div class="col-md-2">
		  	<fieldset>
				<div class="form-group">
					<select name="sede"  id="cboSede" class="form-control mb-md" data-bind="options: sedes, optionsText: 'nombre', optionsValue: 'idsede',  optionsCaption: 'Sede', value: sedeSeleccionada" required=""></select>
				</div>
				</fieldset>
		  </div>

		  <div class="col-md-2">
		  	<fieldset>
				<div class="form-group">
					<select name="nivel"  id="cboNivel" class="form-control mb-md" data-bind="options: niveles, optionsText: 'nombre', optionsValue: 'idnivel',  optionsCaption: 'Nivel', value: nivelSeleccionado" required=""></select>
				</div>
				</fieldset>
		  </div>

		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="grado"  id="cboGrado" class="form-control mb-md" data-bind="options: grados, optionsText: 'nombre', optionsValue: 'idgrado',  optionsCaption: 'Grado', value: gradoSeleccionado" required=""></select>
				</div>
				</fieldset>
		  </div>

		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="seccion"  id="cboSeccion" class="form-control mb-md" data-bind="options: secciones, optionsText: 'nombre', optionsValue: 'idseccion',  optionsCaption: 'Sección', value: seccionSeleccionado" required=""></select>
				</div>
				</fieldset>
		  </div>
		</div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::label('Dni', 'Dni') !!}
            {!! Form::text('dni', $value = null, $attributes = array('class' => 'form-control')) !!}
        </div>
    </div>
	</div>
	
	<div class="panel-footer">
		<button type="submit" id="consultar" class="btn btn-primary ">Consultar</button>
		
	</div>
{!! Form::close() !!}

	<section class="panel">
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<div class="panel-body">
						
						<div class="table-responsive">
							<table class="table mb-none">
								<thead>
									<tr>
										<th>Nombres</th>
										<th>Codigo</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								@foreach($dataAlumnos as $data)
									<tr>
										<td>{{ $data->fullname }}</td>
										<td>{{ $data->codigo }}</td>
										<td>
											@if($nivel == 1)
												<a href="{{ route('generateOptimist', [$data->idalumno, Input::get('bimestre')])}}">Optimist</a> | 
												<a href="{{ route('generateProgrest', [$data->idalumno, Input::get('bimestre')])}}">Progreso</a>
											@elseif($nivel == 2)
												<a href="{{ route('generateOptimist', [$data->idalumno, Input::get('bimestre')])}}">Tajerta Snipe</a> | 
												<a href="{{ route('generatelibreta',  $data->idalumno)}}">Libreta</a> 
											@else
												<a href="{{ route('generateOptimist', [$data->idalumno, Input::get('bimestre')])}}">Tajerta de Valores</a> |
												<a href="{{ route('generatelibreta',  $data->idalumno)}}">Libreta</a> 
											@endif

										</td>	
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					
					</div>
				</section>
			</div>
		</div>
	</section>
</div>

@endsection

@section('scripts')
@parent
{!! Html::script('assets/javascripts/knockout-3.3.0.js') !!}
<!--knockout-->
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

		fo.seccionSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.cargarAulas(fo.sedeSeleccionada(), fo.nivelSeleccionado(), fo.gradoSeleccionado(), newValue);
			}
		});

		fo.aulaSeleccionada.subscribe(function(newValue) {
			if (newValue) {
				fo.guardarCookie(fo.sedeSeleccionada(), fo.nivelSeleccionado(), fo.gradoSeleccionado(), fo.seccionSeleccionada(), fo.aulaSeleccionada(),newValue);
			}
		});

		fo.cargarperiodos();
		fo.cargarsedes();       
	}    
	var viewModel = new VacantesFormViewModel();

	$(function(){
		ko.applyBindings(viewModel, $("#page-wrapper")[0]); 
	});
</script>
@endsection