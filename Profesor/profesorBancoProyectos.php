<?php 
include '../InicioSessionSeg.php';
	include ('funcProfesor.php');
	$UID = $_SESSION['id'];
	$DID = mysqli_fetch_array(DID($UID));
	$result = banco($DID[0]);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Profesor</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="Style/StyleProfesor.css">
</head>

<body style="margin: 0;" id="banco-p">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Profesor</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Banco de Proyectos</h1>
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
	<div class="tabla-scroll">
		<table class = "tb-asp">
				<tr> 
					<td class="sticky">Nombre del proyecto</td>
					<td class="sticky">Objetivo</td>
					<td class="sticky">Número Estudiantes</td>
					<td class="sticky">Tiempo Estimado</td>
					<td class="sticky">Docente Responsable</td>
					<td class="sticky"></td>
				</tr>
				<tr>
				<?php
					$i = 0;
					while ($row = mysqli_fetch_array($result)){
						?>
						<tr <?php if($i%2==0) echo "class='par'" ?> >
							<th class="tb-th-asp"><p><?php echo $row[1];?></p></th>
							<th class="tb-th-asp"><p><?php echo $row[2];?></p></th>
							<?php 
								$numeroActual = estudiantesActuales($row[0]);
							?>
							<th class="tb-th-asp"><p><?php echo $numeroActual;?></p></th>
							<th class="tb-th-asp"><p><?php echo $row[4];?> MESES</p></th>
							<th class="tb-th-asp"><p><?php echo $row[5];?></p></th>
							<form action="profesorBancoProyectos-visualiza.php" target="BLANK" method="post">
								<th class="tb-th-asp">
									<input type="hidden" name="idProy" value=<?php echo $row[0]; ?>>
									<input type="submit" value="Visualizar">
								</th>
							</form>
						</tr>
						<?php
						$i++;
					}
					?>
				</tr>
		</table>
	</div>
</body>
</html>