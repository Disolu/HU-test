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
                    <div class="panel-group" id="accordion">
                        @foreach($sedes as $data)
                        <div class="panel panel-accordion">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#sede_{!! $data->idsede !!}">
                                        {!! $data->nombre !!}
                                    </a>
                                </h4>
                            </div>
                            <div id="sede_{!! $data->idsede !!}" class="accordion-body collapse">
                                <div class="panel-body">
                                    @foreach($data->niveles as $nivel)
                                        <h5 class="alternative-font" style="color: greenyellowen">{{ $nivel->nombre }}</h5>
                                        @foreach($nivel->grado as $grado)
                                            <div class="panel-group" id="accordion_{!! $grado->idgrado !!}">
                                                <div class="panel panel-accordion">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_{!! $grado->idgrado !!}" href="#grado_{!! $grado->idgrado !!}">
                                                                <strong>{{ $grado->nombre }}</strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="grado_{!! $grado->idgrado !!}" class="accordion-body collapse">
                                                        <div class="panel-body">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
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