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
            </div>
        </section>

    </div>
@endsection
