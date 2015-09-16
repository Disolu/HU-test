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
	@section('menu')
	<ul class="nav nav-main">
		<li class="nav-active">
		  <a href="#">
			<i class="fa fa-home" aria-hidden="true"></i>
			<span>Intranet - Hipolito Unanue</span>
		  </a>
		</li>					
	</ul>
	@stop
	
	@section('cuerpo')
		<p>Contenido para el Área Responsable</p>
	@stop