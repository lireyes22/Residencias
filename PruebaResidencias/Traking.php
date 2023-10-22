<?php
include 'headprofesores.php';
?>
            

            <!-- Contenido principal -->
            <!--Notas: Incorporar botones al incorporar el backlog-->
				<div class="col ms-sm-auto px-4">
				    <div class="container mt-3 text-center">
				        <h2>Traking</h2>
				        <div class="container text-start mb-4">
						    <div class="h4 d-block">Proyectos Propuestos 
						        <div class="d-block small text-end">Fecha Límite:</div>
						    </div>
						    <div class="h5">Nombre-Estatus</div>
						    <div class="progress" style="height:25px"role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
						        <div class="progress-bar text-bg-warning" style="width: 75%"><span style="font-size: 17px;">100%</span></div>
						    </div>
						</div>						
						<div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
						<div class="container text-start mb-4">
						    <div class="h4 d-block">Solicitud residencia						    	
						        <div class="d-block small text-end">
							        <button type="button" class="btn btn-outline-info">
						        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
										  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
										  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
										</svg>
										 <style>
									        .btn-outline-info:hover::before {
									            content: "Reenviar";
									        }
		    								</style>
						        	</button>
						        	<button type="button" class="btn btn-outline-success">
						        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
										  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
										  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
										</svg>
										 <style>
									        .btn-outline-success:hover::before {
									            content: "Imprimir";
									        }
		    								</style>
						        	</button>
						        	Fecha Límite:
						    	</div>
						    </div>
						    <div class="h5">Nombre-Estatus</div>
						    <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
						        <div class="progress-bar text-bg-success" style="width: 75%"><span style="font-size: 17px;">100%</span></div>
						    </div>
						</div>
						<div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
						<div class="container text-start mb-4">
						    <div class="h4 d-block">Reporte parcial 1
						        <div class="d-block small text-end">
						        	<button type="button" class="btn btn-outline-success">
						        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
										  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
										  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
										</svg>
										 <style>
									        .btn-outline-success:hover::before {
									            content: "Imprimir Reporte";
									        }
		    								</style>
						        	</button>
						        	Fecha Límite:
						        </div>
						    </div>
						    <div class="h5">(Sin registros)</div>
						    <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
						        <div class="progress-bar text-bg-danger" style="width: 90%"><span style="font-size: 17px;">100%</span></div>
						    </div>
						</div>
						<div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
						<div class="container text-start mb-4">
						    <div class="h4 d-block">Reporte parcial 2
						        <div class="d-block small text-end">
						        	<button type="button" class="btn btn-outline-success">
						        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
										  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
										  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
										</svg>
										 <style>
									        .btn-outline-success:hover::before {
									            content: "Imprimir Reporte";
									        }
		    								</style>
						        	</button>
						        	Fecha Límite:
						        </div>
						    </div>
						    <div class="h5">(Sin registros)</div>
						    <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
						        <div class="progress-bar text-bg-secondary" style="width: 100%"><span style="font-size: 17px;">100%</span></div>
						    </div>
						</div>
						<div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
						<div class="container text-start mb-4">
						    <div class="h4 d-block">Reporte final
						        <div class="d-block small text-end">
						        	<button type="button" class="btn btn-outline-success">
						        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
										  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
										  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
										</svg>
										 <style>
									        .btn-outline-success:hover::before {
									            content: "Imprimir Reporte";
									        }
		    								</style>
						        	</button>
						        	Fecha Límite:
						        </div>
						    </div>
						    <div class="h5">(Sin registros)</div>
						    <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
						        <div class="progress-bar text-bg-primary" style="width: 20%"><span style="font-size: 17px;">100%</span></div>
						    </div>
						</div>
            
				        
				    </div>
				</div>


<?php
include 'footprofesores.php';
?>