<?php
include '../InicioSessionSeg.php';
include('funcProfesor.php');
$link = conn();
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
$query = "SELECT * FROM Empresas";
$result = mysqli_query($link, $query);
$IDUser = $_SESSION['id'];
$IDSP_ACTUAL = $_POST['SPID'];


$query2 = "SELECT Profesor.NombreCompleto FROM Profesor INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor=Profesor_Usuarios.RFCProfesor INNER JOIN Usuarios ON Profesor_Usuarios.UID=Usuarios.UID WHERE Usuarios.UID='$IDUser'";
$result2 = mysqli_query($link, $query2);

$query3 = "SELECT * FROM SolicitudProyecto WHERE SPID = '$IDSP_ACTUAL'";
$result3 = mysqli_query($link, $query3);
$row = mysqli_fetch_array($result3);

?>
<?php
include 'headprofesores.php';
?>
<div class="col ms-sm-auto px-4">
	<div class="container col-9">
		<form action="exc/UpdateSP.php" method="POST" class="mt-5 mb-5 shadow-lg" style="background-color: #E9ECEF;">
		<input type="hidden" name="vSPID" value="<?php echo $IDSP_ACTUAL;?>">
			<div class="p-2 rounded-top" style=" background-color: #384970; color: white;">
				<h2 class="text-center text-white">Editar Proyecto Propuesto </h2>
			</div>
			<div class="mt-3 p-3">
				<label for="nombreProy" class="form-label h6">Nombre del Proyecto:</label>
				<textarea name="nombreProy" class="form-control" rows="4"><?php echo $row[1] ?></textarea>
			</div>
			<div class="p-3">
				<label for="objetivo" class="form-label h6">Objetivo del Proyecto:</label>
				<textarea name="objetivo" class="form-control" rows="4"><?php echo $row[2] ?></textarea>
			</div>
			<div class="p-3">
				<label for="descripcion" class="form-label h6">Descripción del Proyecto:</label>
				<textarea name="descripcion" class="form-control" rows="4"><?php echo $row[3] ?></textarea>
			</div>
			<div class="p-3">
				<label for="impacto" class="form-label h6">Impacto del Proyecto:</label>
				<p class="text-muted">Establecer la importancia y aporte de la investigación propuesta en
					función de la generación de conocimiento, el desarrollo tecnológico, la innovación y la
					solución de problemas locales, nacionales o internacionales.</p>
				<textarea name="impacto" class="form-control" rows="4"><?php echo $row[4] ?></textarea>
			</div>
			<div class="p-3">
				<label for="lugar" class="form-label h6">Lugar donde se va a desarrollar:</label>
				<input name="lugar"  type="text" class="form-control" value="<?php echo $row[5] ?>">
			</div>
			<div class="container p-3">
				<div class="row">
					<div class="col">
						<label for="numEstudiantes" class="form-label h6">Cantidad de
							estudiantes:</label>
						<input type="number" name="numEstudiantes" class="form-control" min="1" placeholder="0" value="<?php echo $row[6] ?>">
					</div>
					<div class="col">
						<label for="tiempoProy" class="form-label h6">Tiempo estimado de
							proyecto:</label>
						<div class="input-group">
							<input name="tiempoProy" type="number" class="form-control" min="0" placeholder="0" value="<?php echo $row[7] ?>">
							<span class="input-group-text">MES(ES)</span>
						</div>
					</div>
				</div>
			</div>
			<div class="container p-3">
				<div class="row">
					<div class="col">
						<label for="tipoPropuesta" class="form-label h6">Tipo de propuesta:</label>
						<select name="tipoProp">
							<option value="INTERNO" <?php if($row[8]=='INTERNO') echo "checked" ?>>INTERNO</option>
							<option value="EXTERNO" <?php if($row[8]=='EXTERNO') echo "checked" ?>>EXTERNO</option>
							<option value="DUAL" <?php if($row[8]=='DUAL') echo "checked" ?>>DUAL</option>
							<option value="CIIE" <?php if($row[8]=='CIIE') echo "checked" ?>>CIIE</option>
						</select>
					</div>
					<div class="col">
						<label for="docenteResp" class="form-label h6">Docente Responsable:</label>
						<?php 
						$rowDRS = mysqli_fetch_array($result2);
						?>
						<input class="inp-sr" type="text" name="docenteResp" size="20" disabled value="<?php echo $rowDRS['NombreCompleto']; ?>">
					</div>
				</div>
			</div>
			<div class="p-3">
				<label for="lineaInv" class="form-label h6">Línea de investigación que
					beneficia:</label>
				<input type="text" name="lineaInv" class="form-control" value="<?php echo $row[9] ?>">
			</div>
			<div class="p-3">
				<label for="referencias" class="form-label h6">Incluya las referencias esenciales para
					enmarcar el contenido de su propuesta:</label>
				<textarea class="form-control" rows="4"><?php echo $row[10] ?></textarea>
			</div>
			<div class="p-3">
				<label for="nombreEmpresa" class="form-label h6">Nombre de la Empresa:</label>
				<select class="form-select" name="Empresas">
							<?php
							// Ciclo para mostrar los resultados en el combobox
							while ($rowE = mysqli_fetch_array($result)) {
								echo '<option value="'.$rowE['ERFC'].'"';
                                if($rowE[0]==$row[13]) echo "selected";
								echo '>';
                                echo $rowE['ENombre']."</option>";
							}
							?>
				</select>
			</div>
			<div class="mb-3 p-3">
				<label class="form-label h6">Carrera Requerida de los estudiantes:</label>
				<?php
							#$row2 = mysqli_fetch_array($result4)
							$query = getCarreras();
							

                			while($consulta = mysqli_fetch_array($query)){
								$idCarrera = $consulta['CID'];
								$nombreCarrera = $consulta['Nombre'];
								$queryCS = getCarrerasXSolicitud($IDSP_ACTUAL);
						?>

								<br>
							<input type="checkbox" class="form-check-input" name="carreraReq[]" value="<?php echo $idCarrera; ?>" 
							<?php
								while($consultaCS = mysqli_fetch_array($queryCS)){
									$idCarreraCS = $consultaCS['CID'];
									if($idCarreraCS == $idCarrera){
										echo 'checked';
									}
								}	
							?>
							><?php echo $nombreCarrera; ?><br>
							
							
						<?php } #end while?>
			</div>
			<div class="d-flex justify-content-around p-4 rounded-bottom" style="background-color: #384970;">
				<button type="submit" class="btn btn-success btn-lg">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-check-circle" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
						<path
							d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
					</svg> Actualizar
				</button>
				<a href="#" class="btn btn-danger btn-lg" onclick="window.close()"><svg
						xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-box-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
						<path fill-rule="evenodd"
							d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
					</svg> Cancelar</a>
			</div>
		</form>
	</div>
</div>
<?php
include 'footer.php';
?>