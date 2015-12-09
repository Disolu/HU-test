@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">						
			<h2 class="panel-title">Notas: <strong>{!! $namecurso[0]->nombre !!}</strong></h2>
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
            @if(1 == 1)
			{!! Form::open(['route' => 'registernotas', 'method' => 'post']) !!}
            @else

            @endif
			<table class="table table-no-more table-bordered table-striped mb-none">
				<thead>
					<tr>
						<th>Codigo</th>
						<th class="hidden-xs hidden-sm">Nombres</th>
						<th class="text-right">I Bimestre</th>
						<th class="text-right hidden-xs hidden-sm">II Bimestre</th>
						<th class="text-right">III Bimestre</th>
						<th class="text-right">IV Bimestre</th>
						@if($tutoria)
						<th class="text-right">Tutoria</th>
						@endif
					</tr>
				</thead>
				<tbody>
			
				<?php 
				$fechanota[0]->bimestre->idbimestre == 1 ? $bimestre    = "style='width: 80px'"  : $bimestre 	= "style='display: none' disabled='disabled'";
				$fechanota[0]->bimestre->idbimestre == 2 ? $bimestreII  = "style='width: 80px'"  : $bimestreII  = "style='display: none' disabled='disabled'";
				$fechanota[0]->bimestre->idbimestre == 3 ? $bimestreIII = "style='width: 80px'"  : $bimestreIII = "style='display: none' disabled='disabled'";
				$fechanota[0]->bimestre->idbimestre == 4 ? $bimestreIV  = "style='width: 80px'"  : $bimestreIV 	= "style='display: none' disabled='disabled'";
				?>
				<input type="hidden" name="idbimestre" value="{!! $fechanota[0]->bimestre->idbimestre !!}">
				<input type="hidden" name="idperiodo" value="{!! $lastPeriodo[0]->idperiodomatricula !!}">
				<input type="hidden" name="idcurso" value="{!! $idcurso !!}">
				<input type="hidden" name="idseccion" value="{!! $idseccion !!}">
					
				@foreach($alumnos as $data)
					<tr>
						<input type="hidden" name="idalumno[]" value="{!! $data->alumno->idalumno !!}">						
						<td data-title="Code">{!! $data->alumno->codigo !!}</td>
						<td class="hidden-xs hidden-sm">{!! $data->alumno->fullname !!}</td>
						
						<td class="text-right">
							<div class="col-md-6 form-group">
								<input type="text" style="width: 80px;" class="form-control" {!! $bimestre !!} name="bimestreINota[]" maxlength="2" value="{{ $data->bimestre1 }}">
							</div>
						</td>

						<td class="text-right">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" {!! $bimestreII !!} name="bimestreIINota[]" maxlength="2" value="{{ $data->bimestre2 }}">
							</div>
						</td>

						<td class="text-right">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" {!! $bimestreIII !!} name="bimestreIIINota[]" maxlength="2" value="{{ $data->bimestre3 }}">
							</div>
						</td>

						<td lass="text-right">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" {!! $bimestreIV !!} name="bimestreIVNota[]" maxlength="2" value="{{ $data->bimestre4 }}">
							</div>
						</td>
						@if($tutoria)
						<td>
							<a href="{{ route('tutoria', $data->alumno->idalumno) }}" target="_black">Tutoria</a> | 
							<a href="#">Progreso</a> | 
							<a href="#">Optimist</a> 
						</td>
						@endif
					</tr>
				@endforeach	
				</tbody>
			</table>
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
