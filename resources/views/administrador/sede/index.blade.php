@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Sedes Registradas</h2>
			<div class="text-right">
				<a href="{!! route('sedenew') !!}" class="btn btn-primary text-right" onclick="if (! confirm('¿Estás seguro que deseas agregar una nueva sede?, esto afectará a toda la institución.')) return false;"><i class="glyphicon-plus"></i> Agregar nuevo</a>
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
											<th>Nombres</th>
											<th>Dirección</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									@foreach($sedes as $sede)
										<tr>
											<td>{!! $sede->nombre !!}</td>
											<td>{!! $sede->sede_direccion !!}</td>
											<td>
												<a href="{!! route('deletesede', $sede->idsede) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar la sede?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
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