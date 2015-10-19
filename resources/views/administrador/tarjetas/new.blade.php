@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Nueva Tarjeta</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'tarjetasnew', 'method' => 'post']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">				
						{!! Form::text('nombre', null, ['class' => 'form-control input-sm mb-md', 'placeholder' => 'Nombre del nivel']) !!}
						
						<select name="idnivel" class="form-control">
							<option>Seleccione Sede</option>
							@foreach($niveles as $nivel)
							<option value="{!! $nivel->idnivel !!}"><strong>{!! $nivel->sede->nombre !!}</strong> - {!! $nivel->nombre !!}</option>	
							@endforeach
						</select>
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