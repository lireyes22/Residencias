<?php
include 'headprofesores.php';
?>

            <!-- Contenido principal -->
				<div class="col ms-sm-auto px-4">
				    <div class="container-fluid mt-3 text-center">
				        <h2>Gestión de proyectos activos</h2>
				        <div class="container-fluid text-start mb-4">
				        	<div class="table-responsive text-start">
					        	<table id="example" class="display table-striped table-hover" style="width:100%; background-color: #ededed;">
							        <thead>
							            <tr>
							                <th>Nombre</th>
							                <th>Objetivo</th>
							                <th>Número de estudiantes</th>
							                <th>Linea de investición</th>
							                <th>Docente responsable</th>
							                <th>Asesor interno</th>
							                <th></th>						                
							            </tr>
							        </thead>
							        <tbody>
							        	<tr>
							                <td>Tiger Nixon</td>
							                <td>System Architect</td>
							                <td>Edinburgh</td>
							                <td>61</td>
							                <td>sassas</td>
							                <td>assas</td>
							                <td>
							                	<div class="container">
												    <div class="row">
												        <div class="col container-fluid">
												            <button type="button" class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#Asignar">
												        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
																  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
																  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
																</svg>
															 	<style>
															        .btn-outline-success:hover::before {
															            content: "Asignar";
															        }
							    								</style>
									        				</button>
												        </div>
												        <div class="col container-fluid">
												            <button type="button" class="btn btn-outline-warning">
												        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
																  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
																</svg>
															 	<style>
															        .btn-outline-warning:hover::before {
															            content: "Reasignar";
															        }
							    								</style>
									        				</button>
												        </div>
												    </div>
												</div>
							                	
							                </td>
							            </tr>
							        </tbody>
							        <tfoot>
							            <tr>
							                <th>Nombre</th>
							                <th>Objetivo</th>
							                <th>Número de estudiantes</th>
							                <th>Linea de investición</th>
							                <th>Docente responsable</th>
							                <th>Asesor interno</th>
							                <th></th>						                
							            </tr>
							        </tfoot>
							    </table>
					        </div>  
				        </div>
				                 
				        
				    </div>
				</div>

				<!-- The Modal -->
				<div class="modal fade" id="Asignar">
				  <div class="modal-dialog modal-dialog-centered modal-xl">
				    <div class="modal-content">

				      <!-- Modal Header -->
				      <div class="modal-header">
				        <h4 class="modal-title">Asignación de asesor</h4>
				        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
				      	<!--Formulario-->
				        <form action="#">
							<div class="row">
							  <div class="col-md-6 mb-3">
							    <label for="oficio" class="form-label">Numero de oficio:</label>
							    <input type="text" class="form-control" id="oficio" placeholder="Número de oficio" name="oficio">
							  </div>
							  <div class="col-md-6 mb-3">
							    <label for="profesor" class="form-label">Docente:</label>
							    <select class="form-select">
							      <option selected disabled>Profesor:</option>
							      <option>Luis Donaldo Colosio</option>
							    </select>
							  </div>
							</div>
							<div class="row">
							  <div class="col-md-6 mb-3">
							    <label for="oficio" class="form-label">Periodo de Realización:</label>
							    <input type="text" class="form-control" id="oficio" name="oficio" readonly>
							  </div>
							  <div class="col-md-6 mb-3">
							    <label for="profesor" class="form-label">Empresa:</label>
							    <input type="text" class="form-control" id="oficio" name="oficio" readonly>
							  </div>
							</div>
							<div class="row">
							  <div class="col-md-6 mb-3">
							    <label for="oficio" class="form-label">Carrera:</label>
							    <input type="text" class="form-control" id="oficio" name="oficio" readonly>
							  </div>
							  <div class="col-md-6 mb-3">
							    <label for="profesor" class="form-label">Departamento:</label>
							    <input type="text" class="form-control" id="oficio" name="oficio" readonly>
							  </div>
							</div>
							<div class="row">
							  <div class="col-md-12 mb-3">
							    <label for="oficio" class="form-label">Estudiantes inscritos:</label>
							    <input type="text" class="form-control" id="oficio" name="oficio" readonly>
							  </div>
							</div>
							
							
						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>

				      <!-- Modal footer -->
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				      </div>

				    </div>
				  </div>
				</div>


<?php
include 'footprofesores.php';
?>