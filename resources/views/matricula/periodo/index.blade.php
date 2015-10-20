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
			<h2 class="panel-title">Registro Periodos</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'periodo', 'method' => 'POST']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<strong>¡Aviso!</strong> Al registrar el nuevo periodo, este se aplicará a toda la institución con la fecha de inicio y cierre que se registre.
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-12 control-label" for="inputDefault">Nombre del periodo</label>
					<div class="col-md-12">
						<input type="text" name="nombre" class="form-control" id="inputDefault">
					</div>
				</div>

				<div class="form-group">
					<p><label for="Fecha">Fecha para el periodo</label></p>
					<div class="col-md-6">
						<div class="input-daterange input-group" data-plugin-datepicker="">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<input type="text" class="form-control" name="inicio">
							<span class="input-group-addon">hasta</span>
							<input type="text" class="form-control" name="fin">
						</div>
					</div>
				</div>
				<hr>
				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success"  OnClick="if (! confirm('¿Estás seguro que deseas registrar el periodo?')) return false;">Registrar</button>
					<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
				</p>
			{!! Form::close() !!}
		</div>
	</section>

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Periodos Registrados</h2>
		</header>
		<div class="panel-body">
					<div class="row">
				<div class="col-md-12">
					<section class="panel">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Periodo</th>
											<th>Fecha de Inicio</th>
											<th>Fecha de Fin</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
									@foreach($periodos as $periodo)
										<tr>
											<td>{!! $periodo->nombre !!}</td>
											<td>{!! $periodo->inicio !!}</td>
											<td>{!! $periodo->fin !!}</td>
											<td class="actions">
												<a href="{!! route('editperiodo', $periodo->idperiodomatricula) !!}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
												<a href="{!! route('deleteperiodo', $periodo->idperiodomatricula) !!}" class="delete-row"  onclick="if (! confirm('¿Estás seguro que deseas eliminar el periodo?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
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
	</section>
</div>
@endsection