<?php 
	include ('funcionesDepto.php');
	$UID = 13;
	$DID = mysqli_fetch_array(DID($UID));
    $result = listSolicProyAcep($DID[0]);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Departamento Academico</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="style/styleDepto.css">
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
				<h1>Asignación de Asesor</h1>
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
			<label for="periodo">Periodo de Realizacion: </label>
			<input type="text" name="periodo" disabled> <br> <br>
		</div>
		<div class="panel-der">
			<label for="fecha">Fecha: </label>
			<input type="date" name="fecha"> <br> <br>
			<label for="docente">Docente: </label>
			<select name="docente">
				<?php
					$RFC = mysqli_fetch_array(RFCprofesor($row[0]));
					$listaProfesores = listaDocentes($DID[0], $RFC[0]);
						while ($profesor = mysqli_fetch_array($listaProfesores)){
						?>
							<option value="<?php echo $profesor[0]; ?>"> <?php echo $profesor[1] ?> </option>
						<?php
								$docente = mysqli_fetch_array(UProfesor($docente[0]));
							}		
						?>
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