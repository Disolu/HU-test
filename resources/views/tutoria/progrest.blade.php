@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">						
			<h2 class="panel-title">Notas: <strong>---</strong></h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')

			{!! Form::open(['route' => 'registernotas', 'method' => 'post']) !!}
			<h5><strong>APRECIACIÓN DEL PROFESOR(A) TUTOR(A)</strong></h5>
			
			<div class="row">
				<div class="col-md-6">
				<p><strong>Bimestre #1:</strong></p>
					<textarea class="form-control" rows="3" id="textareaDefault"></textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #2:</strong></p>
					<textarea class="form-control" rows="3" id="textareaDefault"></textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #3:</strong></p>
					<textarea class="form-control" rows="3" id="textareaDefault"></textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #4:</strong></p>
					<textarea class="form-control" rows="3" id="textareaDefault"></textarea>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-12 form-group">
					
					<div class="panel-group" id="accordion2">
						<div class="panel panel-accordion panel-accordion-info">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One" aria-expanded="false">
										Conducta
									</a>
								</h4>
							</div>
							<div id="collapse2One" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<table class="table table-hover mb-none">
										<thead>
											<tr class="info">
												<th><strong>Conducta</strong></th>
												<th>Bimestre I</th>
												<th>Bimestre II</th>
												<th>Bimestre III</th>
												<th>Bimestre IV</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Respeto al reglamento</td>
												<td>
													<input type="text" name="respeto" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="respeto" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="respeto" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="respeto" class="form-control" style="width:80px; ">
												</td>
											</tr>

											<tr>
												<td>Puntualidad</td>
												<td>
													<input type="text" name="puntualidad" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="puntualidad" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="puntualidad" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="puntualidad" class="form-control" style="width:80px; ">
												</td>
											</tr>

											<tr>
												<td>Responsabilidad</td>
												<td>
													<input type="text" name="responsabilidad" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="responsabilidad" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="responsabilidad" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="responsabilidad" class="form-control" style="width:80px; ">
												</td>
											</tr>

											<tr>
												<td>Presentación Personal</td>
												<td>
													<input type="text" name="presentacion" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="presentacion" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="presentacion" class="form-control" style="width:80px; ">
												</td>
												<td>
													<input type="text" name="presentacion" class="form-control" style="width:80px; ">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="panel panel-accordion panel-accordion-info">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two" aria-expanded="false">
										Asistencia
									</a>
								</h4>
							</div>
							<div id="collapse2Two" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<div class="table-responsive table-bordered">
											<table class="table table-hover mb-none">
												<thead>
													<tr class="info">
														<th><strong>Asistencia</strong></th>
														<th>Bimestre I</th>
														<th>Bimestre II</th>
														<th>Bimestre III</th>
														<th>Bimestre IV</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Tardanza Justificada</td>
														<td>
															<input type="text" name="tardanza_justificada" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="tardanza_justificada" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="tardanza_justificada" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="tardanza_justificada" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Tardanza Injustificada</td>
														<td>
															<input type="text" name="tardanza_injustificada" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="tardanza_injustificada" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="tardanza_injustificada" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="tardanza_injustificada" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Inasistencia Justificada</td>
														<td>
															<input type="text" name="inasistencia_just" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="inasistencia_just" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="inasistencia_just" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="inasistencia_just" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Inasistencia Injustificada</td>
														<td>
															<input type="text" name="inasistencia_injust" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="inasistencia_injust" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="inasistencia_injust" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="inasistencia_injust" class="form-control" style="width:80px; ">
														</td>
													</tr>

												</tbody>
											</table>
										</div>
								</div>
							</div>
						</div>

						<div class="panel panel-accordion panel-accordion-info">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three" aria-expanded="false">
										Evaluación de padres
									</a>
								</h4>
							</div>
							<div id="collapse2Three" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<div class="table-responsive table-bordered">
											<table class="table table-hover mb-none">
												<thead>
													<tr class="info">
														<th><strong>Evaluación de Padres</strong></th>
														<th>Bimestre I</th>
														<th>Bimestre II</th>
														<th>Bimestre III</th>
														<th>Bimestre IV</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Se interesa por el avance de su hijo</td>
														<td>
															<input type="text" name="avance" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="avance" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="avance" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="avance" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Envia materiales requeridos</td>
														<td>
															<input type="text" name="materiales" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="materiales" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="materiales" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="materiales" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Asiste puntualmente a las reuniones</td>
														<td>
															<input type="text" name="reuniones" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="reuniones" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="reuniones" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="reuniones" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Se preocupa de la higene y presentación</td>
														<td>
															<input type="text" name="higene" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="higene" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="higene" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="higene" class="form-control" style="width:80px; ">
														</td>
													</tr>

													<tr>
														<td>Lee y firma la agenda diariamente</td>
														<td>
															<input type="text" name="agenda" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="agenda" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="agenda" class="form-control" style="width:80px; ">
														</td>
														<td>
															<input type="text" name="agenda" class="form-control" style="width:80px; ">
														</td>
													</tr>

												</tbody>
											</table>
										</div>
								</div>
							</div>
						</div>
					</div>

				</div>
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
