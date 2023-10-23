<?php
include 'headAlumnos.php';
?>

            <!-- Contenido principal -->
				<div class="col ms-sm-auto px-4">
				    <div class="container-fluid mt-3 text-center">
				        <h2>Banco de proyectos</h2>
				        <div class="text-start">
				        	<button type="button" class="btn btn-success">
				        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
								  <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
								  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
								</svg>
								Nuevo Proyecto
				        	</button>
				        </div>
				        <div class="container-fluid text-start mb-4">
				        	<div class="table-responsive text-start">
					        	<table id="example" class="display table-striped table-hover" style="width:100%; background-color: #ededed;">
							        <thead>
							            <tr>
							                <th>Nombre del proyecto</th>
							                <th>Objetivo del proyecto</th>
							                <th>Descripción</th>
							                <th>Participantes</th>
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
							                	<button type="button" class="btn btn-outline-info">
									        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
													  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
													</svg>
													 <style>
												        .btn-outline-info:hover::before {
												            content: "Detalles";
												        }
					    								</style>
						        				</button>
							                </td>
							            </tr>
							        </tbody>
							        <tfoot>
							            <tr>
							                <th>Nombre del proyecto</th>
							                <th>Objetivo del proyecto</th>
							                <th>Descripción</th>
							                <th>Participantes</th>
							                <th></th>						                
							            </tr>
							        </tfoot>
							    </table>
					        </div>  
				        </div>
				                 
				        
				    </div>
				</div>



<?php
include 'footprofesores.php';
?>