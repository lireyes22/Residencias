<?php 
	include ('funcProfesor.php'); 
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
	$result = listProyPendientes($UID);
?>
<?php
include 'headprofesores.php';
?>
<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
	<div class="container-fluid mt-3 text-center">
		<h2>Solicitudes de Proyectos</h2>
		<div class="container-fluid text-start mb-4">
			<div class="table-responsive text-start">
				<table id="example" class="table display table-primary table-striped table-hover"
					style="width:100%; background-color: #ededed;">
					<thead>
						<tr class="table-dark">
							<th>Nombre del Proyecto</th>
							<th>Objetivo</th>
							<th>Número Estudiantes Requeridos</th>
							<th>Tiempo Estimado</th>
							<th>Docente</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$i = 0;
						while ($SPID_Pendiente = mysqli_fetch_array($result)){
							   $row = mysqli_fetch_array(basicInfoProy($SPID_Pendiente[0]));
						?>
						<tr>
							<td><p><?php echo $row[1]?></p></td>
							<td><p><?php echo $row[2]?></p></td>
							<td><p><?php echo $row[3]?></p></td>
							<td><p><?php echo $row[4]?> MESES</p></td>
							<td><p><?php echo $row[5]?></p></td>
							<td>
								<form action="profesorRevProyRes-evalua.php" method="Post" target="blank">
									<input type="hidden" name="idProy" value=<?php echo $row[0] ?>>
										<button type="submit" class="btn btn-outline-info">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
												class="bi bi-search" viewBox="0 0 16 16">
												<path
													d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
											</svg>
											<style>
												.btn-outline-info:hover::before {
													content: "Revisar";
												}
											</style>
										</button>
								</form>
							</td>
							<?php
							}
							?>
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