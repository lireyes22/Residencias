<?php
	include ('funcionesDepto.php');
	$SPID = $_POST['SPID'];
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
	$row = mysqli_fetch_array(basicInfoProy($SPID));
	$DID = mysqli_fetch_array(DID($UID));
	$BPID = mysqli_fetch_array(bancoSPID($SPID));
	$solicitudResidencia = mysqli_fetch_array(existeBanco($SPID));
	$nombreEmpresa = mysqli_fetch_array(empresa($SPID));
	$anterior = mysqli_fetch_array(asesorInterno($BPID[0]));
	//$RFC = mysqli_fetch_array(responsableResidencia($SPID));
	$docentes = listaDocentes($DID[0], $anterior[0]);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Departamento Académico</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="style/styleDepto.css">
</head>

<body style="margin: 0;"  id="bgcolor">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Dep. Académico</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Reasignar Asesor</h1>
			</div>
			<div class="right-column">
				<a href="../usuariosConfig.php?idUsuario=<?php echo $_SESSION['id'];?>"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuDeptoAcademico.html';
        ?>
	</div>
	<div class="main-cont">
	<form action="exc/insert.php" method="POST">
	<input type="hidden" name="IDfuncion" value="reAsignacion">
		<div class="panel-izq">
			<label for="noOficio">No. de Oficio: </label>
			<input type="text" name="noOficio"> <br> <br>
			<label for="depto">Departamento: </label>
			<input type="text" name="depto" disabled value="<?php
				$NombDepto = mysqli_fetch_array(nombreDepartamento($DID[0]));
				echo $NombDepto[0];
			 ?>" size='30'> <br> <br>
			<?php 
					$Residentes = alumnosResidencia($BPID[0]);
					$n = 0;
					while ($Residente = mysqli_fetch_array($Residentes)) {
						$n++;
						?>
						<label for="nombre">Nombre de Residente: </label>
						<input type="text" name="nombre" disabled value="<?php echo $Residente[0]; ?>" size="30"> <br> <br>
						<label for="carrera">Carrera: </label>
						<input type="text" name="carrera" disabled value="<?php echo $Residente[1]; ?>" size="30"> <br> <br>
						<?php
					}
					if($n==0){
					?>
						<label for="nombre">Nombre de Residente: </label>
						<input type="text" name="nombre" disabled value="SIN RESIDENTES" size="30"> <br> <br>
						<label for="carrera">Carrera: </label>
						<input type="text" name="carrera" disabled value="SIN RESIDENTES" size="30"> <br> <br>
					<?php
					}
			?>
			<label for="razon">Razón de la reasignación: </label> 
			<input type="text" name="razon" required> <br> <br>
		</div>
		<div class="panel-der">
			<label for="period">Periodo de Realización: </label>
			<input type="text" name="period" disabled value="<?php echo $solicitudResidencia[5]; ?>"> <br> <br>
			<label for="anterior">Asesor anterior: </label>
			<input type="text" name="anterior" disabled value="<?php
				echo $anterior[1];
			 ?>" size="30"> <br> <br> 
			<label for="docente">Nuevo asesor: </label>
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
			<label for="proyecto">Nombre del proyecto: </label>
			<input type="text" name="proyecto" value="<?php echo $row[1]; ?>"disabled>
		</div>
		<div class="tb-th-asp">
			<input type="hidden" name="periodo" value="<?php echo $solicitudResidencia[5];; ?>"> <br> <br>
			<input type="hidden" name="BPID" value="<?php echo $BPID[0]; ?>">
			<div class="botones-buttom">
				<input class="medium" type="submit" value="Asignar">
				<button id="cancelar" class="medium" onclick="cerrarPagina()">Cancelar</button>
			</div>
			<script>
				function cerrarPagina(){
					window.close();
				}
			</script>
		</div>
	</form>
	</div>
</body>
</html>