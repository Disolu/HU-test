@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">						
			<h2 class="panel-title">Optimist: <strong>{{ $alumno[0]->fullname }}</strong></h2>
		</header>
		<div class="panel-body">
		{!! Form::open(['route' => ['tutoriaregister',$id], 'method' => 'POST']) !!}
			<div class="panel-group" id="accordion">
			@foreach($tarjetaBloque as $data)
			<input type="hidden" name="bloque[]" value="{{ $data->idbloque }}">
				<div class="panel panel-accordion">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#{{ $data->idtarjetabloque}}">
								{{ $data->bloque }}
							</a>
						</h4>
					</div>
					<div id="{{ $data->idtarjetabloque}}" class="accordion-body collapse">
						<div class="panel-body">
						<table class="table table-bordered mb-none">

								<thead>
									<tr>
									@foreach($data->criterios as $criterio)
										<input type="hidden" name="criterio_{{ $data->idbloque }}[]" value="{{ $criterio->idbloquecriterio }}">
										<th>{{ $criterio->criterio }}</th>
										@endforeach
									</tr>
								</thead>

								<tbody>
									<tr>
										@foreach($data->criterios as $criterio)
										<td>
											<div class="col-md-6 text-right">S</div>
											<div class="col-md-6 text-left">
												<input type="radio" name="value_{{ $criterio->idbloquecriterio }}[]" value="{{ $criterio->idbloquecriterio }}_S">
											</div>

											<div class="col-md-6 text-right">CS</div>
											<div class="col-md-6 text-left">
												<input type="radio" name="value_{{ $criterio->idbloquecriterio }}[]" value="{{ $criterio->idbloquecriterio }}_CS">
											</div>

											<div class="col-md-6 text-right">AV</div>
											<div class="col-md-6 text-left">
												<input type="radio" name="value_{{ $criterio->idbloquecriterio }}[]" value="{{ $criterio->idbloquecriterio }}_AV">
											</div>

											<div class="col-md-6 text-right">N</div>
											<div class="col-md-6 text-left">
												<input type="radio" name="value_{{ $criterio->idbloquecriterio }}[]" value="{{ $criterio->idbloquecriterio }}_N">
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
