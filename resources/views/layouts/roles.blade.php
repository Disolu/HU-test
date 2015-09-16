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