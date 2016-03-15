@if(Session::has('message-search-alumno'))
@if(isset($getAlumno))
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
									@if($alumno->impedimento == 1)
									<span class="text-warning"><a href="{!! route('alumno', $alumno->alumnoid) !!}">(Editar)</a></span>
									<a href="{!! route('observacion',$alumno->alumnoid) !!}" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger">Impedimento</a>
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
@endif
