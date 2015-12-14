@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

  <section class="panel">
    <header class="panel-heading">            
      <h2 class="panel-title">Tutoria: <strong>-</strong></h2>
    </header>
    <div class="panel-body">
      @include('alertas.success')
      <div class="alert alert-info">
        <ul class="fa-ul">
          <li>
            <i class="fa fa-info-circle fa-lg fa-li va-middle" style="line-height: 20px;"></i>
            <span class="va-middle"><strong>{!! $fechanota[0]->bimestre->nombre !!}: </strong>Tiene desde el {!! $fechanota[0]->fecha_inicio !!}, hasta el {!! $fechanota[0]->fecha_fin !!}  para registrar las notas de los alumno.</span>
          </li>
        </ul>
      </div>
      {!! Form::open(['route' => 'registernotas', 'method' => 'post']) !!}
      <table class="table table-no-more table-bordered table-striped mb-none">
        <thead>
          <tr>
            <th>Codigo</th>
            <th class="hidden-xs hidden-sm">Nombres</th>
            <th class="text-right"></th>
            @foreach($tarjetas as $tarjeta)
            <th class="text-right"></th>
            @endforeach
          </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $data)
          <tr>         
            <td data-title="Code">{!! $data->codigo !!}</td>
            <td class="hidden-xs hidden-sm">{!! $data->fullname !!}</td>
            <td><a href="{{ route('tutoria', $data->idalumno) }}" target="_black">Tutoria</a></td>
            @foreach($tarjetas as $tarjeta)
            <td><a href="{{ route('typetarjeta', [$data->idalumno, $tarjeta->idtarjeta]) }}" target="_black">{{ $tarjeta->nombre }}</a></td>
            @endforeach
          </tr>
        @endforeach 
        </tbody>
      </table>
      {!! Form::close() !!}
    
    </div>

  </section>
</div>
@endsection