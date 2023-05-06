<?php 
	include ('funcionesDepto.php');
	$SPID = $_POST['SPID'];
	$UID = 13;
	$row = mysqli_fetch_array(basicInfoProy($SPID));
	$DID = mysqli_fetch_array(DID($UID));
	$BPID = mysqli_fetch_array(bancoSPID($SPID));
	$Residentes = alumnosResidencia($BPID[0]);
	$solicitudResidencia = mysqli_fetch_array(residenciaSol($BPID[0]));
	$nombreEmpresa = mysqli_fetch_array(empresa($SPID));
	$RFC = mysqli_fetch_array(asesorInterno($BPID[0]));
	$docentes = listaDocentes($DID[0], $RFC[0]);
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
				<h1>Asignar Asesor</h1>
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
	<form action="exc/insert.php" method="POST">
	<input type="hidden" name="IDfuncion" value="asignacion">
		<div class="panel-izq">
			<label for="noOficio">No. de Oficio: </label>
			<input type="text" name="noOficio"> <br> <br>
			<label for="depto">Departamento: </label>
			<input type="text" name="depto" disabled value="<?php
				$NombDepto = mysqli_fetch_array(nombreDepartamento($DID[0]));
			 	echo $NombDepto[0]; 
			 ?>" size='30'> <br> <br>
			<?php 
			while ($Residente = mysqli_fetch_array($Residentes)) {
				?>
					<label for="nombre">Nombre de Residente: </label>
					<input type="text" name="nombre" disabled value="<?php echo $Residente[0]; ?>" size="30"> <br> <br>
					<label for="carrera">Carrera: </label>
					<input type="text" name="carrera" disabled value="<?php echo $Residente[1]; ?>" size="30"> <br> <br>
				<?php
				}
			?>
		</div>
		<div class="panel-der">
			<label for="period">Perido de Realizacion: </label>
			<input type="text" name="period" disabled value="<?php echo $solicitudResidencia[4]; ?>"> <br> <br>
			<label for="docente">Docente: </label>
			<select name="docente">
			<?php //RFC
				while ($profesor = mysqli_fetch_array($docentes)){
			?>
				<option value="<?php echo $profesor[0]; ?>"> <?php echo $profesor[1] ?> </option>
			<?php
				$UProfesor = mysqli_fetch_array(UProfesor($profesor[0]));
			}
			?>
			</select> <br> <br>
			<label for="empresa">Empresa: </label>
			<input type="text" name="empresa" disabled value="<?php echo $nombreEmpresa[0]; ?>" size="30"> <br> <br>
		</div>
		<div class="tb-th-asp">
			<input type="hidden" name="periodo" value="<?php echo $solicitudResidencia[4];; ?>"> <br> <br>
			<input type="hidden" name="BPID" value="<?php echo $BPID[0]; ?>">
			<input class="medium" type="submit" value="Asignar">
		</div>
	</form>
	</div>
</body>
</html>