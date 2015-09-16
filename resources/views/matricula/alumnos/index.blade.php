<?php 
if(Auth::user()->idrol==1)
{
	$variable = "layouts.index";
} 
elseif(Auth::user()->idrol==2)
{
	$variable = "layouts.responsable";	
}
elseif(Auth::user()->idrol==3)
{
	$variable = "layouts.secretaria";	
}
elseif(Auth::user()->idrol==4)
{
	$variable = "layouts.profesor";	
}
elseif(Auth::user()->idrol==5)
{
	$variable = "layouts.legal";	
}
?>
@extends("$variable")
	@section('cuerpo')
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#alumno" data-toggle="tab" aria-expanded="false"><i class="fa fa-star"></i> Datos del alumno</a>
				</li>
				<li class="">
						<a href="#padre" data-toggle="tab" aria-expanded="true"> Datos del padre</a>
				</li>
				<li class="">
						<a href="#otros" data-toggle="tab" aria-expanded="true"> Otros datos</a>
				</li>				
				<li class="">
						<a href="#archivos" data-toggle="tab" aria-expanded="true"> Archivos</a>
				</li>				
				<li class="">
						<a href="#notas" data-toggle="tab" aria-expanded="true"> Notas</a>
				</li>
				<li class="">
						<a href="#pensiones" data-toggle="tab" aria-expanded="true"> Pensiones</a>
				</li>
				<li class="">
						<a href="#historial" data-toggle="tab" aria-expanded="true"> Historial de pago</a>
				</li>
			</ul>
			<div class="tab-content">

				<div id="alumno" class="tab-pane active">
					<h2>Alumno</h2>
					@include('alertas.request')
					@include('alertas.success')
					
					{!! Form::open(['url' => 'admin/alumno', 'method' => 'post']) !!}
					{!! csrf_field() !!}
					<div class="col-xs-6">                                
		                <div class="form-group">
		                    <label>Nombre</label>
		                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese un nombre" data-bind="value: anombre">
		                </div>
		                <div class="form-group">
		                    <label>Apellido Paterno</label>
		                    <input type="text" name="apellido_paterno" class="form-control" placeholder="Ingrese un apellido paterno" data-bind="value: apaterno">
		                </div>
		                <div class="form-group">
		                    <label>Apellido Materno</label>
		                    <input type="text" name="apellido_materno" class="form-control" placeholder="Ingrese un apellido materno" data-bind="value: amaterno">
		                </div>
		                <div class="form-group">
		                    <label>Sexo</label>
		                    <select class="form-control" name="sexo" data-bind="value: sexo">
		                            <option value="M">Masculino</option>
		                            <option value="F">Femenino</option>
		                    </select>
		                </div>
		                <div class="form-group">
		                    <label>Fecha de Nacimiento</label>
		                    <input type="date" name="fecha_nacimiento" pattern="dd/mm/yyyy" class="form-control" id="fechaNac" data-bind="value: afechaNac" placeholder="Seleccione su fecha de nacimiento">
		                </div>
		                <div class="form-group">
		                    <label>DNI</label>
		                    <input class="form-control" name="dni" pattern="^[0-9]+$" placeholder="Ingrese un DNI" data-bind="value: adni">
		                </div>
		            </div>

		            <div class="col-xs-6">
		                <div class="form-group">
		                    <label>Departamento</label>
		                    <input type="text" class="form-control" placeholder="Ingrese su Departamento de Origen" data-bind="value: adepartamento">
		                </div>
		                <div class="form-group">
		                    <label>Provincia</label>
		                    <input type="text" class="form-control" placeholder="Ingrese su Provincia de Origen" data-bind="value: aprovincia">
		                </div>
		                <div class="form-group">
		                    <label>Distrito</label>
		                    <input type="text" class="form-control" placeholder="Ingrese su Distrito de Origen" data-bind="value: adistrito">
		                </div>
		                <div class="form-group">
		                    <label>Dirección</label>
		                    <input class="form-control" name="direccion" type="text" placeholder="Ingrese una dirección" data-bind="value: adireccion">
		                </div>
		                <div class="form-group">
		                    <label>Teléfono</label>
		                    <input class="form-control" name="telefono" type="text" placeholder="Ingrese un telefono" data-bind="value: atelefono">
		                </div>
		                <div class="form-group">
		                    <label>Estado</label> <br>
		                    <div class="btn-group" data-toggle="buttons">
		                        <label class="btn btn-default  btn-sm active">
		                            <input type="radio" name="alu_estado" autocomplete="off" value="0"> Activo
		                        </label>
		                        <label class="btn btn-default btn-sm">
		                            <input type="radio" name="alu_estado" autocomplete="off" value="1"> Retirado
		                        </label>
		                        <label class="btn btn-default btn-sm">
		                            <input type="radio" name="alu_estado" autocomplete="off" value="2"> Suspendido
		                        </label>
		                        <label class="btn btn-default btn-sm">
		                            <input type="radio" name="alu_estado" autocomplete="off" value="3"> Expulsado
		                        </label>
		                    </div>
		                </div>
                	</div>

                	<p class="m-none">					
						<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">Registrar</button>
					</p>

                	{!!Form::close()!!}
                	<div style="clear:both"></div>
				</div>

				<div id="padre" class="tab-pane">
					<div class="col-xs-4">
	                    <h4>Datos del Padre</h4>
	                        <div class="form-group">
	                            <label>Nombres</label>
	                            <input type="text" class="form-control" placeholder="Nombres" name="p_nombre" data-bind="value: p_nombre">
	                        </div>
	                        <div class="form-group">
	                            <label>Apellidos</label>
	                            <input type="text" class="form-control" placeholder="Apellidos" name="p_apellido" data-bind="value: p_apellido">
	                        </div>
	                        <div class="form-group">
	                            <label>Dni</label>
	                            <input type="text" class="form-control" placeholder="DNI" name="p_dni" data-bind="value: p_dni">
	                        </div>
	                        <div class="form-group">
	                            <label>Estado Civil</label>
	                            <input type="text" class="form-control" placeholder="Estado Civil" name="p_estadocivil" data-bind="value: p_estadocivil">
	                        </div>
	                        <div class="form-group">
	                            <label>Lugar de residencia</label>
	                            <input type="text" class="form-control" placeholder="Lugar de residencia" name="p_lugarresidencia" data-bind="value: p_lugarresidencia">
	                        </div>
	                        <div class="form-group">
	                            <label>Teléfono fijo</label>
	                            <input type="text" class="form-control" placeholder="Teléfono fijo" name="p_telefonofijo" data-bind="value: p_telefonofijo">
	                        </div>
	                        <div class="form-group">
	                            <label>Teléfono trabajo</label>
	                            <input type="text" class="form-control" placeholder="Teléfono trabajo" name="p_telefonotrabajo" data-bind="value: p_telefonotrabajo">
	                        </div>
	                        <div class="form-group">
	                            <label>Celular personal</label>
	                            <input type="text" class="form-control" placeholder="Celular personal" name="p_celular" data-bind="value: p_celular">
	                        </div>
	                        <div class="form-group">
	                            <label>email</label>
	                            <input type="email" class="form-control" placeholder="Email" name="p_email" data-bind="value: p_email">
	                        </div>
	                </div>  

	                <div class="col-xs-4">  
	                    <h4>Datos de la Madre</h4>
	                        <div class="form-group">
	                            <label>Nombres</label>
	                            <input type="text" class="form-control" placeholder="Nombres" name="m_nombre" data-bind="value: m_nombres">
	                        </div>
	                        <div class="form-group">
	                            <label>Apellidos</label>
	                            <input type="text" class="form-control" placeholder="Apellidos" name="m_apellido" data-bind="value: m_apellido">
	                        </div>
	                        <div class="form-group">
	                            <label>Dni</label>
	                            <input type="text" class="form-control" placeholder="DNI" name="m_dni" data-bind="value: m_dni">
	                        </div>
	                        <div class="form-group">
	                            <label>Estado Civil</label>
	                            <input type="text" class="form-control" placeholder="Estado Civil" name="m_estadocivil" data-bind="value: m_estadocivil">
	                        </div>
	                        <div class="form-group">
	                            <label>Lugar de residencia</label>
	                            <input type="text" class="form-control" placeholder="Lugar de residencia" name="m_lugarresidencia" data-bind="value: m_lugarresidencia">
	                        </div>
	                        <div class="form-group">
	                            <label>Teléfono fijo</label>
	                            <input type="text" class="form-control" placeholder="Teléfono fijo" name="m_telefonofijo" data-bind="value: m_telefonofijo">
	                        </div>
	                        <div class="form-group">
	                            <label>Teléfono trabajo</label>
	                            <input type="text" class="form-control" placeholder="Teléfono trabajo" name="m_telefonotrabajo" data-bind="value: m_telefonotrabajo">
	                        </div>
	                        <div class="form-group">
	                            <label>Celular personal</label>
	                            <input type="text" class="form-control" placeholder="Celular personal" name="m_celular" data-bind="value: m_celular">
	                        </div>
	                        <div class="form-group">
	                            <label>email</label>
	                            <input type="email" class="form-control" placeholder="Email" name="m_email" data-bind="value: m_email">
	                        </div>
	                </div>  

	                <div class="col-xs-4">
	                	<h4>Datos del Apoderado</h4>
	                    
	                        <div class="form-group">
	                            <label>Nombres</label>
	                            <input type="text" class="form-control" placeholder="Nombres" name="a_nombre" data-bind="value: a_nombres">
	                        </div>
	                        <div class="form-group">
	                            <label>Apellidos</label>
	                            <input type="text" class="form-control" placeholder="Apellidos" name="a_apellido" data-bind="value: a_apellido">
	                        </div>
	                        <div class="form-group">
	                            <label>Dni</label>
	                            <input type="text" class="form-control" placeholder="DNI" name="a_dni" data-bind="value: a_dni">
	                        </div>
	                        <div class="form-group">
	                            <label>Estado Civil</label>
	                            <input type="text" class="form-control" placeholder="Estado Civil" name="a_estadocivil" data-bind="value: a_estadocivil">
	                        </div>
	                        <div class="form-group">
	                            <label>Lugar de residencia</label>
	                            <input type="text" class="form-control" placeholder="Lugar de residencia" name="a_lugarresidencia" data-bind="value: a_lugarresidencia">
	                        </div>
	                        <div class="form-group">
	                            <label>Teléfono fijo</label>
	                            <input type="text" class="form-control" placeholder="Teléfono fijo" name="a_telefonofijo" data-bind="value: a_telefonofijo">
	                        </div>
	                        <div class="form-group">
	                            <label>Teléfono trabajo</label>
	                            <input type="text" class="form-control" placeholder="Teléfono trabajo" name="a_telefonotrabajo" data-bind="value: a_telefonotrabajo">
	                        </div>
	                        <div class="form-group">
	                            <label>Celular personal</label>
	                            <input type="text" class="form-control" placeholder="Celular personal" name="a_celular" data-bind="value: a_celular">
	                        </div>
	                        <div class="form-group">
	                            <label>email</label>
	                            <input type="email" class="form-control" placeholder="Email" name="a_email" data-bind="value: a_email">
	                        </div>	                
	                </div>	                
                	<div style="clear:both"></div>
                </div> 

                <div id="otros" class="tab-pane">
                	<h2>Otros datos</h2>
                	<div class="col-xs-5">
	                    <div class="form-group">
	                        <label>Tipos de sangre</label>
	                        <input type="text" class="form-control" placeholder="Tipos de sangre" data-bind="value: tipo_sangre" name="tipo_sangre">
	                    </div>
	                    <div class="form-group">
	                        <label>Religión</label>
	                        <input type="text" class="form-control" placeholder="Religión" data-bind="value: religion" name="religion">
	                    </div>
	                    <div class="form-group">
	                        <label>Email</label>
	                        <input type="email" class="form-control" placeholder="Email" data-bind="value: email" name="email">
	                    </div>
                	</div>

	                <div class="col-xs-5">
	                    <div class="form-group">
	                        <label>Hermanos en la institución</label>
	                        <input type="text" class="form-control" placeholder="Hermanos en la institución" data-bind="value: qty_hermanos" name="qty_hermanos">
	                    </div>
	                    <div class="form-group">
	                        <label>Celular personal</label>
	                        <input type="text" class="form-control" placeholder="Celular personal" data-bind="value: celular" name="celular">
	                    </div>
	                    <div class="form-group">
	                        <label>Seguro afiliado</label>
	                        <input type="text" class="form-control" placeholder="Seguro afiliado" data-bind="value: seguro" name="seguro">
	                    </div>
	                </div>

	                <div class="col-xs-2">
	                    <img src="/assets/img/user.png" alt="..." class="img-thumbnail">
	                    <div class="form-group">
	                      <input type="file" name="imagen" id="exampleInputFile">
	                    </div>
	                </div>
	                <div style="clear:both"></div>
                </div>
                                            
            	<div id="pensiones" class="tab-pane">
            		<div class="col-xs-12">
	                    <div class="col-md-10"><h2>Pensiones</h2></div>
	                    <div class="col-md-2">
	                        <select class="form-control">
	                          <option>2015</option>
	                          <option>2014</option>
	                          <option>2013</option>
	                        </select>      
	                    </div>                    
	                </div>

	                <div class="col-xs-4">
	                    <select class="form-control">
	                      <option>Seleccione pensión</option>
	                      <option>Pensión completa</option>
	                      <option>Pensión especial</option>
	                    </select>  
	                </div>

	                <div class="col-xs-4">
	                    <select class="form-control">
	                      <option>Seleccione pensión</option>
	                      <option>Pensión completa</option>
	                      <option>Pensión especial</option>
	                    </select>  
	                </div>

	                <div class="col-xs-4">
	                    <select class="form-control">
	                      <option>Seleccione pensión</option>
	                      <option>Pensión completa</option>
	                      <option>Pensión especial</option>
	                    </select>  
	                </div>
	                <div style="clear:both"></div>
            	</div>

            	<div id="archivos" class="tab-pane">
            		<div class="col-xs-12"><h2>Archivos</h2></div>
            		<div class="col-xs-12">
	                    <div class="col-md-10"><h4>Documentos relacionados con la matricula del presente periodo</h4></div>
	                    <div class="col-md-2">
	                        <select class="form-control">
	                          <option>2015</option>
	                          <option>2014</option>
	                          <option>2013</option>
	                        </select>      
	                    </div>                    
	                </div>
	                
	                <div class="col-xs-8">
	                        <div class="well bloquepadding">
	                            <p><strong>Compromiso de matricula</strong></p>
	                            <div class="col-md-7">
	                                <div class="form-group">
	                                  <input type="file" size="32" name="my_field[]" value="">
	                                </div>
	                            </div>
	                            
	                        </div>
	                </div>

	                <div class="col-xs-8">
	                        <div class="well bloquepadding">
	                            <p><strong>Anexo</strong></p>
	                            <div class="col-md-7">
	                                <div class="form-group">
	                                  <input type="file" size="32" name="my_field[]" value="">
	                                </div>
	                            </div>
	                            
	                        </div>
	                </div>

	                <div class="col-xs-8">
	                        <div class="well bloquepadding">
	                            <p><strong>Recibo de agua luz</strong></p>
	                            <div class="col-md-7">
	                                <div class="form-group">
	                                  <input type="file" size="32" name="my_field[]" value="">
	                                </div>
	                            </div>
	                            
	                        </div>
	                </div>

	                <div class="col-xs-8">
	                        <div class="well bloquepadding">
	                            <p><strong>Dni de padre o madre</strong></p>
	                            <div class="col-md-7">
	                                <div class="form-group">
	                                  <input type="file" size="32" name="my_field[]" value="">
	                                </div>
	                            </div>
	                            
	                        </div>
	                </div>

	                <div class="col-md-12">
	                        <input type="hidden" name="action" value="multiple">
	                        <button type="submit" class="btn btn-success">Subir archivos</button>
	                </div>     	                	                  
					<div style="clear:both"></div>
            	</div>

            	<div id="notas" class="tab-pane">
	           		<div class="col-xs-12">
	                    <div class="col-md-10"><h2>Notas</h2></div>
	                    <div class="col-md-2">
	                        <select class="form-control">
	                          <option>2015</option>
	                          <option>2014</option>
	                          <option>2013</option>
	                        </select>      
	                    </div>                    
	                </div>

	                <div class="panel-body">
	                    <div class="table-responsive">
	                      <table class="table table-bordered">
	                        <thead>
	                          <tr>
	                            <th>Material</th>
	                            <th>1er Bimestre</th>
	                            <th>2do Bimestre</th>
	                            <th>3er Bimestre</th>
	                            <th>4to Bimestre</th>
	                            <th>Nota Final</th>
	                          </tr>
	                        </thead>
	                        <tbody>

	                          <tr>
	                            <th scope="row">1</th>
	                            <td>Table cell</td>
	                            <td>Table cell</td>
	                            <td>Table cell</td>
	                            <td>Table cell</td>
	                            <td>Table cell</td>
	                          </tr>

	                        </tbody>
	                      </table>
	                    </div>
	                </div>   

            	</div>

			</div>
		</div>
	@stop