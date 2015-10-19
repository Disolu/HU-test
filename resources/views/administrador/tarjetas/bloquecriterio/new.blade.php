@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Nuevo Bloque</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'sedenew', 'method' => 'post']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<div class="col-md-6">
						<label for="Nombre"><strong>Nombre del Bloque</strong></label>
						{!! Form::text('nombre', null, ['class' => 'form-control input-sm mb-md', 'placeholder' => 'Nombre del bloque']) !!}
						<hr>
						<label for="Criterio">Criterio 01: </label>
						{!! Form::text('sede_direccion', null, ['class' => 'form-control input-sm mb-md', 'placeholder' => 'Criterio 01']) !!}

						<label for="Criterio">Criterio 02: </label>
						{!! Form::text('sede_direccion', null, ['class' => 'form-control input-sm mb-md', 'placeholder' => 'Criterio 02']) !!}

						<label for="Criterio">Criterio 03: </label>
						{!! Form::text('sede_direccion', null, ['class' => 'form-control input-sm mb-md', 'placeholder' => 'Criterio 03']) !!}
					</div>
					<div class="col-md-6">
						<h5>Tarjetas</h5>
						<ul>
						@foreach($tarjetas as $tarjeta)
							<li>
							<input type="checkbox">
							
							<label for="">
								{!! $tarjeta->nivel->sede->nombre !!} | <strong>{!! $tarjeta->nivel->nombre !!}</strong> | <strong><code>{!! $tarjeta->nombre !!}</code></strong></li>
							</label>
						@endforeach
						</ul>
					</div>					
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success" OnClick="if (! confirm('¿Estás seguro que deseas hacer este registro?')) return false;">Registrar</button>
					<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
				</p>
			{!! Form::close() !!}
		</div>
	</section>
</div>
@endsection