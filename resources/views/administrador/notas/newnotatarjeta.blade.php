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
			{!! Form::open(['route' => 'registernotas', 'method' => 'post']) !!}
			{!! Form::token() !!}
			<table class="table table-no-more table-bordered table-striped mb-none">
				<thead>
					<tr>
						<th>Codigo</th>
						<th class="hidden-xs hidden-sm">Nombres</th>
						<th class="text-right">I Bimestre</th>
						<th class="text-right hidden-xs hidden-sm">II Bimestre</th>
						<th class="text-right">III Bimestre</th>
						<th class="text-right">IV Bimestre</th>
						<th class="text-right hidden-xs hidden-sm">Promedio</th>
					</tr>
				</thead>
				<tbody>
			
				<?php 
				$fechanota[0]->bimestre->idbimestre == 1 ? $bimestre = ""    : $bimestre 	= "disabled='disabled'";
				$fechanota[0]->bimestre->idbimestre == 2 ? $bimestreII = ""  : $bimestreII  = "disabled='disabled'";
				$fechanota[0]->bimestre->idbimestre == 3 ? $bimestreIII = "" : $bimestreIII = "disabled='disabled'";
				$fechanota[0]->bimestre->idbimestre == 4 ? $bimestreIV = ""  : $bimestreIV 	= "disabled='disabled'";
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
								<input type="text" class="form-control" {!! $bimestre !!} name="bimestreINota[]" maxlength="2">
							</div>
						</td>

						<td class="text-right">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" {!! $bimestreII !!} name="bimestreIINota[]" maxlength="2">
							</div>
						</td>

						<td class="text-right">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" {!! $bimestreIII !!} name="bimestreIIINota[]" maxlength="2">
							</div>
						</td>

						<td lass="text-right">
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" {!! $bimestreIV !!} name="bimestreIVNota[]" maxlength="2">
							</div>
						</td>

						<td lass="text-right hidden-xs hidden-sm">
						</td>
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
