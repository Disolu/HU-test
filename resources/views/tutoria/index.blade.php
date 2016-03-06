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
					<textarea class="form-control" name="notas[1][apreciacion]" rows="3" id="textareaDefault">@if(isset($notas[1]->apreciacion)){{ $notas[1]->apreciacion }}@endif</textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #2:</strong></p>
					<textarea class="form-control" name="notas[2][apreciacion]" rows="3" id="textareaDefault">@if(isset($notas[2]->apreciacion)){{ $notas[2]->apreciacion }}@endif</textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #3:</strong></p>
					<textarea class="form-control" name="notas[3][apreciacion]" rows="3" id="textareaDefault">@if(isset($notas[3]->apreciacion)){{ $notas[3]->apreciacion }}@endif</textarea>
				</div>
				<div class="col-md-6">
				<p><strong>Bimestre #4:</strong></p>
					<textarea class="form-control" name="notas[4][apreciacion]" rows="3" id="textareaDefault">@if(isset($notas[4]->apreciacion)){{ $notas[4]->apreciacion }}@endif</textarea>
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
													<input type="text"  maxlength="2" name="notas[1][respeto]" class="form-control" style="width:80px;" @if(isset($notas[1]->respeto)) value="{{$notas[1]->respeto}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[2][respeto]" class="form-control" style="width:80px;" @if(isset($notas[2]->respeto)) value="{{$notas[2]->respeto}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[3][respeto]" class="form-control" style="width:80px;" @if(isset($notas[3]->respeto)) value="{{$notas[3]->respeto}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[4][respeto]" class="form-control" style="width:80px;" @if(isset($notas[4]->respeto)) value="{{$notas[4]->respeto}}" @endif>
												</td>
											</tr>

											<tr>
												<td>Puntualidad</td>
												<td>
													<input type="text"  maxlength="2" name="notas[1][puntualidad]" class="form-control" style="width:80px;" @if(isset($notas[1]->puntualidad)) value="{{$notas[1]->puntualidad}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[2][puntualidad]" class="form-control" style="width:80px;" @if(isset($notas[2]->puntualidad)) value="{{$notas[2]->puntualidad}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[3][puntualidad]" class="form-control" style="width:80px;" @if(isset($notas[3]->puntualidad)) value="{{$notas[3]->puntualidad}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[4][puntualidad]" class="form-control" style="width:80px;" @if(isset($notas[4]->puntualidad)) value="{{$notas[4]->puntualidad}}" @endif>
												</td>
											</tr>

											<tr>
												<td>Responsabilidad</td>
												<td>
													<input type="text"  maxlength="2" name="notas[1][responsabilidad]" class="form-control" style="width:80px;" @if(isset($notas[1]->responsabilidad)) value="{{$notas[1]->responsabilidad}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[2][responsabilidad]" class="form-control" style="width:80px;" @if(isset($notas[2]->responsabilidad)) value="{{$notas[2]->responsabilidad}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[3][responsabilidad]" class="form-control" style="width:80px;" @if(isset($notas[3]->responsabilidad)) value="{{$notas[3]->responsabilidad}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[4][responsabilidad]" class="form-control" style="width:80px;" @if(isset($notas[4]->responsabilidad)) value="{{$notas[4]->responsabilidad}}" @endif>
												</td>
											</tr>

											<tr>
												<td>Presentación Personal</td>
												<td>
													<input type="text"  maxlength="2" name="notas[1][presentacion]" class="form-control" style="width:80px;" @if(isset($notas[1]->presentacion)) value="{{ $notas[1]->presentacion}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[2][presentacion]" class="form-control" style="width:80px;" @if(isset($notas[2]->presentacion)) value="{{ $notas[2]->presentacion}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[3][presentacion]" class="form-control" style="width:80px;" @if(isset($notas[3]->presentacion)) value="{{ $notas[3]->presentacion}}" @endif>
												</td>
												<td>
													<input type="text"  maxlength="2" name="notas[4][presentacion]" class="form-control" style="width:80px;" @if(isset($notas[4]->presentacion)) value="{{ $notas[4]->presentacion}}" @endif>
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
															<input type="text"  maxlength="2" name="notas[1][tardanza_justificada]" class="form-control" style="width:80px;" @if(isset($notas[1]->tardanza_justificada)) value="{{$notas[1]->tardanza_justificada}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[2][tardanza_justificada]" class="form-control" style="width:80px;" @if(isset($notas[2]->tardanza_justificada)) value="{{$notas[2]->tardanza_justificada}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[3][tardanza_justificada]" class="form-control" style="width:80px;" @if(isset($notas[3]->tardanza_justificada)) value="{{$notas[3]->tardanza_justificada}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[4][tardanza_justificada]" class="form-control" style="width:80px;" @if(isset($notas[4]->tardanza_justificada)) value="{{$notas[4]->tardanza_justificada}}" @endif>
														</td>
													</tr>

													<tr>
														<td>Tardanza Injustificada</td>
														<td>
															<input type="text"  maxlength="2" name="notas[1][tardanza_injustificada]" class="form-control" style="width:80px;" @if(isset($notas[1]->tardanza_injustificada)) value="{{$notas[1]->tardanza_injustificada}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[2][tardanza_injustificada]" class="form-control" style="width:80px;" @if(isset($notas[2]->tardanza_injustificada)) value="{{$notas[2]->tardanza_injustificada}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[3][tardanza_injustificada]" class="form-control" style="width:80px;" @if(isset($notas[3]->tardanza_injustificada)) value="{{$notas[3]->tardanza_injustificada}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[4][tardanza_injustificada]" class="form-control" style="width:80px;" @if(isset($notas[4]->tardanza_injustificada)) value="{{$notas[4]->tardanza_injustificada}}" @endif>
														</td>
													</tr>

													<tr>
														<td>Inasistencia Justificada</td>
														<td>
															<input type="text"  maxlength="2" name="notas[1][inasistencia_just]" class="form-control" style="width:80px;" @if(isset($notas[1]->inasistencia_just)) value="{{ $notas[1]->inasistencia_just }}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[2][inasistencia_just]" class="form-control" style="width:80px;" @if(isset($notas[2]->inasistencia_just)) value="{{ $notas[2]->inasistencia_just }}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[3][inasistencia_just]" class="form-control" style="width:80px;" @if(isset($notas[3]->inasistencia_just)) value="{{ $notas[3]->inasistencia_just }}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[4][inasistencia_just]" class="form-control" style="width:80px;" @if(isset($notas[4]->inasistencia_just)) value="{{ $notas[4]->inasistencia_just }}" @endif>
														</td>
													</tr>

													<tr>
														<td>Inasistencia Injustificada</td>
														<td>
															<input type="text"  maxlength="2" name="notas[1][inasistencia_injust]" class="form-control" style="width:80px;" @if(isset($notas[1]->inasistencia_injust)) value="{{$notas[1]->inasistencia_injust}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[2][inasistencia_injust]" class="form-control" style="width:80px;" @if(isset($notas[2]->inasistencia_injust)) value="{{$notas[2]->inasistencia_injust}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[3][inasistencia_injust]" class="form-control" style="width:80px;" @if(isset($notas[3]->inasistencia_injust)) value="{{$notas[3]->inasistencia_injust}}" @endif>
														</td>
														<td>
															<input type="text"  maxlength="2" name="notas[4][inasistencia_injust]" class="form-control" style="width:80px;" @if(isset($notas[4]->inasistencia_injust)) value="{{$notas[4]->inasistencia_injust}}" @endif>
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
															<input type="text" name="notas[1][avance]" class="form-control" style="width:80px;" @if(isset($notas[1]->avance)) value="{{$notas[1]->avance}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[2][avance]" class="form-control" style="width:80px;" @if(isset($notas[2]->avance)) value="{{$notas[2]->avance}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[3][avance]" class="form-control" style="width:80px;" @if(isset($notas[3]->avance)) value="{{$notas[3]->avance}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[4][avance]" class="form-control" style="width:80px;" @if(isset($notas[4]->avance)) value="{{$notas[4]->avance}}" @endif>
														</td>
													</tr>

													<tr>
														<td>Envia materiales requeridos</td>
														<td>
															<input type="text" name="notas[1][materiales]" class="form-control" style="width:80px;" @if(isset($notas[1]->materiales)) value="{{$notas[1]->materiales}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[2][materiales]" class="form-control" style="width:80px;" @if(isset($notas[2]->materiales)) value="{{$notas[2]->materiales}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[3][materiales]" class="form-control" style="width:80px;" @if(isset($notas[3]->materiales)) value="{{$notas[3]->materiales}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[4][materiales]" class="form-control" style="width:80px;" @if(isset($notas[4]->materiales)) value="{{$notas[4]->materiales}}" @endif>
														</td>
													</tr>

													<tr>
														<td>Asiste puntualmente a las reuniones</td>
														<td>
															<input type="text" name="notas[1][reuniones]" class="form-control" style="width:80px;" @if(isset($notas[1]->reuniones)) value="{{$notas[1]->reuniones}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[2][reuniones]" class="form-control" style="width:80px;" @if(isset($notas[2]->reuniones)) value="{{$notas[2]->reuniones}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[3][reuniones]" class="form-control" style="width:80px;" @if(isset($notas[3]->reuniones)) value="{{$notas[3]->reuniones}}" @endif>
														</td>
														<td>
															<input type="text" name="notas[4][reuniones]" class="form-control" style="width:80px;" @if(isset($notas[4]->reuniones)) value="{{$notas[4]->reuniones}}" @endif>
														</td>
													</tr>

													<tr>
														<td>Se preocupa de la higene y presentación</td>
														<td>
															<input type="text" name="notas[1][higene]" class="form-control" style="width:80px;" @if(isset($notas[1]->higene)) value="{{ $notas[1]->higene }}" @endif>
														</td>
														<td>
															<input type="text" name="notas[2][higene]" class="form-control" style="width:80px;" @if(isset($notas[2]->higene)) value="{{ $notas[2]->higene }}" @endif>
														</td>
														<td>
															<input type="text" name="notas[3][higene]" class="form-control" style="width:80px;" @if(isset($notas[3]->higene)) value="{{ $notas[3]->higene }}" @endif>
														</td>
														<td>
															<input type="text" name="notas[4][higene]" class="form-control" style="width:80px;" @if(isset($notas[4]->higene)) value="{{ $notas[4]->higene }}" @endif>
														</td>
													</tr>

													<tr>
														<td>Lee y firma la agenda diariamente</td>
														<td>
															<input type="text" name="notas[1][agenda]" class="form-control" style="width:80px;" @if(isset($notas[1]->agenda)) value="{{ $notas[1]->agenda }}" @endif>
														</td>
														<td>
															<input type="text" name="notas[2][agenda]" class="form-control" style="width:80px;" @if(isset($notas[2]->agenda)) value="{{ $notas[2]->agenda }}" @endif>
														</td>
														<td>
															<input type="text" name="notas[3][agenda]" class="form-control" style="width:80px;" @if(isset($notas[3]->agenda)) value="{{ $notas[3]->agenda }}" @endif>
														</td>
														<td>
															<input type="text" name="notas[4][agenda]" class="form-control" style="width:80px;" @if(isset($notas[4]->agenda)) value="{{ $notas[4]->agenda }}" @endif>
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
