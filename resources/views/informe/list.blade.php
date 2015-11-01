@extends('layouts.index')
@section('cuerpo')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Listado de Informes</h2>
                <div class="text-right">
                <a href="{!! route('informes') !!}" class="btn btn-primary text-right">
                <i class="glyphicon-plus"></i> Agregar nuevo</a>
            </div>
            </header>
            <div class="panel-body">
              @include('alertas.success')
              @include('alertas.request')
              {!! Form::open(['route' => 'searchInformes', 'method' => 'post']) !!}
              <div class="row">
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
                    <button type="submit" class="mb-xs mt-xs mr-xs btn btn-default">Buscar</button>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel">
                          <div class="panel-body">
                              <!-- inicio formulario-->
                              
                              <div class="table-responsive">
                                <table class="table table-condensed mb-none">
                                  <thead>
                                    <tr>
                                      <th>Nombres</th>
                                      <th>DNI</th>
                                      <th>Colegio</th>
                                      <th>Dirección</th>
                                      <th>Motivo</th>
                                      <th>Comentario</th>
                                      <th>Grado</th>
                                      <th>Fecha</th>
                                    </tr>
                                    @foreach ($informes as $informe)
                                    <tr>
                                      <td>{!! $informe->nombres !!}</td>
                                      <td>{!! $informe->dni !!}</td>
                                      <td>{!! $informe->colegio !!}</td>
                                      <td>{!! $informe->direccion !!}</td>
                                      <td>{!! $informe->motivo !!}</td>
                                      <td>{!! $informe->comentario !!}</td>
                                      <td>{!! $informe->grado->nombre !!} | {!! $informe->grado->nivel->nombre !!} | {!! $informe->grado->nivel->sede->nombre !!}</td>
                                      <td>{!! $informe->created_at !!}</td>
                                    </tr>
                                    @endforeach
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table>
                              </div>

                              <!--fin de formulario -->
                          </div>
                      </section>
                  </div>
              </div>
              {!! form::close() !!}
            </div>
        </section>

    </div>
@endsection
@section('scripts')
@parent
<!--knockout-->
{!! Html::script('assets/javascripts/knockout-3.3.0.js') !!}

<!-- KnockoutJS Mapping http://knockoutjs.com/documentation/plugins-mapping.html -->
{!! Html::script('assets/javascripts/knockout.mapping.min.js') !!}

<!-- jQuery Cookie -->
{!! Html::script('assets/javascripts/jquery.cookie.js') !!}
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
@stop