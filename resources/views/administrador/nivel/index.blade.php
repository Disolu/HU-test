@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Niveles Registradas</h2>
			<div class="text-right">
				<a href="{!! route('nivelnew') !!}" class="btn btn-primary text-right" onclick="if (! confirm('¿Estás seguro que deseas agregar un nuevo nivel ?, esto afectará a toda la institución.')) return false;"><i class="glyphicon-plus"></i> Agregar nuevo</a>
			</div>
		</header>
		<div class="panel-body">
		@include('alertas.success')
			<div class="row">
				<div class="col-md-12">
					<section class="panel">
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Grado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									@foreach($niveles as $nivel)
										<tr>
											<td>{!! $nivel->nombre !!}</td>
											<td>{!! $nivel->sede->nombre !!}</td>
											<td>
												<a href="{!! route('deletenivel', $nivel->idnivel) !!}" class="delete-row" onclick="if (! confirm('¿Estás seguro que deseas eliminar la sede?, esto afectará a toda la institución.')) return false;"><i class="fa fa-trash-o"></i></a>
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