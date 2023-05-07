<?php 
	/*include ('funcProfesor.php');
	$link = conn();
	$nameProy = $_POST['nombreProy'];
	$objetivoProy = $_POST['objetivo'];
	$descripcionProy = $_POST['descripcion'];
	$impactoProy = $_POST['impacto'];
	$lugarProy = $_POST['lugar'];
	$docenteResProy = $_POST['docenteResp'];
	$estudiantesReqProy = $_POST['estudiantesReq'];
	$tiempoEstProy = $_POST['tiempoEst'];
	$carreraReqProy = $_POST['carreraReq'];
	$tipoPropProy = $_POST['tipoProp'];
	$lineaInvsProy = $_POST['lineaInv'];
	$referebciasEProy = $_POST['refEsenciales'];
	#Falta la carrera requerida en la base de datos
    $query = "INSERT INTO SolicitudProyecto (SPNombreProyecto, SPObjetivo, SPDescripcion, SPImpacto, SPLugar, SPEstudiantesRequeridos, SPTipo, SDTiempoEstimado, SPLineaInvestigacion , SPReferencias, UIDResponsable) 
	VALUES('$nameProy','$objetivoProy','$descripcionProy','$impactoProy','$lugarProy','$estudiantesReqProy','$tipoPropProy','$tiempoEstProy','$lineaInvsProy','$referebciasEProy','$docenteResProy');";
	$result = mysqli_query($link, $query);*/
	include ('funcProfesor.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM Empresas ";
    $result = mysqli_query($link, $query);
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
					<a href="index.php"><img src="../img/logout.png" width="40px"></a>
				</div>
			</div>
			<div class="button-row">
				<a href="index.php" class="button-link">Comisiones</a>
				<a href="index.php" class="button-link">Proyectos Registrados</a>
				<a href="index.php" class="button-link">Registrar Proyecto</a>
				<a href="profesorSoliRes.php" class="button-link">Solicitudes de Residencia</a>
				<a href="profesorRevProyRes.php" class="button-link">Solicitudes de Proyecto</a>
			</div>
		</div> 
		<div class="fondoP">
			<div class="datosSolicitudproy">
				<form action="">
					<H3>Nombre del Proyecto</h3> 
						<input class="inp-sr" type="text" name="nombreProy" required size="45%"><br>
						<H3>Objetivo Proyecto</h3>
							<textarea class="ta-sp" name="objetivo" cols="150" rows="4"> </textarea><br>
							<H3>Descripción del Proyecto</h3> 
								<textarea class="ta-sp" name="descripcion" cols="150" rows="4"></textarea><br>
								<H3>Impacto del proyecto</h3> 
									<div>
										<p class="parrafo">Establecer la importancia y aporte de la investigación propuesta en función de la generación de conocimiento, 
										el desarrollo tecnológico, la innovación y la solución de problemas locales, nacionales o internacionales.</p>
									</div>
									<textarea class="ta-sp" name="impacto" cols="150" rows="4"></textarea> <br><br>
									<label class="lb-sr" for="DocenteResp">Lugar donde se va a desarrollar: </label>
									<input class="inp-sr" type="text" name="lugar" size="20"> <br><br>
									<label class="lb-sr" for="DocenteResp">Docente Responsable: </label>
									<input class="inp-sr" type="text" name="DocenteResp" size="20" disabled>
									<br><br>
									<label class="lb-sr" for="estudiantes-req">Cantidad de estudiantes requeridos: </label>
									<input class="inp-sr" type="text" name="estudiantesReq" size="2"><br><br>
									<label class="lb-sr" for="tiempoEst">Tiempo estimado de proyecto: </label>
									<input class="inp-sr" type="text" name="tiempoEst" size="2"> 
									<label class="lb-sr" for="tiempoEst">MES(ES)</label> <br><br>
									<label class="lb-sr" for="carreraReq">Carrera Requerida por los estudiantes: </label><br>
									<input type="checkbox" name="carreraReq" value="6">Ing. en Sistemas Computacionales<br>
									<input type="checkbox" name="carreraReq" value="1">Ing. en Tecnologías de la información
									<br><br>
									<label class="lb-sr" for="tipoProp">Tipo de propuesta:</label>
									<select name="tipoProp">
										<option value="opcion1">INTERNO</option>
										<option value="opcion2">EXTERNO</option>
										<option value="opcion3">DUAL</option>
										<option value="opcion4">CIIE</option>
									</select>
									<br><br>
									<label class="lb-sr" for="lineaInv">Linea de investigación que beneficia: </label>
									<input class="inp-sr" type="text" name="lineaInv" size="60%">
									<br><br>
									<textarea class="ta-sp" name="refEsenciales" cols="150" rows="4"></textarea><br><br>
									<label class="lb-sr" for="EmpresaName">Nombre de la Empresa:</label>
									<select name="Empresas">
										<?php

  										// Ciclo para mostrar los resultados en el combobox
										while ($row = mysqli_fetch_array($result)) {
											echo "<option value='".$row['EID']."'>".$row['ENombre']."</option>";
										}

  										// Cierre de la conexión a la base de datos
										mysqli_close($conexion);
										?>
									</select>
									<input class= "boton" type="submit" name="enviar" value="Enviar">

								</form>
							</div>
						</div>
					</body>
					</html>