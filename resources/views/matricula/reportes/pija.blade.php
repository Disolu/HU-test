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
		<h2 class="panel-title">Matriculados</h2>
	</header>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-condensed mb-none">
				<thead>
					<tr>
						<th>ID</th>
						<th>NOMBRES</th>
						<th>CODIGO</th>
						<th>APE_PAT</th>
						
					</tr>
				</thead>
				@foreach($datos as $data)
				<tbody>
				<td>{!!$data->idalumno!!}</td>
				<td>{!!$data->nombres!!}</td>
				<td>{!!$data->codigo!!}</td>
				<td>{!!$data->apellido_paterno!!}</td>
				<td><button class="btn btn-info btn-sm">Ver información</td>
				</tbody>
				@endforeach	
				
			</table>

			<table class="table table-responsive">
				<thead>
					<th>id bimestre</th>
					<th>Nombre</th>
				</thead>
				@foreach($notas as $nota)
				<tbody>
				<td>{!!$nota->idbimestre!!}</td>
				<td>{!!$nota->nombre!!}</td>
				
				</tbody>
				@endforeach
			</table>





		</div>
	</div>


	

</section>
@stop

