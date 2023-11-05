<?php 
include '../InicioSessionSeg.php';
$idProy = $_POST['idProy'];
include ('funcProfesor.php');
$row = SolicitudData($idProy);
// Dividir el texto en líneas usando el salto de línea como separador
$referencias = explode("\n", $row[10]);
?>
<?php
include 'headprofesores.php';
?>
<div class="col ms-sm-auto px-4">
	<div class="container col-9">
		<form action="#" class="mt-5 mb-5 shadow-lg" style="background-color: #E9ECEF;">
			<div class="p-2 rounded-top" style=" background-color: #384970; color: white;">
				<h2 class="text-center text-white">Proyecto: <?php echo $row[1]; ?></h2>
			</div>
			<div class="mt-3 p-3">
				<label for="objetivoProyecto" class="form-label h6">Objetivo del Proyecto:</label>
				<textarea class="form-control" rows="4" readonly><?php echo $row[2] ?></textarea>
			</div>
			<div class="p-3">
				<label for="descripcionProyecto" class="form-label h6">Descripción del Proyecto:</label>
				<textarea class="form-control" rows="4" readonly><?php echo $row[3] ?></textarea>
			</div>
			<div class="p-3">
				<label for="impactoProyecto" class="form-label h6">Impacto del Proyecto:</label>
				<p class="text-muted">Establecer la importancia y aporte de la investigación propuesta en
					función de la generación de conocimiento, el desarrollo tecnológico, la innovación y la
					solución de problemas locales, nacionales o internacionales.</p>
				<textarea class="form-control" rows="4" readonly><?php echo $row[4] ?></textarea>
			</div>
			<div class="p-3">
				<label for="lugarDesarrollo" class="form-label h6">Lugar donde se va a desarrollar:</label>
				<input type="text" class="form-control" value="<?php echo $row[5] ?>" readonly>
			</div>
			<div class="container p-3">
				<div class="row">
					<div class="col">
						<label for="cantidadEstudiantes" class="form-label h6">Cantidad de
							estudiantes:</label>
						<input type="number" class="form-control" min="0" placeholder="0" value="<?php echo estudiantesActuales($row[0]); ?>" readonly>
					</div>
					<div class="col">
						<label for="tiempoProyecto" class="form-label h6">Tiempo estimado de
							proyecto:</label>
						<div class="input-group">
							<input type="number" class="form-control" min="0" placeholder="0" value="<?php echo $row[7] ?>" readonly>
							<span class="input-group-text">MES(ES)</span>
						</div>
					</div>
				</div>
			</div>
			<div class="container p-3">
				<div class="row">
					<div class="col">
						<label for="tipoPropuesta" class="form-label h6">Tipo de propuesta:</label>
						<select class="form-select">
							<option <?php if($row[8]=='INTERNO') echo "selected='true'" ?> disabled> INTERNO </option>	 
							<option <?php if($row[8]=='EXTERNO') echo "selected='true'" ?> disabled>EXTERNO </option>
							<option <?php if($row[8]=='DUAL') echo "selected='true'" ?> disabled>DUAL</option> 
							<option <?php if($row[8]=='CIIE') echo "selected='true'" ?> disabled>CIIE </option>
						</select>
					</div>
					<div class="col">
						<label for="docenteResponsable" class="form-label h6">Docente Responsable:</label>
						<input type="text" class="form-control" value="<?php echo mysqli_fetch_array(NombreProfesor($row[11]))[0]; ?>" readonly>
					</div>
				</div>
			</div>
			<div class="p-3">
				<label for="lineaInvestigacion" class="form-label h6">Línea de investigación que
					beneficia:</label>
				<input type="text" class="form-control" value="<?php echo $row[9]; ?>" readonly>
			</div>
			<div class="p-3">
					<dl>
						<dt><label for="referencias" class="form-label h6">Incluya las referencias esenciales para
								enmarcar el contenido de su propuesta:</label></dt>
						<?php 
						foreach ($referencias as $referencia) {
							echo '<dd>'.$referencia . "</dd>";
						}
						?>
					</dl>
			</div>
			<div class="p-3">
				<label for="nombreEmpresa" class="form-label h6">Nombre de la Empresa:</label>
				<select class="form-select" readonly>
					<option selected><?php echo mysqli_fetch_array(empresa($idProy))[0]; ?></option>
				</select>
			</div>
			<div class="mb-3 p-3">
				<label class="form-label h6">Carrera Requerida de los estudiantes:</label>
				<div class="form-check">
					<?php
					$prevCarreras = carrerasSolicitud($row[0]);
					while ($carreras = mysqli_fetch_array($prevCarreras)){
						?>
						<input class="form-check-input" type="checkbox" name="<?php echo $carreras[1]; ?>" value="<?php echo $carreras[1]; ?>" checked disabled>
						<label class="form-check-label" for="flexCheckCheckedDisabled">
							<?php echo $carreras[0]; ?>
						</label> 
						<br><br>
						<?php
					} ?>
				</div>
			</div>
			<div class="p-4 mb-3 d-flex justify-content-center" style="background-color: #384970;">
				<a href="#" class="btn btn-danger" onclick="window.close()"><svg xmlns="http://www.w3.org/2000/svg"
						width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
						<path
							d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
				</svg> Cerrar Página</a>
			</div>
		</form>
	</div>
</div>
<?php
include 'footer.php';
?>