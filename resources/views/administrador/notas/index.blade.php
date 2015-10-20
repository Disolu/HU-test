@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Registro Periodo de Notas</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'fechanotas', 'method' => 'POST']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
				<p>Registra el periodo para subir las notas en los bimestres</p>
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">
					</div>					
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Bimestre</label>
					<div class="col-md-6">
						<select class="form-control mb-md" name="bimestre">
							<option>Seleccione bimestre</option>
							@foreach($bimestres as $data)
							<option value="{!! $data->idbimestre !!}">{!! $data->nombre !!}</option>
							@endforeach
						</select>
					</div>
				</div>
				<hr>	
				<div class="form-group">
					<label class="col-md-3 control-label">Periodo</label>
					<div class="col-md-6">
						<div class="input-daterange input-group" data-plugin-datepicker="">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<input type="text" class="form-control" name="start">
							<span class="input-group-addon">hasta</span>
							<input type="text" class="form-control" name="end">
						</div>
					</div>
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
				</p>
			{!! Form::close() !!}
		</div>
	</section>

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Periodos de Notas Registrados</h2>
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
											<th>Bimestre</th>
											<th>Inicio</th>
											<th>Fin</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									@foreach($periodonotas as $periodo)
										<tr>
											<td>{!! $periodo->bimestre->nombre !!}</td>
											<td>{!! $periodo->fecha_inicio !!}</td>
											<td>{!! $periodo->fecha_fin !!}</td>
											<td>
												<a href="{!! route('deletefechanotas', $periodo->idfechanota) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar esta fecha para registrar notas?')) return false;"><i class="fa fa-trash-o"></i></a>
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
