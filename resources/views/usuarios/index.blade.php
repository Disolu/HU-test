@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Registrar Usuarios al sistema</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'usuarios', 'method' => 'POST']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">
						<input name="nombre" class="form-control input-sm mb-md" type="text" placeholder="Nombres completos">

						<input name="user" class="form-control input-sm mb-md" type="text" placeholder="Usuario">

						<input name="email" class="form-control input-sm mb-md" type="text" placeholder="usuario@hu.edu.pe">

						<input name="password" class="form-control input-sm mb-md" type="password" placeholder="******">

						<select class="form-control mb-md" name="idrol">
							<option>Seleccione un rol</option>					
							<option value="1">Admnistrador</option>							
							<option value="2">Responsable de Área</option>							
							<option value="3">Secretaria</option>							
							<option value="4">Profesor</option>							
							<option value="5">Área Legal</option>							
						</select>
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
			<h2 class="panel-title">Usuarios Registrados</h2>
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
											<th>Nombres</th>
											<th>Usuario</th>
											<th>Email</th>
											<th>Rol</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									@foreach($usuarios as $usuario)
										<tr>
											<td>{!! $usuario->nombre !!}</td>
											<td>{!! $usuario->user !!}</td>
											<td>{!! $usuario->email !!}</td>
											<td>{!! $usuario->rol->nombre !!}</td>
											<td class="actions">
												<a href="{!! route('editusuarios', $usuario->id) !!}"><i class="fa fa-pencil"></i></a>
												<a href="{!! route('deleteusuario', $usuario->id) !!}" OnClick="if (! confirm('¿Estás seguro que deseas eliminar al usuario?')) return false;"> 
													<i class="fa fa-trash-o"></i>
												</a>
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