@extends('layouts.index')

@section('cuerpo')
<div class="col-lg-12">
@include('alertas.request')
@include('alertas.success')
@include('alertas.error')
<header class="panel-heading">
				<h2 class="panel-title">Pagos</h2>
			</header>
{!! Form::open(['route' => 'searchSeguimientoPagos', 'method' => 'post']) !!}
{!! csrf_field() !!}			
	<div class="panel-body">
		<div class="row">
		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="periodo" id="cboPeriodo" class="form-control mb-md" data-bind="options: periodos, optionsText: 'nombre', optionsValue: 'idperiodomatricula', value: pediodoSeleccionado"></select>
				</div>
			</fieldset>
		  </div>
		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="sede"  id="cboSede" class="form-control mb-md" data-bind="options: sedes, optionsText: 'nombre', optionsValue: 'idsede',  optionsCaption: 'Seleccione una Sede', value: sedeSeleccionada"></select>
				</div>
			</fieldset>
		  </div>
		  <div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="nivel"  id="cboNivel" class="form-control mb-md" data-bind="options: niveles, optionsText: 'nombre', optionsValue: 'idnivel',  optionsCaption: 'Seleccione un Nivel', value: nivelSeleccionado"></select>
				</div>
			</fieldset>
		  </div>
			<div class="col-md-3">
		  	<fieldset>
				<div class="form-group">
					<select name="grado"  id="cboGrado" class="form-control mb-md" data-bind="options: grados, optionsText: 'nombre', optionsValue: 'idgrado',  optionsCaption: 'Seleccione un Grado', value: gradoSeleccionado"></select>
				</div>
			</fieldset>
			</div>
		</div>
	</div>
	
	<div class="panel-footer">
		<button type="submit" id="consultar" class="btn btn-primary col-md-offset-11 text-right">Consultar</button>
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
										<th>Teléfono</th>
										<th>Mensualidad</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								@foreach($pagos as $data)

									<tr>
										<td>{!! $data->fullname !!}</td>
										<td>{!! $data->codigo !!}</td>
										<td>{!! $data->telefono !!}</td>
										<td>{!! $data->monto !!}</td>
										<td>
											<!-- Modal Basic -->
											<a class="mb-xs mt-xs mr-xs modal-basic btnDetails" href="#modalBasic" data-id="{!! $data->idalumno !!}">Ver estado</a>
											
										</td>
									</tr>

								@endforeach	
								</tbody>
							</table>
							<div id="modalBasic" class="modal-block mfp-hide">
												<section class="panel">
													<header class="panel-heading">
														<h2 class="panel-title">Estado de pagos</h2>
													</header>
													<div class="panel-body">
														<div class="modal-wrapper">
															<div class="modal-text">
																PERIODO: <strong>ACTUAL</strong>
																<table class="table table-hover mb-none">
																	<thead>
																		<tr>
																			<th>Mes</th>
																			<th>Mensualidad</th>
																			<th>Estado</th>
																		</tr>
																	</thead>
																	<tbody id="tableajax">
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<footer class="panel-footer">
														<div class="row">
															<div class="col-md-12 text-right">
																<button class="btn btn-danger modal-dismiss">Crear incidencia</button>
																<button class="btn btn-default modal-dismiss">Cerrar</button>
															</div>
														</div>
													</footer>
												</section>
							</div>
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
<!-- jQuery Cookie -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.btnDetails').click(function(){
      $.ajax({
        method: "POST",
        url: "{!! route('SeguimientoPagosAjax') !!}",
        dataType: 'json',
        data:
        {
          idalumno: $(this).data('id'),
          _token: '{!! csrf_token() !!}'
        },
        success:  function (r)
        {
          if(r.length < 1)
          {
            alert('No tenemos data suficiente.');
          }
          else
          {
          	var options;
          	var estado;
            $.each(r, function(i)
            {
            	if(r[i].status == 1 ) { estado = "<span class='label label-primary'>Pagado</span>"; } else { estado = "<span class='label label-danger'>Pendiente</span>" }

            	options += "<tr>";
              options += "<td>"+r[i].mesdeuda+"</td>";
              options += "<td>"+r[i].montopagar+"</td>";
              options += "<td>"+estado+"</td>";
              options += "</tr>";
            });
            $('#tableajax').html(options);
          }
        },
        error: function()
        {
          alert('error inesperado.');
        }
      });
    });

  });
</script>

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