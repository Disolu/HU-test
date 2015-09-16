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
@section('css')
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
	<!-- Specific Page Vendor CSS -->		
	<link rel="stylesheet" href="{{ asset('assets/vendor/pnotify/pnotify.custom.css') }}" />
	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css') }}" />
	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">
	<!-- Head Libs -->
	<script src="{{ asset('assets/vendor/modernizr/modernizr.js') }}"></script>
@stop

@section('cuerpo')
<div class="panel-body">
	<div class="invoice">
		<header class="clearfix">
			<div class="row">
				<div class="col-sm-6 mt-md">
					<h2 class="h2 mt-none mb-sm text-dark text-bold">
						{!! $matricula[0]->alu_nombres !!}
						{!! $matricula[0]->apellido_paterno !!}
						{!! $matricula[0]->apellido_materno !!}
					</h2>
					<h4 class="h4 m-none text-dark text-bold">Codigo: {!! $matricula[0]->codigo !!}</h4>
				</div>
				<div class="col-sm-6 text-right mt-md mb-md">
					<address class="ib mr-xlg">
						Dni: {!! $matricula[0]->dni !!}
						<br>
						{!! $matricula[0]->direccion !!}
						<br>
						Télefono: {!! $matricula[0]->telefono !!} | Celular: {!! $matricula[0]->celular !!}
						<br>
						{!! $matricula[0]->email !!}
					</address>
					<div class="ib">
						@if($matricula[0]->sexo == 'M')
						<img src="{!! asset('assets/img/man.jpg') !!}" style="width: 55px !important;" alt="{!! $matricula[0]->alu_nombres !!}">
						@elseif($matricula[0]->sexo == 'F')	
						<img src="{!! asset('assets/img/woman.jpg') !!}" style="width: 55px !important;" alt="{!! $matricula[0]->alu_nombres !!}">
						@endif
					</div>
				</div>
			</div>
		</header>
		<div class="bill-info">
			<div class="row">
				<div class="col-md-6">
					<div class="bill-to">
						<p class="h5 mb-xs text-dark text-semibold"><strong>{!! $matricula[0]->nombreperiodo !!}:</strong></p>
						<address>
							<strong>Sede:</strong> {!! $matricula[0]->sede_nombre !!}
							<br>
							<strong>Escala:</strong> Nivel: {!! $matricula[0]->nivel_nombre !!} | Grado: {!! $matricula[0]->grado_nombre !!} | Sección: {!! $matricula[0]->seccion_nombre !!}
							<br>
							<strong>Estado:</strong> {!! $alumno[0]->nombreestado !!} 
							<br>
						</address>
					</div>
				</div>
				<div class="col-md-6">
					<div class="bill-data text-right">
						<p class="mb-none">
							<span class="text-dark"><strong>Pensión mensual:</strong> ({!! $matricula[0]->tipopension_nombre !!})</span>
							<span class="value">S/. {!! $matricula[0]->monto !!}</span>
						</p>
						<p class="mb-none">
							<span class="text-dark">Fecha Matricula:</span>
							<span class="value"><?php echo substr($matricula[0]->fechamatricula, 0, -8); ?> </span>
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
							<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
						</div>
						<h2 class="panel-title">Observaciones:</h2>
					</header>
					@include('alertas.request')
					@include('alertas.success')
					@include('alertas.error')
					<div class="panel-body" style="display: block;">
						<section>
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>Tipo</th>
											<th>Detalle</th>
										</tr>
									</thead>
									@foreach($observaciones as $observacion)
									<tbody>
										@if($observacion->idtipoobservacion == 1)
										<tr class="active">
											@elseif($observacion->idtipoobservacion == 2)
											<tr class="warning">
											@elseif($observacion->idtipoobservacion == 3)
											<tr class="danger">
											@elseif($observacion->idtipoobservacion == 4)
											<tr class="dark">										
										@endif
													<td>{!! substr($observacion->created_at,0,-9) !!}</td>
													<td>{!! $observacion->nombretipoobservacion !!}</td>
													<td>{!! $observacion->observacion !!}</td>
												</tr>
											</tbody>
											@endforeach
										</table>
									</div>
								</section>
							</div>
						</section>
					</div>

					<!-- Modal Form -->
					<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
						<section class="panel">
						{!! Form::open(['route' => ['observacion',$id], 'method' => 'post']) !!}
						{!! csrf_field() !!}
							<header class="panel-heading">
								<h2 class="panel-title">Nueva Observación</h2>
							</header>
							<div class="panel-body">
									<div class="form-group mt-lg">
										<label class="col-sm-3 control-label">Titulo</label>
										<div class="col-sm-9">
											<input type="text" name="titulo" class="form-control" placeholder="Titulo de la observación" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Importancia</label>
										<div class="col-sm-9">
											<select class="form-control mb-md" name="tipoobservacion">
														<option value="1">Leve</option>
														<option value="2">Moderada</option>
														<option value="3">Grave</option>
														<option value="4">Inpedimento</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Observación</label>
										<div class="col-sm-9">
											<textarea rows="5" class="form-control" name="observacion" placeholder="Detalle de la observación" required></textarea>
										</div>
									</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-12 text-right">
										<input type="submit" class="mb-xs mt-xs mr-xs btn btn-warning" value="Enviar">
										<button class="btn btn-default modal-dismiss">Cancelar</button>
									</div>
								</div>
							</footer>
						{!!Form::close()!!}	
						</section>
					</div>
				</div>

			</div>

			<div class="text-right mr-lg">
				<a class="modal-with-form btn btn-default" href="#modalForm">Nueva Observación</a>
				<a href="{!! route('alumno', $id) !!}" class="btn btn-default">Editar Alumno</a>
				<a href="{!! route('alumnobuscar') !!}" class="btn btn-primary ml-sm">Salir</a>
			</div>
		</div>
@stop

@section('scripts')
	<!-- Vendor -->
	{!! Html::script('assets/vendor/jquery/jquery.js') !!}		
	{!! Html::script('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') !!}
	{!! Html::script('assets/vendor/bootstrap/js/bootstrap.js') !!}		
	{!! Html::script('assets/vendor/nanoscroller/nanoscroller.js') !!}		
	{!! Html::script('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}		
	{!! Html::script('assets/vendor/magnific-popup/magnific-popup.js') !!}		
	{!! Html::script('assets/vendor/jquery-placeholder/jquery.placeholder.js') !!}

	<!-- Theme Base, Components and Settings -->
	{!! Html::script('assets/javascripts/theme.js') !!}

	<!-- Theme Custom -->
	{!! Html::script('assets/javascripts/theme.custom.js') !!}

	<!-- Theme Initialization Files -->
	{!! Html::script('assets/javascripts/theme.init.js') !!}

	<!-- Examples -->
	{!! Html::script('assets/javascripts/ui-elements/examples.modals.js') !!}
@stop