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
                <h2 class="panel-title">Informados vs Matriculados</h2>
                <div class="text-right">
                <a href="{!! route('informes') !!}" class="btn btn-primary text-right">
                <i class="glyphicon-plus"></i> Agregar nuevo</a>
            </div>
            </header>
            <div class="panel-body">
              @include('alertas.success')
              @include('alertas.request')
              
              <div class="row">
              {!! Form::open(['route' => 'searchInformesvsMatricula', 'method' => 'post']) !!}
                <div class="col-md-12">
                  <div class="col-md-1">
                    <button type="submit" class="btn btn-default">Buscar</button>
                  </div>
                  <div class="col-md-10">
                    <fieldset>
                      <div class="form-group">
                        <select name="periodo" id="periodo">
                          <option>Seleccione Periodo para filtrar</option>
                          @foreach($periodos as $data)
                          <option value="{!! $data->idperiodomatricula !!}">{!! $data->nombre !!}</option>
                          @endforeach
                        </select>
                      </div>
                    </fieldset>
                  </div>
                </div>
              {!! Form::close() !!}
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
                                      <th>Grado</th>
                                      <th>Fecha Informe</th>
                                      <th>Fecha Matricula</th>
                                    </tr>
                                    @foreach ($vs as $data)
                                    <tr>
                                      <td>{!! $data->fullname !!}</td>
                                      <td>{!! $data->dni !!}</td>
                                      <td>{!! $data->grado->nombre !!} | {!! $data->grado->nivel->nombre !!} | {!! $data->grado->nivel->sede->nombre !!}</td>
                                      <td>{!! $data->fechaInforme !!}</td>
                                      <td>{!! $data->fechaMatricula !!}</td>
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
              
            </div>
        </section>

    </div>
@endsection