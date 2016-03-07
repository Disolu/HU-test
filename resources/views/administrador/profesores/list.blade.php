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
				<div class="toggle">
						@foreach($profesores as $profesor)
						<section class="profesor">
							<a href="#" class="profe-link" data-id="{{$profesor->profesor->id}}"><h4>{!! $profesor->profesor->nombre !!}</h4></a>
							<div id="profesor-{{$profesor->profesor->id}}" style="display:none;">
								<div class="modal-block">
									<section class="panel">
										<header class="panel-heading">
											<h2 class="panel-title">{!! $profesor->profesor->nombre !!}</h2>
										</header>
										<div class="panel-body">
											<div class="table-responsive">
											<table class="table mb-none">
												<thead>
													<tr>
														<th>Curso</th>
														<th>Sede</th>
														<th>Nivel</th>
														<th>Grado</th>
														<th>Secciones</th>
													</tr>
												</thead>
												<tbody>
													@foreach($profesor->profesorcursos as $cursos)
														@foreach($cursos->curso as $curso)
															<tr>
																<td>{!! $curso->nombre !!}</td>
																<td>{!! $curso->grado->sede->nombre !!}</td>
																<td>{!! $curso->grado->nivel->nombre !!}</td>
																<td>{!! $curso->grado->nombre !!}</td>
																<td>
																	@if($cursos->secciones)
																		@foreach($cursos->secciones as $seccion)
																			<a href="{!! route('deleteprofesorseccion', $seccion->idprofesorseccion) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar la relación?, esto afectará a toda la institución.')) return false;">
																			{!! $seccion->seccion->nombre !!} <i class="fa fa-trash-o"></i></a>
																		@endforeach	
																	@endif
																</td>
															</tr>
														@endforeach
													@endforeach
												</tbody>
											</table>
											</div>
										</div>
										<footer class="panel-footer">
											<div class="row">
												<div class="col-md-12 text-right">
													<button class="btn btn-default modal-dismiss">Cerrar</button>
												</div>
											</div>
										</footer>
									</section>
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

@section('scripts')
@parent
<script type="text/javascript">
  $(document).ready(function(){
    $('.profe-link').click(function(e){
    	e.preventDefault();
    	var id = $(this).data('id');
		$.magnificPopup.open({
		        items: {
		            src: $('#profesor-'+id).html()
		        },
		        type: 'inline'
		    });
    	});
   });

</script>
@endsection