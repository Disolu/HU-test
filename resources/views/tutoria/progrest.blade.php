@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

  <section class="panel">
    <header class="panel-heading">            
      <h2 class="panel-title">Progreso: <strong>{{ $alumno[0]->fullname }}</strong></h2>
    </header>
    <div class="panel-body">
      -
      <p class="m-none">
        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
        <a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
      </p>    
    </div>
  </section>
</div>
@endsection
