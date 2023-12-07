<?php
	include '../InicioSessionSeg.php';
	include 'funcProfesor.php';
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM SolicitudProyecto 
    INNER JOIN BancoProyectos ON SolicitudProyecto.SPID = BancoProyectos.SPID 
    INNER JOIN SolicitudResidencia ON BancoProyectos.BPID = SolicitudResidencia.BPID
    INNER JOIN Usuarios ON SolicitudProyecto.UIDResponsable = Usuarios.UID 
    INNER JOIN UsuariosDepartamentos ON Usuarios.UID=UsuariosDepartamentos.UID
    INNER JOIN Alumno_Usuarios ON SolicitudResidencia.UAlumno=Alumno_Usuarios.UID
    INNER JOIN Alumnos ON Alumno_Usuarios.NumeroControl=Alumnos.NumeroControl
    INNER JOIN Empresas ON SolicitudProyecto.ERFC=Empresas.ERFC
    WHERE UsuariosDepartamentos.DID='5' AND SolicitudResidencia.SREstatus='PENDIENTE' ";
    $result = mysqli_query($link, $query);
?>
<?php
include 'headprofesores.php';
?>
<!-- Contenido principal -->
<div class="col ms-sm-auto px-4">
	<div class="container-fluid mt-3 text-center">
		<h2>Solicitudes de Residencias</h2>
		<div class="container-fluid text-start mb-4 ">
			<div class="d-flex justify-content-start btn-group col-2">
				<button id='fadeShowButton'type="submit" class="btn btn-primary">Aparecer</button>
				<button id='fadeHideButton'type="submit" class="btn btn-primary">Desaparecer</button>
			</div>
			<div id="tablaDiv2" class="table-responsive text-start">
				<table id="example" class="table display table-primary table-striped table-hover"
					style="width:100%; background-color: #ededed;">
					<thead>
						<tr class="table-dark">
							<th>Nombre del Proyecto</th>
							<th>Nombre Residente</th>
							<th>Nombre Empresa</th>
							<th>Estudiantes Requeridos</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?php echo $row['SPNombreProyecto']; ?></td>
							<td><?php echo $row['NombreCompleto']; ?></td>
							<td><?php echo $row['ENombre']; ?></td>
							<td><?php echo $row['SPEstudiantesRequeridos']; ?></td>
							<form action="profesorRevSoliRes.php" method="Post">
								<td> 
									<input type="hidden" name="SRID" value="<?php echo $row['SRID'];?>">
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
								</td>
							</form>
						</tr>
						<?php
						} 
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>