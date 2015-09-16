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

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
				<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
			</div>

			<h2 class="panel-title">Registrar Pensión</h2>
		</header>
		<div class="panel-body">

			{!! Form::open(['route' => 'pension', 'method' => 'post']) !!}
			{!! csrf_field() !!}
			@include('alertas.success')
			@include('alertas.error')
			@include('alertas.request')
			<div class="form-group">
				<label class="col-md-3 control-label" for="inputSuccess">Tipo de Pensión</label>
				<div class="col-md-6">
					<select class="form-control mb-md" name="tipopension">
						@foreach($tipopensiones as $pension)
						<option value="{!! $pension->idtipopension !!}">{!! $pension->name !!}</option>							
						@endforeach
					</select>

					<select class="form-control mb-md" name="sede">
						<option>Seleccione Sede</option>
						@foreach($sedes as $sede)
						<option value="{!! $sede->idsede !!}">{!! $sede->sede_nombre !!}</option>							
						@endforeach
					</select>

					<select class="form-control mb-md" name="nivel">
						<option>Seleccione nivel</option>
						@foreach($niveles as $nivel)
						<option value="{!! $nivel->idnivel !!}">{!! $nivel->nivel_nombre !!}</option>							
						@endforeach
					</select>

					<select class="form-control mb-md" name="periodo">
						<option>Seleccione periodo</option>
						@foreach($periodos as $periodo)
						<option value="{!! $periodo->idperiodomatricula !!}">{!! $periodo->nombre !!}</option>							
						@endforeach
					</select>

					<input name="monto" class="form-control input-sm mb-md" type="text" placeholder="S/. Monto fijo">
				</div>					
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label" for="inputSuccess">Monto personalizado:</label>
				<div class="col-md-2">
					<input class="form-control input-sm mb-md" name="inicial" type="text" placeholder="S/. Inicial">
				</div>
				<div class="col-md-1">
					hasta 
				</div>
				<div class="col-md-2">
					<input class="form-control input-sm mb-md" name="final" type="text" placeholder="S/. Final">
				</div>
			</div>

			<p class="m-none">
				<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
			</p>
			{!!Form::close()!!}
		</div>
	</section>

	<div class="row">
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
					</div>

					<h2 class="panel-title">2do Sector</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table mb-none">
							<thead>
								<tr>
									<th>Nivel</th>
									<th>Monto</th>
									<th>Tipo Pensión</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($pensionesSede01 as $pension)
								<tr>
									<td>{!! $pension->nivel_nombre !!}</td>
									<td>{!! $pension->monto !!}</td>
									<td>{!! $pension->nametipopension !!}</td>
									<td class="actions">
										<a href="#"><i class="fa fa-pencil"></i></a>
										<a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
									</td>
								</tr>
							@endforeach	
							</tbody>
						</table>
					</div>
				</div>
			</section>
		</div>

		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
					</div>
					
					<h2 class="panel-title">Las Brisas</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table mb-none">
							<thead>
								<tr>
									<th>Nivel</th>
									<th>Periodo</th>
									<th>Creado</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
							@foreach($pensionesSede02 as $pension)
								<tr>
									<td>{!! $pension->nivel_nombre !!}</td>
									<td>{!! $pension->monto !!}</td>
									<td>{!! $pension->nametipopension !!}</td>
									<td class="actions">
										<a href="#"><i class="fa fa-pencil"></i></a>
										<a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
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
</div>	
	@stop