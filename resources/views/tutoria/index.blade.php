@extends('layouts.profesor')

@section('cuerpo')
<div class="col-lg-12">

	<section class="panel">
		<header class="panel-heading">						
			<h2 class="panel-title">Notas: <strong>{{ $alumno[0]->fullname }}</strong></h2>
		</header>
		<div class="panel-body">
			@include('alertas.request')
			@include('alertas.success')

			{!! Form::open(['route' => ['tutoria', $alumno[0]->idalumno], 'method' => 'post']) !!}
			<h5><strong>APRECIACIÓN DEL PROFESOR(A) TUTOR(A)</strong></h5>
			
			<div class="row">
				<div class="col-md-6">
				<p><strong>Bimestre #1:</strong></p>
					<textarea class="form-control" name="apreciacion1" rows="3" id="textareaDefault">@if(!empty($notastutoria[0]->apreciacion)) {{ $notastutoria[0]->apreciacion }} @endif</textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #2:</strong></p>
					<textarea class="form-control" name="apreciacion2" rows="3" id="textareaDefault">@if(!empty($notastutoria[1]->apreciacion)) {{ $notastutoria[1]->apreciacion }} @endif</textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #3:</strong></p>
					<textarea class="form-control" name="apreciacion3" rows="3" id="textareaDefault">@if(!empty($notastutoria[2]->apreciacion)) {{ $notastutoria[2]->apreciacion }} @endif</textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #4:</strong></p>
					<textarea class="form-control" name="apreciacion4" rows="3" id="textareaDefault">@if(!empty($notastutoria[3]->apreciacion)) {{ $notastutoria[3]->apreciacion }} @endif</textarea>
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
													<input type="text"  maxlength="2" name="respeto1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->respeto)) {{ $notastutoria[0]->respeto }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="respeto2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->respeto)) {{ $notastutoria[1]->respeto }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="respeto3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->respeto)) {{ $notastutoria[2]->respeto }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="respeto4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->respeto)) {{ $notastutoria[3]->respeto }} @endif">
												</td>
											</tr>

											<tr>
												<td>Puntualidad</td>
												<td>
													<input type="text"  maxlength="2" name="puntualidad1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->puntualidad)) {{ $notastutoria[0]->puntualidad }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="puntualidad2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->puntualidad)) {{ $notastutoria[1]->puntualidad }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="puntualidad3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->puntualidad)) {{ $notastutoria[2]->puntualidad }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="puntualidad4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->puntualidad)) {{ $notastutoria[3]->puntualidad }} @endif">
												</td>
											</tr>

											<tr>
												<td>Responsabilidad</td>
												<td>
													<input type="text"  maxlength="2" name="responsabilidad1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->responsabilidad)) {{ $notastutoria[0]->responsabilidad }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="responsabilidad2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->responsabilidad)) {{ $notastutoria[1]->responsabilidad }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="responsabilidad3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->responsabilidad)) {{ $notastutoria[2]->responsabilidad }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="responsabilidad4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->responsabilidad)) {{ $notastutoria[3]->responsabilidad }} @endif">
												</td>
											</tr>

											<tr>
												<td>Presentación Personal</td>
												<td>
													<input type="text"  maxlength="2" name="presentacion1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->presentacion)) {{ $notastutoria[0]->presentacion }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="presentacion2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->presentacion)) {{ $notastutoria[1]->presentacion }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="presentacion3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->presentacion)) {{ $notastutoria[2]->presentacion }} @endif">
												</td>
												<td>
													<input type="text"  maxlength="2" name="presentacion4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->presentacion)) {{ $notastutoria[3]->presentacion }} @endif">
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
															<input type="text"  maxlength="2" name="tardanza_justificada1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->tardanza_justificada)) {{ $notastutoria[0]->tardanza_justificada }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_justificada2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->tardanza_justificada)) {{ $notastutoria[1]->tardanza_justificada }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_justificada3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->tardanza_justificada)) {{ $notastutoria[2]->tardanza_justificada }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_justificada4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->tardanza_justificada)) {{ $notastutoria[3]->tardanza_justificada }} @endif">
														</td>
													</tr>

													<tr>
														<td>Tardanza Injustificada</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_injustificada1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->tardanza_injustificada)) {{ $notastutoria[0]->tardanza_injustificada }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_injustificada2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->tardanza_injustificada)) {{ $notastutoria[1]->tardanza_injustificada }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_injustificada3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->tardanza_injustificada)) {{ $notastutoria[2]->tardanza_injustificada }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="tardanza_injustificada4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->tardanza_injustificada)) {{ $notastutoria[3]->tardanza_injustificada }} @endif">
														</td>
													</tr>

													<tr>
														<td>Inasistencia Justificada</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_just1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->inasistencia_just)) {{ $notastutoria[0]->inasistencia_just }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_just2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->inasistencia_just)) {{ $notastutoria[1]->inasistencia_just }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_just3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->inasistencia_just)) {{ $notastutoria[2]->inasistencia_just }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_just4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->inasistencia_just)) {{ $notastutoria[3]->inasistencia_just }} @endif">
														</td>
													</tr>

													<tr>
														<td>Inasistencia Injustificada</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_injust1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->inasistencia_injust)) {{ $notastutoria[0]->inasistencia_injust }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_injust2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->inasistencia_injust)) {{ $notastutoria[1]->inasistencia_injust }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_injust3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->inasistencia_injust)) {{ $notastutoria[2]->inasistencia_injust }} @endif">
														</td>
														<td>
															<input type="text"  maxlength="2" name="inasistencia_injust4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->inasistencia_injust)) {{ $notastutoria[3]->inasistencia_injust }} @endif">
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
															<input type="text" name="avance1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->avance)) {{ $notastutoria[0]->avance }} @endif">
														</td>
														<td>
															<input type="text" name="avance2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->avance)) {{ $notastutoria[1]->avance }} @endif">
														</td>
														<td>
															<input type="text" name="avance3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->avance)) {{ $notastutoria[2]->avance }} @endif">
														</td>
														<td>
															<input type="text" name="avance4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->avance)) {{ $notastutoria[3]->avance }} @endif">
														</td>
													</tr>

													<tr>
														<td>Envia materiales requeridos</td>
														<td>
															<input type="text" name="materiales1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->materiales)) {{ $notastutoria[0]->materiales }} @endif">
														</td>
														<td>
															<input type="text" name="materiales2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->materiales)) {{ $notastutoria[1]->materiales }} @endif">
														</td>
														<td>
															<input type="text" name="materiales3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->materiales)) {{ $notastutoria[2]->materiales }} @endif">
														</td>
														<td>
															<input type="text" name="materiales4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->materiales)) {{ $notastutoria[3]->materiales }} @endif">
														</td>
													</tr>

													<tr>
														<td>Asiste puntualmente a las reuniones</td>
														<td>
															<input type="text" name="reuniones1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->reuniones)) {{ $notastutoria[0]->reuniones }} @endif">
														</td>
														<td>
															<input type="text" name="reuniones2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->reuniones)) {{ $notastutoria[1]->reuniones }} @endif">
														</td>
														<td>
															<input type="text" name="reuniones3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->reuniones)) {{ $notastutoria[2]->reuniones }} @endif">
														</td>
														<td>
															<input type="text" name="reuniones4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->reuniones)) {{ $notastutoria[3]->reuniones }} @endif">
														</td>
													</tr>

													<tr>
														<td>Se preocupa de la higene y presentación</td>
														<td>
															<input type="text" name="higene1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->higene)) {{ $notastutoria[0]->higene }} @endif">
														</td>
														<td>
															<input type="text" name="higene2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->higene)) {{ $notastutoria[1]->higene }} @endif">
														</td>
														<td>
															<input type="text" name="higene3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->higene)) {{ $notastutoria[2]->higene }} @endif">
														</td>
														<td>
															<input type="text" name="higene4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->higene)) {{ $notastutoria[3]->higene }} @endif">
														</td>
													</tr>

													<tr>
														<td>Lee y firma la agenda diariamente</td>
														<td>
															<input type="text" name="agenda1" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[0]->agenda)) {{ $notastutoria[0]->agenda }} @endif">
														</td>
														<td>
															<input type="text" name="agenda2" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[1]->agenda)) {{ $notastutoria[1]->agenda }} @endif">
														</td>
														<td>
															<input type="text" name="agenda3" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[2]->agenda)) {{ $notastutoria[2]->agenda }} @endif">
														</td>
														<td>
															<input type="text" name="agenda4" class="form-control" style="width:80px;" value="@if(!empty($notastutoria[3]->agenda)) {{ $notastutoria[3]->agenda }} @endif">
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
