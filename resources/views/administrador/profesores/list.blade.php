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
                        @foreach($profesor->profesorcursos as $cursos)
                            <div class="toggle-content" style="display: none;">
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Curso</th>
											<th>Grado</th>
											<th>Nivel</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
									@foreach($cursos->curso as $curso)
										<tr>
											<td class="success"><strong>{!! $curso->nombre !!}</strong></td>
											<td class="dark">{!! $curso->grado->nombre !!}</td>
											<td class="dark">{!! $curso->grado->nivel->nombre !!}</td>
											<td class="actions">
												<a href="{!! route('deleteprofesorasignatura', $curso->id) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar la relación?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
										@if($cursos->secciones)
											<table class="table table-bordered mb-none">
												<tr class="info">
													<th>Secciones</th>
													<th></th>
												</tr>
												@foreach($cursos->secciones as $seccion)
												<tr>
													<td>{!! $seccion->nombre !!}</td>
													<td class="actions">
														<a href="{!! route('deleteprofesorasignatura', $curso->id) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar la relación?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
												@endforeach
											</table>
										@endif	
									@endforeach	
									</tbody>
								</table>
							</div>
						</div>
                        @endforeach
					</section>
					@endforeach
				</div>
			</div>
		</div>
	</section>
</div>
@endsection