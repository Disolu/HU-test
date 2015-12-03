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

				<div class="col-md-12">
					<h2 class="pb-lg">Sedes</h2>

					<div class="toggle" data-plugin-toggle="">
						@foreach($sedes as $data)
						<section class="toggle">
							<label><i class="fa fa-plus"></i><i class="fa fa-minus"></i>
								{!! $data->nombre !!}
							</label>
							<p class="" style="height: 0px;">
								@foreach($data->niveles as $nivel)
									<h4 class="alternative-font" style="color: #2A427B">{{ $nivel->nombre }}</h4>

									@foreach($nivel->grado as $grado)
									<h6 class="alternative-font">{{ $grado->nombre }}</h6>
										@if(count($grado->curso) == 0)
											<code>{{ $grado->nombre }} no tiene cursos registrados.</code>
										@endif

										@foreach($grado->curso as $curso)
										<p> - 
											<label for="curso">
												<input type="checkbox" id="inlineCheckbox2" name="curso[]" value="{!! $curso->idcurso !!}">
												<strong>{{ $curso->nombre }}</strong>
											</label>
										</p>
										<div class="alert alert-default">
											<p>
												Secciones: 
												@foreach($grado->secciones as $seccion)
													<span>
														<input type="checkbox" name="seccion_{!! $curso->idcurso !!}[]" value="{!! $seccion->idseccion !!}">
														{{ $seccion->nombre }}
													</span>
												@endforeach
											</p>
										</div>
										@endforeach
									@endforeach
								@endforeach
							</p>
						</section>
						@endforeach
					</div>
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