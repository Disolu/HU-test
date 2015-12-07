@if(Session::has('message-search-alumno'))

	@if(count($getAlumno) > 0)

		@foreach($getAlumno as $alumno)
		<div class="col-md-6 col-lg-6 col-xl-4">
			<section class="panel panel-featured-left panel-featured-primary">

				<div class="panel-body">			
					<div class="widget-summary widget-summary-sm">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-life-ring"></i>
							</div>
						</div>			

						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">
									{!! $alumno->fullname !!} 
								</h4>

								<div class="info">
									<strong class="amount"><a href="{!! $alumno->alumnoid !!}">{!! $alumno->codigo !!}</a></strong>
                                    <code>{!! $alumno->observacion !!}</code>
									@if($alumno->impedimento == 1)
									<span class="text-warning"><a href="{!! route('alumno', $alumno->alumnoid) !!}">(Editar)</a></span>
									<a href="{!! route('observacion',$alumno->alumnoid) !!}" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">Impedimento</a>
									<!--
									<a class="mb-xs mt-xs mr-xs modal-basic btn btn-xs btn-danger" href="#modalFullColorDanger{!! $alumno->alumnoid !!}">Impedimento</a>									
									<div id="modalFullColorDanger{!! $alumno->alumnoid !!}" class="modal-block modal-full-color modal-block-danger mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Restringido</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-times-circle"></i>
													</div>
													<div class="modal-text">
														<h4>{!! $alumno->fullname !!}:</h4>
														<p></p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-default modal-dismiss">Cerrar</button>
														<a href="{!! route('observacion',$alumno->alumnoid) !!}" class="mb-xs mt-xs mr-xs btn btn-warning">Ver todos...</a>
													</div>
												</div>
											</footer>
										</section>
									</div>
									-->	
									@else
									<span class="text-warning"><a href="{!! route('alumno', $alumno->alumnoid) !!}">(Editar)</a></span>
                                        @if( count($getPeriodoMatricula)>0 )
                                            @if( $getPeriodoMatricula[0]->idperiodomatricula != $alumno->idperiodomatricula)
                                            <a href="{!! route('searchvacante',$alumno->alumnoid) !!}"><span class="label label-info">Matricular</span></a>
                                            @else
                                            <span class="label label-success">Matriculado</span>
                                            @endif
                                        @endif
									@endif
								</div>

							</div>

						</div>			
					</div>
				</div>

			</section>
		</div>
		@endforeach

	@endif

@endif