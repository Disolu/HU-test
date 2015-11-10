@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Actualizar Periodo de Notas</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => ['updatefechanotas', $periodonotas[0]->idfechanota], 'method' => 'PUT']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">
					</div>					
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Periodo de notas</label>
					<div class="col-md-6">
						<div class="input-daterange input-group" data-plugin-datepicker="">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<input type="text" class="form-control" name="start" value="{!! $periodonotas[0]->fecha_inicio !!}">
							<span class="input-group-addon">hasta</span>
							<input type="text" class="form-control" name="end" value="{!! $periodonotas[0]->fecha_fin !!}">
						</div>
					</div>
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Actualizar</button>
				</p>
			{!! Form::close() !!}
		</div>
	</section>
</div>
@endsection
