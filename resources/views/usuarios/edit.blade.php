@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Editar Usuario</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::model($user, ['route' => ['updateusuarios', $user->id], 'method' => 'PUT']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">				
						{!! Form::text('nombre', null, ['class' => 'form-control input-sm mb-md']) !!}
						
						{!! Form::text('user', null, ['class' => 'form-control input-sm mb-md']) !!}
						
						{!! Form::email('email', null, ['class' => 'form-control input-sm mb-md']) !!}
						
						{!! Form::password('password', ['class' => 'form-control input-sm mb-md', 'placeholder' => '*******']) !!}						
						
						{!! Form::select('idrol', ['1' => 'Admnistrador', '2' => 'Responsable de Área', '3' => 'Secretaria', '4' => 'Profesor', '4' => 'Profesor','5'=>'Área Legal']) !!}

					</div>					
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success" OnClick="if (! confirm('¿Estás seguro que deseas actualizar los datos?, no olvides rellenar todos los campos')) return false;">Registrar</button>
					<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
				</p>
			{!! Form::close() !!}
		</div>
	</section>
</div>
@endsection