<?php 
	include ('funcionesDepto.php');
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
	$DID = mysqli_fetch_array(DID($UID));
    $result = listSolicProy($DID[0]);
	$proyectos = solicitudesProyecto($DID[0]);
?>
<?php
include 'headDeptoAca.php';
?>
<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
	<div class="container-fluid mt-3 text-center">
		<h2>Propuestas de proyectos</h2>
		<div class="container-fluid text-start mb-4">
			<div class="table-responsive text-start">
				<table id="example" class="display table-striped table-hover"
					style="width:100%; background-color: #ededed;">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Objetivo</th>
							<th>Número de estudiantes</th>
							<th>Tiempo Estimado</th>
							<th>Asignar a</th>
							<th>Fecha Máxima</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						while ($fila = $proyectos->fetch_assoc()) {
					?>
						<tr>
							<form action="exc/insert.php" method="POST">
								<td><p><?php echo $fila['SPNombreProyecto']?></p></td>
								<td><p><?php echo $fila['SPObjetivo']?></p></td>
								<td><p><?php echo $fila['SPEstudiantesRequeridos']?></p></td>
								<td><?php echo $fila['SDTiempoEstimado']?> MESES</td>
								<td>
									<select class="form-select" name="UProfesor" required>
										<option disabled>Profesor:</option>
										<?php
											$RFC = mysqli_fetch_array(RFCprofesor($fila['SPID']));
											$listaProfesores = listaDocentes($DID[0], $RFC[0]);
											while ($profesor = mysqli_fetch_array($listaProfesores)){
												?>
													<option value="<?php echo $profesor[0]; ?>" > <?php echo $profesor[1] ?> </option>
												<?php
											}
										?>
									</select>
								</td>
								<td>
									<div class="container">
										<div class="row">
											<input type="date" required id="start" name="fecha" value="" min="<?php echo date("Y-m-d") ; ?>" />
										</div>
									</div>
								</td>
								<td>
								<input type="hidden" name="SPID" value="<?php echo $fila['SPID']; ?>">
								<input type="hidden" name="IDfuncion" value="ComisionProyectoProfesor">
								<input type="hidden" name="origin" value="../deptoAcaAsigProyResV2.php">
									<button type="submit" class="btn btn-outline-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
											class="bi bi-person-plus-fill" viewBox="0 0 16 16">
											<path
												d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
											<path fill-rule="evenodd"
												d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
										</svg>
										<style>
											.btn-outline-success:hover::before {
												content: "Asignar";
											}
										</style>
									</button>
								</td>
							</form>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>