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
                                {!! $alumno->fullname!!}   
                            </h4>
                            <h5>
                                Dni: {!! $alumno->dni!!}
                            </h5>

                            <div class="info">
                                <code>{!! $alumno->observacion!!}</code>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>
    @endforeach
  
@elseif(count($getAlumno) == 0)
    <div class="info">
                 <div class="alert alert-info" role="alert">No existen restricciones para el alumno</div>
     </div>


@endif
