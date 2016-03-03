@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title"><strong>{!! $alumno->nombres !!}</strong></h2>
		</header>
		<div class="panel-body">
			<div class="alert alert-info">
				<ul class="fa-ul">
					<li>
						<i class="fa fa-info-circle fa-lg fa-li va-middle" style="line-height: 20px;"></i>
						<span class="va-middle"><strong>{!! $fechanota[0]->bimestre->nombre !!}: </strong>Tiene desde el {!! $fechanota[0]->fecha_inicio !!}, hasta el {!! $fechanota[0]->fecha_fin !!}  para registrar las notas de los alumno.</span>
					</li>
				</ul>
			</div>
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'tarjetanotas', 'method' => 'post']) !!}
			{!! Form::token() !!}
			<input type="hidden" value="{{$alumno->idalumno}}" name="alumno">
			<!--- ID DE NOTAS-->
			@foreach($notas as $n)
				<input type="hidden" value="{{$n->idnotatarjeta}}" name="nota[{{$n->idbloque}}-{{$n->idbloquecriterio}}][id]">
			@endforeach

			@foreach($tarjeta->tarjetabloque as $bloque)
				<br>
				<table class="table table-no-more table-bordered table-striped mb-none">
					<thead>
						<th>{{$bloque->bloque->nombre}}</th>
						<th>S</th>
						<th>CS</th>
						<th>AV</th>
						<th>N</th>
					</thead>
					<tbody>
						@foreach($bloque->criterios as $criterio)
							<tr>
								<td>{{$criterio->criterio}}</td>
								<td><input type="text" style="width: 80px;" @if(isset($notas[$criterio->idbloquecriterio])) value="{{$notas[$criterio->idbloquecriterio]->S}}"   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][S]" maxlength="2"></td>
								<td><input type="text" style="width: 80px;" @if(isset($notas[$criterio->idbloquecriterio])) value="{{$notas[$criterio->idbloquecriterio]->CS}}"   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][CS]" maxlength="2"></td>
								<td><input type="text" style="width: 80px;" @if(isset($notas[$criterio->idbloquecriterio])) value="{{$notas[$criterio->idbloquecriterio]->AV}}"   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][AV]" maxlength="2"></td>
								<td><input type="text" style="width: 80px;" @if(isset($notas[$criterio->idbloquecriterio])) value="{{$notas[$criterio->idbloquecriterio]->N}}"   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][N]" maxlength="2"></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endforeach
			<hr>
			<p class="m-none">
				<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
				<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
			</p>
			{!! Form::close() !!}

		</div>

	</section>
</div>
@endsection
