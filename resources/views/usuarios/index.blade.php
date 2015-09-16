@extends('layouts.index')

@section('cuerpo')
	<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle=""></a>
				<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
			</div>

			<h2 class="panel-title">Registrar Pensión</h2>
		</header>
		<div class="panel-body">

			<form method="POST" action="usuarios" accept-charset="UTF-8">			
				<div class="form-group">
					<label class="col-md-3 control-label" for="inputSuccess">Tipo de Pensión</label>
					<div class="col-md-6">
						<input name="name" class="form-control input-sm mb-md" type="text" placeholder="Nombres completos">

						<input name="user" class="form-control input-sm mb-md" type="text" placeholder="Usuario">

						<input name="email" class="form-control input-sm mb-md" type="text" placeholder="usuario@hu.edu.pe">

						<input name="password" class="form-control input-sm mb-md" type="password" placeholder="******">

						<select class="form-control mb-md" name="tipopension">
							<option>Seleccione un rol</option>					
							<option value="1">Admnistrador</option>							
							<option value="2">Responsable de Área</option>							
							<option value="3">Secretaria</option>							
							<option value="4">Profesor</option>							
							<option value="5">Área Legal</option>							
						</select>
					</div>					
				</div>

				<p class="m-none">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Registrar</button>
				</p>
			</form>
		</div>
	</section>
</div>
@endsection