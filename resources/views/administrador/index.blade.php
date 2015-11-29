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
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
					</div>
	
					<h2 class="panel-title">Recepción de informes por sede</h2>
					<p class="panel-subtitle">Informes mes por mes de las dos sedes existentes.</p>
				</header>
				<div class="panel-body">
					<div class="col-md-12">
            <div class="col-md-3">
              <fieldset>
                <div class="form-group">
                  <select name="sede"  id="cboSede" class="form-control mb-md" data-bind="options: sedes, optionsText: 'nombre', optionsValue: 'idsede',  optionsCaption: 'Seleccione una Sede', value: sedeSeleccionada"></select>
                </div>
              </fieldset>
            </div>
            <div class="col-md-3">
              <fieldset>
                <div class="form-group">
                  <select name="nivel"  id="cboNivel" class="form-control mb-md" data-bind="options: niveles, optionsText: 'nombre', optionsValue: 'idnivel',  optionsCaption: 'Seleccione un Nivel', value: nivelSeleccionado"></select>
                </div>
              </fieldset>
            </div>  
            <div class="col-md-3">
              <fieldset>
                <div class="form-group">
                  <select name="grado"  id="cboGrado" class="form-control mb-md" data-bind="options: grados, optionsText: 'nombre', optionsValue: 'idgrado',  optionsCaption: 'Seleccione un Grado', value: gradoSeleccionado"></select>
                </div>
              </fieldset>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-default">Generar</button>
            </div>
          </div>
				</div>
				
				<div class="panel-body">
					<!-- Morris: Bar -->
					<div class="chart chart-md" id="morrisBar"></div>
					<script type="text/javascript">
	
						var morrisBarData = [{
							y: 'Enero',
							a: 10,
							b: 30
						}, {
							y: 'Febrefo',
							a: 100,
							b: 25
						}, {
							y: 'Marzo',
							a: 60,
							b: 25
						}, {
							y: 'Abril',
							a: 75,
							b: 35
						}, {
							y: 'Mayo',
							a: 90,
							b: 20
						}, {
							y: 'Junio',
							a: 75,
							b: 15
						}, {
							y: 'Julio',
							a: 50,
							b: 10
						}, {
							y: 'Agosto',
							a: 75,
							b: 25
						}, {
							y: 'Septiembre',
							a: 30,
							b: 10
						}, {
							y: 'Octubre',
							a: 75,
							b: 5
						}, {
							y: 'Noviembre',
							a: 60,
							b: 8
						}, {
							y: 'Diciembre',
							a: 60,
							b: 8
						}];
					</script>
				</div>
			</section>
		</div>
	</div>

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
	
	<div class="row" style="display: none">
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>
	
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
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>
	
					<h2 class="panel-title">Pie Chart</h2>
					<p class="panel-subtitle">Default Pie Chart</p>
				</header>
				<div class="panel-body">
	
					<!-- Flot: Pie -->
					<div class="chart chart-md" id="flotPie"></div>
					<script type="text/javascript">
	
						var flotPieData = [{
							label: "Series 1",
							data: [
								[1, 60]
							],
							color: '#0088cc'
						}, {
							label: "Series 2",
							data: [
								[1, 10]
							],
							color: '#2baab1'
						}, {
							label: "Series 3",
							data: [
								[1, 15]
							],
							color: '#734ba9'
						}, {
							label: "Series 4",
							data: [
								[1, 15]
							],
							color: '#E36159'
						}];
	
						// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
	
					</script>
	
				</div>
			</section>
		</div>
	</div>

	<div class="row" style="display: none">
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>
	
					<h2 class="panel-title">Line Chart</h2>
					<p class="panel-subtitle">A style of chart that is created by connecting a series of data points together with a line.</p>
				</header>
				<div class="panel-body">
	
					<!-- Morris: Line -->
					<div class="chart chart-md" id="morrisLine"></div>
					<script type="text/javascript">
	
						var morrisLineData = [{
							y: '2006',
							a: 100,
							b: 90
						}, {
							y: '2007',
							a: 75,
							b: 65
						}, {
							y: '2008',
							a: 50,
							b: 40
						}, {
							y: '2009',
							a: 75,
							b: 65
						}, {
							y: '2010',
							a: 50,
							b: 40
						}, {
							y: '2011',
							a: 75,
							b: 65
						}, {
							y: '2012',
							a: 100,
							b: 90
						}, {
							y: '2013',
							a: 75,
							b: 65
						}, {
							y: '2014',
							a: 100,
							b: 90
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
	
					<h2 class="panel-title">Donut Chart</h2>
					<p class="panel-subtitle">Donut Chart are functionally identical to pie charts.</p>
				</header>
				<div class="panel-body">
	
					<!-- Morris: Donut -->
					<div class="chart chart-md" id="morrisDonut"></div>
					<script type="text/javascript">
	
						var morrisDonutData = [{
							label: "Porto Template",
							value: 32
						}, {
							label: "Tucson Template",
							value: 18
						}, {
							label: "Porto Admin",
							value: 20
						}];
	
						// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
	
					</script>
	
				</div>
			</section>
		</div>
	</div>
@endsection

@section('scripts')
	@parent
	<script src="{{ asset('assets/javascripts/ui-elements/examples.charts.js') }}"></script>
	<!--knockout-->
	{!! Html::script('assets/javascripts/knockout-3.3.0.js') !!}

	<!-- KnockoutJS Mapping http://knockoutjs.com/documentation/plugins-mapping.html -->
	{!! Html::script('assets/javascripts/knockout.mapping.min.js') !!}
	<script>
	  var baseURL = "{!! config('app.urlglobal') !!}";
	  function VacantesFormViewModel () {
	    var fo = this;

	    fo.sedes    = ko.observableArray([]);
	    fo.sedeSeleccionada    = ko.observable(null);
	    fo.niveles  = ko.observableArray([]);
	    fo.nivelSeleccionado   = ko.observable(null);
	    fo.grados   = ko.observableArray([]);
	    fo.gradoSeleccionado   = ko.observable(null);
	    fo.secciones= ko.observableArray([]);
	    fo.seccionSeleccionado = ko.observable(null);

	    fo.cargarsedes = function () {
	      $.ajax({
	        type: "GET",
	        url: baseURL + "/api/v1/getSedes",
	        dataType: "json",               
	        contentType: "application/json; charset=utf-8",
	        success: function (e) {
	          var sedesRaw =  e.sedes;
	                //limpio el arrray
	                fo.sedes.removeAll();
	                for (var i = 0; i < sedesRaw.length; i++) {
	                  fo.sedes.push(sedesRaw[i]);
	                };
	            },
	            error: function (r) {
	                // Luego...
	            }
	        });
	    }

	    fo.cargarNiveles = function (sedeSeleccionada) {
	      $.ajax({
	        type: "GET",
	        url: baseURL + "/api/v1/getNivel",
	        data: {sede:sedeSeleccionada},
	        dataType: "json",
	        contentType: "application/json; charset=utf-8",
	        success: function (e) {
	          var nivelesRaw =  e.nivel;
	                //limpio el arrray
	                fo.niveles.removeAll();
	                for (var i = 0; i < nivelesRaw.length; i++) {
	                  fo.niveles.push(nivelesRaw[i]);
	                };
	            },
	            error: function (r) {
	                // Luego...
	            }
	        });
	    }

	    fo.sedeSeleccionada.subscribe(function(newValue) {
	      if (newValue) {
	        fo.cargarNiveles(newValue);
	      }
	    });

	    fo.cargarGrados = function (sede , nivel) {
	      $.ajax({
	        type: "GET",
	        url: baseURL + "/api/v1/getGrados",
	        data: {sede:sede, nivel:nivel},
	        dataType: "json",
	        contentType: "application/json; charset=utf-8",
	        success: function (e) {
	          var gradosRaw =  e.grado;
	                //limpio el arrray
	                fo.grados.removeAll();
	                for (var i = 0; i < gradosRaw.length; i++) {
	                  fo.grados.push(gradosRaw[i]);
	                };
	            },
	            error: function (r) {
	                // Luego...
	            }
	        });
	    }

	    fo.nivelSeleccionado.subscribe(function(newValue) {
	      if (newValue) {
	        fo.cargarGrados(fo.sedeSeleccionada() ,newValue);
	      }
	    });

	    fo.gradoSeleccionado.subscribe(function(newValue) {
	      if (newValue) {
	        fo.cargarSecciones(fo.sedeSeleccionada(), fo.nivelSeleccionado(), newValue);
	      }
	    });

	    fo.cargarsedes();  
	  }    
	  var viewModel = new VacantesFormViewModel();

	  $(function(){
	    ko.applyBindings(viewModel, $("#page-wrapper")[0]); 
	  });
	</script>
@endsection