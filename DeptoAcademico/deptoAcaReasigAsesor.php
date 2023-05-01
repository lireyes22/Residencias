<?php 
	include ('funcionesDepto.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT * FROM SolicitudProyecto";
    $result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Departamento Academico</title>
	<link rel="stylesheet" href="../style/style.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Dep. Academico</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Reasignar Asesor</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Profesores</a>
			<a href="deptoAcaAsigSoliRes.php" class="button-link">Solicitudes de Residencias</a>
			<a href="deptoAcaAsigProyRes.php" class="button-link">Solicitudes de Proyectos</a>
			<a href="deptoAcaLisPro.php" class="button-link">Lista proyectos</a>
		</div>
	</div>
	<div class="main-cont">
		<form action="">
		<div class="panel-izq">
			<label for="noOficio">No. de Oficio: </label>
			<input type="text" name="noOficio"> <br> <br>
			<label for="depto">Departamento: </label>
			<input type="text" name="depto" disabled> <br> <br>
			<label for="nombre">Nombre de Residente: </label>
			<input type="text" name="nombre" disabled> <br> <br>
			<label for="periodo">Perido de Realizacion: </label>
			<input type="text" name="periodo" disabled> <br> <br>
		</div>
		<div class="panel-der">
			<label for="fecha">Fecha: </label>
			<input type="date" name="fecha"> <br> <br>
			<label for="docente">Docente: </label>
			<select name="docente">
				<option>Profesor 1</option>
				<option>Profesor 2</option>
				<option>Profesor 3</option>
				<option>Profesor 4</option>
			</select> <br> <br>
			<label for="carrera">Carrera: </label>
			<input type="text" name="carrera" disabled> <br> <br>
			<label for="empresa">Empresa: </label>
			<input type="text" name="empresa" disabled> <br> <br>
		</div>
		<div class="tb-th-asp">
			<input class="medium" type="submit" value="Asignar">
		</div>
		</form>
	</div>
</body>
</html>