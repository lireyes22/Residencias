<?php 
include '../InicioSessionSeg.php';
	include ('funcProfesor.php');
	$UID = $_SESSION['id'];
	$DID = mysqli_fetch_array(DID($UID));
	$result = banco($DID[0]);
?>
<?php
include 'headprofesores.php';
?>
<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
	<div class="container-fluid mt-3 text-center">
		<h2>Banco de proyectos</h2>
		<div class="container-fluid text-start mb-4">
			<div class="table-responsive text-start">
				<table id="example" class="display table-striped table-hover"
					style="width:100%; background-color: #ededed;">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Objetivo</th>
							<th>Numero de estudiantes</th>
							<th>Tiempo estimado</th>
							<th>Docente Responsable</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
							<td>61</td>
							<td>
								<button type="button" class="btn btn-outline-info">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
										class="bi bi-search" viewBox="0 0 16 16">
										<path
											d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
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
				</table>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>