@extends('layouts.index')

@section('cuerpo')
<div class="col-lg-12">
@include('alertas.request')
@include('alertas.success')
@include('alertas.error')

	<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Pagos</h2>
			</header>
			<div class="row">
				<div class="col-md-12">
					<section class="panel">
						<div class="panel-body">
							
							<div class="table-responsive">
								<table class="table mb-none">
									<thead>
										<tr>
											<th>Nombres</th>
											<th>Codigo</th>
											<th>Teléfono</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									@foreach($pagos as $data)

										<tr>
											<td>{!! $data->fullname !!}</td>
											<td>{!! $data->codigo !!}</td>
											<td>{!! $data->telefono !!}</td>
											<td>
												<!-- Modal Basic -->
												<a class="mb-xs mt-xs mr-xs modal-basic btnDetails" href="#modalBasic" data-id="{!! $data->idalumno !!}">Ver estado</a>
												<div id="modalBasic" class="modal-block mfp-hide">
													<section class="panel">
														<header class="panel-heading">
															<h2 class="panel-title">Estado de pagos</h2>
														</header>
														<div class="panel-body">
															<div class="modal-wrapper">
																<div class="modal-text">
																	PERIODO: <strong>ACTUAL</strong>
																	<table class="table table-hover mb-none">
																		<thead>
																			<tr>
																				<th>Mes</th>
																				<th>Mensualidad</th>
																				<th>Estado</th>
																			</tr>
																		</thead>
																		<tbody id="tableajax">
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<footer class="panel-footer">
															<div class="row">
																<div class="col-md-12 text-right">
																	<button class="btn btn-default modal-dismiss">Cerrar</button>
																</div>
															</div>
														</footer>
													</section>
												</div>
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
	</section>
</div>

@endsection

@section('scripts')
	@parent
	<script type="text/javascript">
	  $(document).ready(function(){
	    $('.btnDetails').click(function(){
	      $.ajax({
	        method: "POST",
	        url: "{!! route('SeguimientoPagosAjax') !!}",
	        dataType: 'json',
	        data:
	        {
	          idalumno: $(this).data('id'),
	          _token: '{!! csrf_token() !!}'
	        },
	        success:  function (r)
	        {
	          if(r.length < 1)
	          {
	            alert('No tenemos data suficiente.');
	          }
	          else
	          {
	          	var options;
	          	var estado;
	            $.each(r, function(i)
	            {
	            	if(r[i].status == 1 ) { estado = "<span class='label label-primary'>Pagado</span>"; } else { estado = "<span class='label label-danger'>Pendiente</span>" }

	            	options += "<tr>";
	              options += "<td>"+r[i].mesdeuda+"</td>";
	              options += "<td>"+r[i].montopagar+"</td>";
	              options += "<td>"+estado+"</td>";
	              options += "</tr>";
	            });
	            $('#tableajax').html(options);
	          }
	        },
	        error: function()
	        {
	          alert('error inesperado.');
	        }
	      });
	    });

	  });
	</script>
@endsection