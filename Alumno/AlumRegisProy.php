<?php 
	include '../InicioSessionSeg.php';
	include ('Alumfunciones.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query= "SELECT * FROM Empresas";
    $result = mysqli_query($link, $query);
    $IDUser=$_SESSION['id'];
    $query2="SELECT Alumnos.NombreCompleto FROM Alumnos INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl=Alumno_Usuarios.NumeroControl INNER JOIN Usuarios ON Alumno_Usuarios.UID=Usuarios.UID WHERE Usuarios.UID='$IDUser'";
	$result2 = mysqli_query($link, $query2);
?>
	<!DOCTYPE html>
	<html>
    <head>
    	<title>Alumno</title>
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
					<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
				</div>
			</div>
			<?php
			include 'MenuAlumno.html';
			?>
		</div> 
		<div class="fondoP">
			<div class="datosSolicitudproy">
				<form action="exc/insertSP.php" method="POST">
					<div>
						<h3>Nombre del Proyecto</h3> 
						<input class="inp-sr" type="text" name="nombreProy" required size="100%"><br>
						<h3>Objetivo Proyecto</h3>
						<textarea class="ta-sp" name="objetivo" cols="150" rows="4"> </textarea><br>
						<h3>Descripción del Proyecto</h3> 
						<textarea class="ta-sp" name="descripcion" cols="150" rows="4"></textarea><br>
						<h3>Impacto del proyecto</h3> 
						<div>
							<p class="parrafo">Establecer la importancia y aporte de la investigación propuesta en función de la generación de conocimiento, 
							el desarrollo tecnológico, la innovación y la solución de problemas locales, nacionales o internacionales.</p>
						</div>
						<textarea class="ta-sp" name="impacto" cols="150" rows="4"></textarea> <br><br>
						<h3>Lugar donde se va a desarrollar:</h3>
						<input class="inp-sr" type="text" name="lugar" size="20"> <br><br>						
						<h3>Cantidad de estudiantes requeridos: </h3>
						<input class="inp-sr" type="number" name="numEstudiantes" min="0" max="20" step="1">
						<br><br>
						<h3>Tiempo estimado de proyecto: </h3>
						<input class="inp-sr" type="number" name="tiempoProy" min="1" max="6" step="1"> 
						<label class="lb-sr" for="tiempoEst">MES(ES)</label> <br><br>						
						<h3>Tipo de propuesta:</h3>
						<select name="tipoProp">
							<option value="INTERNO">INTERNO</option>
							<option value="EXTERNO">EXTERNO</option>
							<option value="DUAL">DUAL</option>
							<option value="CIIE">CIIE</option>
						</select>
						<br><br>						
						<h3>Linea de investigación que beneficia: </h3>
						<input class="inp-sr" type="text" name="lineaInv" size="60%">
						<br><br>
						<h3>Incluya las referencias esenciales para enmarcar el contenido de su propuesta: </h3>
						<textarea class="ta-sp" name="refEsenciales" cols="150" rows="4"></textarea><br><br>

						<h3>Alumno Responsable: </h3>
						<?php 
						$row2 = mysqli_fetch_array($result2);
						 ?>
						<input class="inp-sr" type="text" name="alumnoResp" size="20" disabled value="<?php echo $row2['NombreCompleto']; ?>">

						<br><br>
						<h3>Nombre de la Empresa:</h3>
						<select name="Empresas">
							<?php

							// Ciclo para mostrar los resultados en el combobox
							while ($row = mysqli_fetch_array($result)) {
								echo "<option value='".$row['ERFC']."'>".$row['ENombre']."</option>";
							}
							?>
						</select>
						<br><br>
						<h3>Carrera Requerida por los estudiantes: </h3>
						<input type="checkbox" name="carreraReq[]" value="6">Ing. en Sistemas Computacionales<br>
						<input type="checkbox" name="carreraReq[]" value="1">Ing. en Tecnologías de la información
						<br><br>
					</div><br><br>

						<input class="boton"type="submit" name="enviar" value="Enviar">

				</form>
			</div>
		</div>
	</body>
</html>