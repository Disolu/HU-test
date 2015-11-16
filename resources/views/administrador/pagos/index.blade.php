@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Pagos</h2>
		</header>
		
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			@include('alertas.error')
			{!! Form::open(array('route' => 'bancoPagosUpload', 'files' => true)) !!}
			{!! Form::token() !!}	

				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">				
					<fieldset>
						<div class="form-group">
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Ten en cuenta el que formado debe ser 
							<strong>RC_000_{{ date('Ymd') }}.txt</strong>
						</div>
							{!! Form::file('files', $attributes = array()) !!}
						</div>
					</fieldset>
					</div>					
				</div>
pagos
				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success" >Upload</button>
					<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
				</p>
			{!! Form::close() !!}
		</div>

	</section>

<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Pagos</h2>
		</header>
		<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table mb-none">
											<thead>
												<tr>
													<th>Fecha de proceso</th>
													<th>Nombre del cliente</th>
													<th>Fecha de pago</th>
												</tr>
											</thead>
											<tbody>
											@foreach($pagos as $data)
												<tr>
													<td>{!! $data->fecproceso !!}</td>
													<td>{!! $data->nomcliente !!}</td>
													<td>{!! $data->fecpago !!}</td>
												</tr>
											@endforeach	
											</tbody>
										</table>
									</div>
								</div>
							</section>
						</div>
		</div>
</section>
</div>
@endsection