@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Grados Registrados</h2>
			<div class="text-right">
				<a href="{!! route('gradonew') !!}" class="btn btn-primary text-right" onclick="if (! confirm('¿Estás seguro que deseas agregar un nueva grado?, esto afectará a toda la institución.')) return false;"><i class="glyphicon-plus"></i> Agregar nuevo</a>
			</div>
		</header>
		<div class="panel-body">
		@include('alertas.success')
			<div class="row">
				<div class="col-md-12">
					<section class="panel">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Nivel</th>
											<th>Sede</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									@foreach($grados as $grado)
										<tr>
											<td>{!! $grado->nombre !!}</td>
											<td>{!! $grado->nivel->nombre !!}</td>
											<td>{!! $grado->nivel->sede->nombre !!}</td>
											<td>
												<a href="{!! route('deletegrado', $grado->idgrado) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar el grado?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
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