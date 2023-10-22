<?php
include 'headprofesores.php';
?>
            <!-- Contenido principal -->
            <!--Notas: Incorporar botones al incorporar el backlog-->
				<div class="col ms-sm-auto px-4">
				    <div class="container mt-3 text-center">
				        <h2>Proyectos Registrados</h2>
				        <div class="container text-end">
				        	<button type="button" class="btn btn-outline-success">
				        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#126945" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
								  <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
								  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
								</svg>
								 <style>
							        .btn-outline-success:hover::before {
							            content: "¡Nuevo proyecto!";
							        }
    								</style>
				        	</button>
				        </div>
				        <div class="container text-start mb-4">
						    <div class="h4">Nombre del proyecto</div>
						    <div class=" container text-end mb-2">
						    	<button type="button" class="btn btn-outline-primary">
					        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
									  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
									  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
									 <style>
								        .btn-outline-primary:hover::before {
								            content: "Observaciones";
								        }
	    								</style>
					        	</button>
					        	<button type="button" class="btn btn-outline-danger">
					        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-minus" viewBox="0 0 16 16">
									  <path d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
									  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
									</svg>									 <style>
								        .btn-outline-danger:hover::before {
								            content: "Cancelar";
								        }
	    								</style>
					        	</button>
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
					        </div>
						    <div class="progress" style="height:25px"role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
						        <div class="progress-bar text-bg-warning" style="width: 75%"><span style="font-size: 17px;">ACEPTADO</span></div>
						    </div>
						</div>						
						<div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
							
            
				        
				    </div>
				</div>

<?php
include 'footprofesores.php';
?>