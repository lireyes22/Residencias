<?php
	include '../InicioSessionSeg.php';
	include ('funcProfesor.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query= "SELECT * FROM Empresas";
    $result = mysqli_query($link, $query);
    $IDUser=$_SESSION['id'];
	$IDSP_ACTUAL=$_POST['SPID'];


    $query2="SELECT Profesor.NombreCompleto FROM Profesor INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor=Profesor_Usuarios.RFCProfesor INNER JOIN Usuarios ON Profesor_Usuarios.UID=Usuarios.UID WHERE Usuarios.UID='$IDUser'";
	$result2 = mysqli_query($link, $query2);

    $query3 = "SELECT * FROM SolicitudProyecto WHERE SPID = '$IDSP_ACTUAL'";
    $result3 = mysqli_query($link, $query3);
	$row = mysqli_fetch_array($result3);

?>
	<!DOCTYPE html>
	<html>
    <head>
    	<title>Profesor</title>
    	<link rel="stylesheet" href="../style/style.css">
    </head>

	<body style="margin: 0;">
		<div class="container">
			<div class="row">
				<div class="left-column">
					<a class="home-btn" href="index.php">
						<h2><span style="margin-right: 10px;">Profesor</span></h2>
						<img src="../img/sombrero.png" width="50px">
					</a>
				</div>
				<div class="center-column">
					<h1>Solicitar Proyecto</h1>
				</div>
				<div class="right-column">
					<a href="../usuariosConfig.php?idUsuario=<?php echo $_SESSION['id'];?>"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
					<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
				</div>
			</div>
			<?php
			include 'MenuProfesor.html';
			?>
		</div> 
		<div class="fondoP">
			<div class="datosSolicitudproy">
				<form action="exc/UpdateSP.php" method="POST">
					<input type="hidden" name="vSPID" value="<?php echo $IDSP_ACTUAL;?>">
					<div>
						<h3>Nombre del Proyecto</h3> 
						<input class="inp-sr" type="text" name="nombreProy" required size="100%" value="<?php echo $row[1] ?>"><br>
						<h3>Objetivo Proyecto</h3>
						<textarea class="ta-sp" name="objetivo" cols="150" rows="4"><?php echo $row[2] ?></textarea><br>
						<h3>Descripción del Proyecto</h3> 
						<textarea class="ta-sp" name="descripcion" cols="150" rows="4"><?php echo $row[3] ?></textarea><br>
						<h3>Impacto del proyecto</h3> 
						<div>
							<p class="parrafo">Establecer la importancia y aporte de la investigación propuesta en función de la generación de conocimiento, 
							el desarrollo tecnológico, la innovación y la solución de problemas locales, nacionales o internacionales.</p>
						</div>
						<textarea class="ta-sp" name="impacto" cols="150" rows="4"><?php echo $row[4] ?></textarea> <br><br>
						<h3>Lugar donde se va a desarrollar:</h3>
						<input class="inp-sr" type="text" name="lugar" size="20" value="<?php echo $row[5] ?>"><br><br>						
						<h3>Cantidad de estudiantes requeridos: </h3>
						<input class="inp-sr" type="number" name="numEstudiantes" min="0" max="20" step="1" value="<?php echo $row[6] ?>">
						<br><br>
						<h3>Tiempo estimado de proyecto: </h3>
						<input class="inp-sr" type="number" name="tiempoProy" min="1" max="6" step="1" value="<?php echo $row[7] ?>"> 
						<label class="lb-sr" for="tiempoEst">MES(ES)</label> <br><br>						
						<h3>Tipo de propuesta:</h3>
						<select name="tipoProp">
							<option value="INTERNO" <?php if($row[8]=='INTERNO') echo "checked" ?>>INTERNO</option>
							<option value="EXTERNO" <?php if($row[8]=='EXTERNO') echo "checked" ?>>EXTERNO</option>
							<option value="DUAL" <?php if($row[8]=='DUAL') echo "checked" ?>>DUAL</option>
							<option value="CIIE" <?php if($row[8]=='CIIE') echo "checked" ?>>CIIE</option>
						</select>
						<br><br>						
						<h3>Linea de investigación que beneficia: </h3>
						<input class="inp-sr" type="text" name="lineaInv" size="60%" value="<?php echo $row[9] ?>">
						<br><br>
						<h3>Incluya las referencias esenciales para enmarcar el contenido de su propuesta: </h3>
						<textarea class="ta-sp" name="refEsenciales" cols="150" rows="4"><?php echo $row[10] ?></textarea><br><br>

						<h3>Docente Responsable: </h3>
						<?php 
						$rowDRS = mysqli_fetch_array($result2);
						?>
						<input class="inp-sr" type="text" name="docenteResp" size="20" disabled value="<?php echo $rowDRS['NombreCompleto']; ?>">

						<br><br>
						<h3>Nombre de la Empresa:</h3>
						<select name="Empresas">
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
						<br><br>

						<h3>Carrera Requerida de los estudiantes: </h3>
						<?php
							#$row2 = mysqli_fetch_array($result4)
							$query = getCarreras();
							

                			while($consulta = mysqli_fetch_array($query)){
								$idCarrera = $consulta['CID'];
								$nombreCarrera = $consulta['Nombre'];
								$queryCS = getCarrerasXSolicitud($IDSP_ACTUAL);
						?>


							<input type="checkbox" name="carreraReq[]" value="<?php echo $idCarrera; ?>" 
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
						<br><br><br><br><input class="boton"type="submit" name="enviar" value="Enviar">
				</form>
			</div>
		</div>
	</body>
</html>
