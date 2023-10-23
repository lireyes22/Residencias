<?php
include 'headprofesores.php';
?>

            <!-- Contenido principal -->
				<div class="col ms-sm-auto px-4">
				    <div class="container-fluid mt-3 text-center">
				        <h2>Propuestas de proyectos</h2>
				        <div class="container-fluid text-start mb-4">
				        	<div class="table-responsive text-start">
					        	<table id="example" class="display table-striped table-hover" style="width:100%; background-color: #ededed;">
							        <thead>
							            <tr>
							                <th>Nombre</th>
							                <th>Objetivo</th>
							                <th>Número de estudiantes</th>
							                <th>Linea de investición</th>
							                <th>Asignar a</th>
							                <th>Fecha Máxima</th>
							                <th></th>						                
							            </tr>
							        </thead>
							        <tbody>
							        	<tr>
							                <td>Tiger Nixon</td>
							                <td>System Architect</td>
							                <td>Edinburgh</td>
							                <td>61</td>
							                <td>
							                	<select class="form-select">
												  <option disabled>Profesor:</option>
												  <option>Luis Donaldo Colosio</option>
												</select>
							                </td>
							                <td>
							                	<div class="container">
												    <div class="row">
												        <div class="col">
												            <input type="number" class="form-control" min="1" max="31" placeholder="Día">
												        </div>
												        <div class="col">
												            <input type="number" class="form-control" min="1" max="12" placeholder="Mes">
												        </div>
												    </div>
												</div>							                							                	
							                </td>
							                <td>
							                	<button type="button" class="btn btn-outline-success">
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
							                </td>
							            </tr>
							        </tbody>
							        <tfoot>
							            <tr>
							                <th>Nombre</th>
							                <th>Objetivo</th>
							                <th>Número de estudiantes</th>
							                <th>Linea de investición</th>
							                <th>Asignar a</th>
							                <th>Fecha Máxima</th>
							                <th></th>							                
							            </tr>
							        </tfoot>
							    </table>
					        </div>  
				        </div>
				                 
				        
				    </div>
				</div>



<?php
include 'footer.php';
?>