@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">						
			<h2 class="panel-title">{{ $tarjeta->nombre }}: <strong>{!! $alumno->fullname !!}</strong></h2>
		</header>
		<div class="panel-body">
		{!! Form::open(['method' => 'POST']) !!}
			<div class="panel-group" id="accordion">


				@foreach($tarjeta->tarjetabloque as $bloque)
					<div class="panel panel-accordion">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#bloque-{{$bloque->idtarjetabloque}}">
									{{$bloque->bloque->nombre}}
								</a>
							</h4>
						</div>
						<div id="bloque-{{$bloque->idtarjetabloque}}" class="accordion-body collapse">
							<div class="panel-body">
							<table class="table table-bordered mb-none">
									<thead>
										<tr>
											@foreach($bloque->criterios as $criterio)
												<th>{{ $criterio->criterio }}</th>
											@endforeach
										</tr>
									</thead>
									<tbody>
										<tr>
											@foreach($bloque->criterios as $criterio)
											<td>
												<div class="col-md-6 text-right">S</div>
												<div class="col-md-6 text-left">
													@if(isset($notas[$criterio->idbloquecriterio])) 
														<input type="hidden" value="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][id]" value="{{$notas[$criterio->idbloquecriterio]->id}}">
													@endif
													<input type="radio" @if(isset($notas[$criterio->idbloquecriterio])) @if($notas[$criterio->idbloquecriterio]->S == 1) checked @endif @else checked  @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][value]" value="S">
												</div>

												<div class="col-md-6 text-right">CS</div>
												<div class="col-md-6 text-left">
													<input type="radio" @if(isset($notas[$criterio->idbloquecriterio])) @if($notas[$criterio->idbloquecriterio]->CS == 1) checked @endif   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][value]" value="CS">
												</div>

												<div class="col-md-6 text-right">AV</div>
												<div class="col-md-6 text-left">
													<input type="radio" @if(isset($notas[$criterio->idbloquecriterio])) @if($notas[$criterio->idbloquecriterio]->AV == 1) checked @endif   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][value]" value="AV">
												</div>

												<div class="col-md-6 text-right">N</div>
												<div class="col-md-6 text-left">
													<input type="radio" @if(isset($notas[$criterio->idbloquecriterio])) @if($notas[$criterio->idbloquecriterio]->N == 1) checked @endif   @endif  name="nota[{{$bloque->idbloque}}-{{$criterio->idbloquecriterio}}][value]" value="N">
												</div>
											</td>
											@endforeach
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<p class="m-none">
				<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
				<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
			</p>
		{!! Form::close() !!}		
		</div>
	</section>
</div>
@endsection
