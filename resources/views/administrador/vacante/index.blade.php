@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Vacantes Registradas</h2>
			<div class="text-right">
				<a href="{!! route('vacantenew') !!}" class="btn btn-primary text-right" onclick="if (! confirm('¿Estás seguro que deseas agregar una nueva vacante?, esto afectará a toda la institución.')) return false;"><i class="glyphicon-plus"></i> Agregar nuevo</a>
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
											<th>Cantidad</th>
											<th>Restantes</th>
											<th>Sección</th>
											<th>Grado</th>
											<th>Nivel</th>
											<th>Sede</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
									@foreach($vacantes as $vacante)
										<tr>
											<td>{!! $vacante->qty_vacantes !!}</td>
											<td>{!! $vacante->qty_matriculados !!}</td>
											<td>{!! $vacante->seccion->nombre !!}</td>
											<td>{!! $vacante->grado->nombre !!}</td>
											<td>{!! $vacante->nivel->nombre !!}</td>
											<td>{!! $vacante->sede->nombre !!}</td>
											<td class="actions">
												<a href="{!! route('deletevacante', $vacante->idvacante) !!}" class="delete-row"  onclick="if (! confirm('¿Estás seguro que deseas eliminar las vacantes?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
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