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
						{!! $alumnos[0]->fullname !!}
					</h2>
					<h4 class="h4 m-none text-dark text-bold">Codigo: {!! $alumnos[0]->codigo !!}</h4>
				</div>
				<div class="col-sm-6 text-right mt-md mb-md">
					<address class="ib mr-xlg">
						Dni: {!! $alumnos[0]->dni !!}
						<br>
						{!! $alumnos[0]->direccion !!}
						<br>
						Télefono: {!! $alumnos[0]->telefono !!} | Celular: {!! $alumnos[0]->celular !!}
						<br>
						{!! $alumnos[0]->email !!}
					</address>
				</div>
			</div>
		</header>
	
		<!-- Modal Form -->
		<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
			<section class="panel">
			{!! Form::open(['route' => ['SeguimientoIncidencia',$alumnos[0]->idalumno], 'method' => 'post']) !!}
			{!! csrf_field() !!}
				<header class="panel-heading">
					<h2 class="panel-title">Nueva Incidencia</h2>
				</header>

				<div class="panel-body">
						<div class="form-group mt-lg">
							<label class="col-sm-3 control-label">Titulo</label>
							<div class="col-sm-9">
								<input type="text" name="titulo" class="form-control" placeholder="Titulo" required/>
							</div>
						</div>
						<!--
						<div class="form-group">
							<label class="col-sm-3 control-label">Importancia</label>
							<div class="col-sm-9">
								<select class="form-control mb-md" name="tipoincidencia">
											<option value="1">Leve</option>
											<option value="2">Moderada</option>
											<option value="3">Grave</option>
											<option value="4">Inpedimento</option>
								</select>
							</div>
						</div>
						-->
						<div class="form-group">
							<label class="col-sm-3 control-label">Incidencia</label>
							<div class="col-sm-9">
								<textarea rows="5" class="form-control" name="incidencia" placeholder="Detalle de la incidencia" required></textarea>
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

		@if($incidencias)
			<div class="bill-info">
				<div class="row">
					<section class="panel panel-featured panel-featured-primary">
						<header class="panel-heading">
							<h2 class="panel-title">Incidencias de Pagos:</h2>
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
												<th>Titulo</th>
												<th>Observación</th>
											</tr>
										</thead>
										@foreach($incidencias as $data)
										<tbody>

												@if($data->rolpe == 5)
												<tr class="danger">
												@else
												<tr class="active">
											@endif
													<td>{{ $data->titulo }}</td>
													<td>{{ $data->observacion }}</td>
											</tr>
										</tbody>
										@endforeach
									</table>
								</div>
							</section>
						</div>
					</section>
				</div>
			</div>
		@endif
		</div>

		<div class="text-right mr-lg">
			<a class="modal-with-form btn btn-default" href="#modalForm">Nueva Observación</a>
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