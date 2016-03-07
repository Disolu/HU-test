@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	@include('alertas.request')
	@include('alertas.success')
	@include('alertas.error')
	<div class="row">
	  <div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Importar Pagos</h2>
				</header>
				<div class="panel-body">
						{!! Form::open(array('route' => 'bancoPagosUpload', 'files' => true)) !!}
						{!! Form::token() !!}
							<div class="form-group">
								<label class="col-md-3 control-label" for="inputSuccess"></label>
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									Ten en cuenta el que formado debe ser
									<strong>*.txt</strong>
								</div>

								<div class="col-md-6">


									<fieldset>
										<div class="form-group">
											{!! Form::file('files', $attributes = array('required'=>'')) !!}
										</div>
									</fieldset>
								</div>
							</div>

							<p class="m-none">
								<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success" >Subir</button>
							</p>
						{!! Form::close() !!}
				</div>
			</section>
		</div>

		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
						<h2 class="panel-title">Generar Pagos</h2>
				</header>
				<div class="panel-body">
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Le generación de pagos se guarda en la ruta configurada.
				</div>
				<a href="{!! route('bancoPagosGenerate') !!}" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Generar Pagos</a>
				</div>
			</section>
		</div>
	</div>

<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">Pagos</h2>
	</header>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">

				<div class="tabs tabs-danger">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#popular4" data-toggle="tab"> Pagos importados</a>
						</li>
						<li>
							<a href="#recent4" data-toggle="tab"> Pagos generados</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="popular4" class="tab-pane active">

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
						<div id="recent4" class="tab-pane">
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Descargar Archivo</th>
											<th>Sede</th>
											<th>Fecha de generacion</th>
										</tr>
									</thead>
									<tbody>
									@foreach($payments as $data)
										<tr>
											<td><a href="{{route('descargarDocumento',array('name'=>$data->name))}}" target="_blank">Descargar</a></td>
											<td>{!! $data->sede->nombre !!}</td>
											<td>{!! $data->date !!}</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
					<div class="center">
						{!! $pagos->render() !!}
					</div>
				</div>
			</section>
		</div>
	</div>

</section>
</div>
@endsection
