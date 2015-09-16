<?php 
	if(Auth::user()->idrol==1)
	{
		$variable = "layouts.index";
	} 
	elseif(Auth::user()->idrol==2)
	{
		$variable = "layouts.responsable";	
	}
	elseif(Auth::user()->idrol==3)
	{
		$variable = "layouts.secretaria";	
	}
	elseif(Auth::user()->idrol==4)
	{
		$variable = "layouts.profesor";	
	}
	elseif(Auth::user()->idrol==5)
	{
		$variable = "layouts.legal";	
	}
?>
@extends("$variable")

@section('cuerpo')
<section class="panel">
	<header class="panel-heading">
		<div class="panel-actions">
			<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
			<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
		</div>

		<h2 class="panel-title">Matriculados</h2>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-condensed mb-none">
				<thead>
					<tr>
						<th>Sede</th>
						<th>Nivel</th>
						<th>Grado</th>
						<th>Sección</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
        			@foreach($alumnomatricula as $matricula)
					<tr>
						<td>{!! $matricula->sede->sede_nombre !!}</td>
						<td>{!! $matricula->nivel->nivel_nombre !!}</td>
						<td>{!! $matricula->grado->name !!}</td>
						<td>{!! $matricula->seccion->name !!}</td>
						<td><strong>{!! $matricula->total !!}</strong></td>
					</tr>	
					@endforeach				
				</tbody>
			</table>
		</div>
	</div>
</section>
@stop