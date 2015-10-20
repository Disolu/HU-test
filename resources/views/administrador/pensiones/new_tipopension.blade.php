@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Nuevo tipo de pensión</h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')
			{!! Form::open(['route' => 'tipopensionnew', 'method' => 'post']) !!}
			{!! Form::token() !!}	
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess"></label>
					<div class="col-md-6">
						{!! Form::text('nombre', null, ['class' => 'form-control input-sm mb-md', 'placeholder' => 'Nombre del tipo de pensión']) !!}
					</div>					
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success" OnClick="if (! confirm('¿Estás seguro que deseas hacer este registro?')) return false;">Registrar</button>
					<a class="mb-xs mt-xs mr-xs btn btn-default" href="javascript:history.back(1)">Cancelar</a>
				</p>
			{!! Form::close() !!}
		</div>
	</section>

	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Tipos de pensiones registradas</h2>
		</header>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<section class="panel">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Acción</th>
										</tr>
									</thead>
									<tbody>
									@foreach($tipopensiones as $tipopension)
										<tr>
											<td>{!! $tipopension->nombre !!}</td>
											<td class="actions">
												<a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
									@endforeach	
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection