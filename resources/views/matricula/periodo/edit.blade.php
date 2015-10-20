@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Actualizar Periodo</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::model($periodo[0], ['route' => ['updateperiodo', $periodo[0]->idperiodomatricula], 'method' => 'PUT']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">		
						{!! Form::text('nombre', null, ['class' => 'form-control input-sm mb-md']) !!}
						
						{!! Form::text('inicio', null, ['class' => 'form-control input-sm mb-md']) !!}
						
						{!! Form::text('fin', null, ['class' => 'form-control input-sm mb-md']) !!}
					</div>					
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success" OnClick="if (! confirm('¿Estás seguro que deseas actualizar los datos?, no olvides rellenar todos los campos')) return false;">Actualizar</button>
					<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
				</p>
			{!! Form::close() !!}
		</div>
	</section>
</div>
@endsection