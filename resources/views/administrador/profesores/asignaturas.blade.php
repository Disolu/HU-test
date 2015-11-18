@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Profesor asignatura</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'profesorasignatura', 'method' => 'POST']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<p>Selecciona al docente, y relacionalo con los cursos que enseñará en el presente periodo</p>
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">
						<select class="form-control mb-md" name="profesor">
							<option value="0">Seleccione un profesor</option>
							@foreach($profesores as $profesor)
							<option value="{!! $profesor->id !!}">{!! $profesor->nombre !!}</option>
							@endforeach
						</select>
					</div>					
				</div>

				<div class="form-group">
					@foreach($nivel as $data)
						<section class="panel panel-featured-left panel-featured-tertiary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-tertiary">
										<i class="fa fa-shopping-cart"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">{!! $data->nombre !!}</h4>
										<code>{!! $data->sede->nombre !!}</code>

										@foreach($data->grado as $grado)
										<div class="info">
											<strong class="amount">{!! $grado->name !!}</strong>
											
												@foreach($grado->curso as $curso)
												<div class="checkbox-custom checkbox-primary">
													<input type="checkbox" id="inlineCheckbox2" name="curso[]" value="{!! $curso->idcurso !!}">
													<label for="checkboxExample2">{!! $curso->nombre !!} - <strong> {!! $curso->grado->nombre !!} </strong></label>
												</div>
													
													@if($curso->grado->secciones)
													<div>
														@foreach($curso->grado->secciones as $seccion)
															<div class="checkbox-custom checkbox-success">
																<input type="checkbox" id="inlineCheckbox1" name="seccion[]" value="{!! $seccion->idseccion !!}">
																<label for="checkboxExample2">{!! $seccion->nombre !!}</label>
															</div>
														@endforeach
													</div>	
													@endif
												@endforeach
												<hr>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						</section>
						
					@endforeach
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
				</p>
			{!! Form::close() !!}
		</div>
	</section>
</div>
@endsection

@section('scripts')
@parent
	<link rel="stylesheet" href="{{ asset('assets/vendor/jstree/themes/default/style.css') }}" />
	<script src="{{ asset('assets/vendor/jstree/jstree.js') }}"></script>
	<script src="{{ asset('assets/javascripts/ui-elements/examples.treeview.js') }}"></script>	
@endsection