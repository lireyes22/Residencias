<?php 
include '../InicioSessionSeg.php';
$idProy = $_POST['idProy'];
include ('funcProfesor.php');
$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT * FROM SolicitudProyecto WHERE SPID = '$idProy'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
	$empresa = mysqli_fetch_array(empresa($row[0]));
?>
<?php
include 'headprofesores.php';
?>
<div class="col ms-sm-auto px-4">
	<div class="container col-9">
		<form action="exc/insert.php" id="myForm" method="POST" class="mt-5 mb-5 shadow-lg" style="background-color: #E9ECEF;">
			<input type="hidden" name="IDfuncion" value="desicionProyecto">
			<input type="hidden" name="SPID" value="<?php echo $idProy; ?>">
			<input type="hidden" name="desicion" value="" id="desicion">
			<div class="p-2 rounded-top" style=" background-color: #384970; color: white;">
				<h2 class="text-center text-white">Proyecto:  <?php echo $row[1]; ?></h2>
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
						<select id="tipoProyecto" name="tipoProyecto" class="form-select" disabled>
                            <option class="form-control" value="interno" <?php if($row[8] == 'INTERNO') echo 'selected'; ?>>Interno</option>
                            <option class="form-control" value="externo" <?php if($row[8] == 'EXTERNO') echo 'selected'; ?>>Externo</option>
                            <option class="form-control" value="dual" <?php if($row[8] == 'DUAL') echo 'selected'; ?>>Dual</option>
                            <option class="form-control" value="CIIE" <?php if($row[8] == 'CIIE') echo 'selected'; ?>>CIIE</option>
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
				<label for="referencias" class="form-label h6">Incluya las referencias esenciales para
					enmarcar el contenido de su propuesta:</label>
				<textarea class="form-control" rows="4" readonly><?php echo $row[10] ?></textarea>
			</div>

			<div class="p-3">
				<label for="nombreEmpresa" class="form-label h6">Nombre de la Empresa:</label>
				<select class="form-select" readonly>
					<option value=""><?php echo $empresa[0] ?></option>
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
						</label> <br>
						<?php
					} ?>
				</div>
			</div>

			<div class="p-4 rounded-bottom" style="background-color: #384970;">
				<div class="row mb-3">
					<div class="col text-center text-white">
						<label for="Observaciones" class="form-label h6">Observaciones:</label>
						<textarea class="form-control" rows="3" name="observaciones"></textarea>
					</div>
				</div>
				<div class="d-flex justify-content-around">
					<button type="button" class="btn btn-success" onclick="enviarValor('ACEPTADO');">
						<svg xmlns="http://www.w3.org/2000/svg" width="16"
							height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path
								d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
						</svg> Aceptar
					</button>
					<button type="button" class="btn btn-danger" onclick="enviarValor('RECHAZADO');">
						<svg xmlns="http://www.w3.org/2000/svg" width="16"
							height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
							<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
							<path
								d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
						</svg> Rechazar
					</button>
					<button type="button" class="btn btn-secondary" onclick="cerrarPagina();">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Cancelar
                    </button>
				</div>
		</form>
	</div>
</div>
<script>
	function cerrarPagina(){
    	window.close();
    }
	function enviarValor(valor) {
        document.getElementById("desicion").value = valor;
        document.getElementById("myForm").submit();
    }
</script>
<?php
include 'footer.php';
?>