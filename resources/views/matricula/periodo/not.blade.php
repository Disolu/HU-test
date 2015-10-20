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
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">¡No existe periodo activo!</h2>
		</header>
		<div class="panel-body">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong>¡Lo sentimos!</strong> no existe un periodo activo, para ejecutar su solicitud.
			</div>
		</div>
	</section>
</div>
@endsection