@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Bloque - Criterio</h2>
			<div class="text-right">
				<a href="{!! route('bloquenew') !!}" class="btn btn-primary text-right" onclick="if (! confirm('¿Estás seguro que deseas agregar un nuevo bloque?, esto afectará a toda la institución.')) return false;"><i class="glyphicon-plus"></i> Agregar nuevo</a>
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
											<th>Criterios</th>
										</tr>
									</thead>
									<tbody>
									@foreach($bloques as $bloque)
										<tr>
											<td>{!! $bloque->nombre !!}</td>
											<td> - </td>
											<td> - </td>
											<td> - </td>
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