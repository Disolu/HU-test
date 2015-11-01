@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Lista de Profesores</h2>
			<div class="text-right">
				<a href="{!! route('profesorasignatura') !!}" class="btn btn-primary text-right"><i class="glyphicon-plus"></i> Agregar nuevo</a>
			</div>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			<div class="col-md-12">
				<div class="toggle" data-plugin-toggle="" data-plugin-options="{ &quot;isAccordion&quot;: true }">
					@foreach($profesores as $profesor)
					<section class="toggle">
						<label>
							{!! $profesor->profesor->nombre !!}
						</label>
						<div class="toggle-content" style="display: none;">
							<h4>{!! $profesor->curso->nombre !!}</h4>
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Sede</th>
											<th>Sección</th>
											<th>Grado</th>
											<th>Nivel</th>
											<th>Actions</th>
										</tr>
									</thead>

									<tbody>
									@foreach($profesor->secciones as $seccion)
										<tr>
											<td>{!! $seccion->seccion->grado->nivel->sede->nombre !!}</td>
											<td>{!! $seccion->seccion->nombre !!}</td>
											<td>{!! $seccion->seccion->grado->nombre !!}</td>
											<td>{!! $seccion->seccion->grado->nivel->nombre !!}</td>
											<td class="actions">
												<a href="{!! route('deleteprofesorasignatura', $seccion->idprofesorcurso) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar la relación?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
									@endforeach	
									</tbody>
								</table>
							</div>
						</div>
					</section>
					@endforeach
				</div>
			</div>
		</div>
	</section>
</div>
@endsection