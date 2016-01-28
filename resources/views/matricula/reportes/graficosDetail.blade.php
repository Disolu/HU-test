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

		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">	
					<h2 class="panel-title">Nivel </h2>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Bars -->
					<div class="chart chart-md" id="flotBars"></div>
					<script type="text/javascript">
	
						var flotBarsData = [
							["1ero", 28],
							["2do", 42],
							["3ero", 25],
							["4to", 23],
							["5to", 37]
						];
	
						// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
	
					</script>
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