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
<div class="box-consulta panel panel-default">
						
	<div class="row" style="display: none">
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>
	
					<h2 class="panel-title">Basic Chart</h2>
					<p class="panel-subtitle">You don't have to do much to get an attractive plot. Create a placeholder, make sure it has dimensions (so Flot knows at what size to draw the plot), then call the plot function with your data.</p>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Basic -->
					<div class="chart chart-md" id="flotBasic"></div>
					<script type="text/javascript">
	
						var flotBasicData = [{
							data: [
								[0, 170],
								[1, 169],
								[2, 173],
								[3, 188],
								[4, 147],
								[5, 113],
								[6, 128],
								[7, 169],
								[8, 173],
								[9, 128],
								[10, 128]
							],
							label: "Series 1",
							color: "#0088cc"
						}, {
							data: [
								[0, 115],
								[1, 124],
								[2, 114],
								[3, 121],
								[4, 115],
								[5, 83],
								[6, 102],
								[7, 148],
								[8, 147],
								[9, 103],
								[10, 113]
							],
							label: "Series 2",
							color: "#2baab1"
						}, {
							data: [
								[0, 70],
								[1, 69],
								[2, 73],
								[3, 88],
								[4, 47],
								[5, 13],
								[6, 28],
								[7, 69],
								[8, 73],
								[9, 28],
								[10, 28]
							],
							label: "Series 3",
							color: "#734ba9"
						}];
	
						// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
	
					</script>
	
				</div>
			</section>
		</div>
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>
	
					<h2 class="panel-title">Real-Time Chart</h2>
					<p class="panel-subtitle">You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Curves -->
					<div class="chart chart-md" id="flotRealTime"></div>
	
				</div>
			</section>
		</div>
	</div>
	<div class="row">

		<div class="col-md-6" style="display: none">
			<section class="panel">
				<header class="panel-heading">	
					<h2 class="panel-title">Bars Chart</h2>
					<p class="panel-subtitle">With the categories plugin you can plot categories/textual data easily.</p>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Bars -->
					<div class="chart chart-md" id="flotBars"></div>
					<script type="text/javascript">
	
						var flotBarsData = [
							["Jan", 28],
							["Feb", 42],
							["Mar", 25],
							["Apr", 23],
							["May", 37],
							["Jun", 33],
							["Jul", 18],
							["Aug", 14],
							["Sep", 18],
							["Oct", 15],
							["Nov", 4],
							["Dec", 7]
						];
	
						// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
	
					</script>
				</div>
			</section>
		</div>

		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">	
					<h2 class="panel-title">Segundo Sector</h2>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Pie -->
					<div class="chart chart-md" id="flotPie"></div>
					<script type="text/javascript">
	
						var flotPieData = [{
							label: "Inicial {{$data[0]->inicial1}}",
							data: [
								[1, {{$data[0]->inicial1}}]
							],
							color: '#0088cc'
						}, {
							label: "Primaria {{$data[0]->primaria1}}",
							data: [
								[1, {{$data[0]->primaria1}}]
							],
							color: '#2baab1'
						}, {
							label: "Secundaria {{$data[0]->secundaria1}}",
							data: [
								[1, {{$data[0]->secundaria1}}]
							],
							color: '#734ba9'
						}];
					</script>

					@foreach($nivel1 as $xd)
						<a href="{{ route('Reportegraficosdetails', $xd->idnivel) }}">{{ $xd->nombre }}</a> | 
					@endforeach

				</div>
				
			</section>
		</div>

		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">	
					<h2 class="panel-title">Las Brisas</h2>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Pie -->
					<div class="chart chart-md" id="flotPie2"></div>
					<script type="text/javascript">
	
						var flotPieData2 = [{
							label: "Inicial {{$data[0]->inicial2}}",
							data: [
								[1, {{$data[0]->inicial2}}]
							],
							color: '#0088cc'
						}, {
							label: "Primaria {{$data[0]->primaria2}}",
							data: [
								[1, {{$data[0]->primaria2}}]
							],
							color: '#2baab1'
						}, {
							label: "Secundaria {{$data[0]->secundaria2}}",
							data: [
								[1, {{$data[0]->secundaria2}}]
							],
							color: '#734ba9'
						}];
	
						// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
	
					</script>

					@foreach($nivel2 as $data)
						<a href="{{ route('Reportegraficosdetails', $data->idnivel) }}">{{ $data->nombre }}</a> | 
					@endforeach

				</div>
			</section>
		</div>
	</div>
	

</div>
@stop

@section('scripts')

<!--knockout-->
{!! Html::script('assets/javascripts/knockout-3.3.0.js') !!}

<!-- KnockoutJS Mapping http://knockoutjs.com/documentation/plugins-mapping.html -->
{!! Html::script('assets/javascripts/knockout.mapping.min.js') !!}

<!-- jQuery Cookie -->
{!! Html::script('assets/javascripts/jquery.cookie.js') !!}

<!-- Vendor -->
{!! Html::script('assets/vendor/jquery/jquery.js') !!}
{!! Html::script('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') !!}
{!! Html::script('assets/vendor/jquery-cookie/jquery.cookie.js') !!}
{!! Html::script('assets/vendor/style-switcher/style.switcher.js') !!}
{!! Html::script('assets/vendor/bootstrap/js/bootstrap.js') !!}
{!! Html::script('assets/vendor/nanoscroller/nanoscroller.js') !!}
{!! Html::script('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
{!! Html::script('assets/vendor/jquery-placeholder/jquery.placeholder.js') !!}

<!-- Specific Page Vendor -->		
{!! Html::script('assets/vendor/jquery-appear/jquery.appear.js') !!}
{!! Html::script('assets/vendor/jquery-easypiechart/jquery.easypiechart.js') !!}
{!! Html::script('assets/vendor/flot/jquery.flot.js') !!}
{!! Html::script('assets/vendor/flot-tooltip/jquery.flot.tooltip.js') !!}
{!! Html::script('assets/vendor/flot/jquery.flot.pie.js') !!}
{!! Html::script('assets/vendor/flot/jquery.flot.categories.js') !!}
{!! Html::script('assets/vendor/flot/jquery.flot.resize.js') !!}
{!! Html::script('assets/vendor/jquery-sparkline/jquery.sparkline.js') !!}
{!! Html::script('assets/vendor/raphael/raphael.js') !!}
{!! Html::script('assets/vendor/morris/morris.js') !!}
{!! Html::script('assets/vendor/gauge/gauge.js') !!}
{!! Html::script('assets/vendor/snap-svg/snap.svg.js') !!}
{!! Html::script('assets/vendor/liquid-meter/liquid.meter.js') !!}
{!! Html::script('assets/vendor/chartist/chartist.js') !!}

<!-- Theme Base, Components and Settings -->
{!! Html::script('assets/javascripts/theme.js') !!}

<!-- Theme Custom -->
{!! Html::script('assets/javascripts/theme.custom.js') !!}

<!-- Theme Initialization Files -->
{!! Html::script('assets/javascripts/theme.init.js') !!}

{!! Html::script('assets/javascripts/ui-elements/examples.charts.js') !!}

@stop