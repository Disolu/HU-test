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
			
			@foreach($cursos as $data)
			<section class="panel panel-horizontal">
				<header class="panel-heading bg-primary">
					<div class="panel-heading-icon">
						<i class="fa fa-music"></i>
					</div>
				</header>
				<div class="panel-body p-lg">
					<h3 class="text-semibold mt-sm">
						<a href="{!! route('addnotas', [$data->curso->grado->idgrado, $data->curso->idcurso, $data->curso->grado->seccion->idseccion] ) !!}">{!! $data->curso->nombre !!}</a>
					</h3>					
					<p>
					<code>{!! $data->curso->grado->nombre !!} {!! $data->curso->grado->seccion->nombre !!}</code> | 
					<code>{!! $data->curso->grado->nivel->nombre !!}</code> |
					<code>{!! $data->curso->grado->nivel->sede->nombre !!}</code> | 
					Tienes {!! count($data->curso->grado->matriculados) !!} alumnos.</p>
				</div>
			</section>
			@endforeach
		</div>
	</section>
</div>
@endsection
