@extends('layouts.profesor')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
		<h2 class="panel-title">Cursos</h2>
		</header>
		<div class="panel-body">
		@if(count($fechanota) > 0)
			<div class="alert alert-info">
				<ul class="fa-ul">
					<li>
						<i class="fa fa-info-circle fa-lg fa-li va-middle" style="line-height: 20px;"></i>
						<span class="va-middle">Tiene desde el {!! $fechanota[0]->fecha_inicio !!}, hasta el {!! $fechanota[0]->fecha_fin !!}  para registrar las notas de los alumno.</span>
					</li>
				</ul>
			</div>
		@endif
			@include('alertas.request')
			@include('alertas.error')
			
			@foreach($cursospe as $data)
			<section class="panel panel-horizontal">
				<header class="panel-heading bg-primary">
					<div class="panel-heading-icon">
						<i class="fa fa-music"></i>
					</div>
				</header>
				<div class="panel-body p-lg">

                    <h3 class="text-semibold mt-sm">
                        <a href="{!! route('addnotas', [$data->idgrado, $data->idcurso, $data->idseccion] ) !!}">
                            <strong><h4>{!! $data->curso !!}</h4></strong>
                        </a>
                    </h3>

                    <p>
                        <code>{!! $data->sede !!}</code> |
					    <code>{!! $data->nivel !!}</code> |
					    <code>{!! $data->grado !!}</code> |
                        <code>{!! $data->seccion !!}</code>
					    Tienes {!! $data->qty !!} alumnos.
                    </p>
				</div>
			</section>
			@endforeach
		</div>
	</section>
</div>
@endsection
