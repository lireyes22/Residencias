<?php 
include '../InicioSessionSeg.php';
	include ('funcProfesor.php');
	$UID = $_SESSION['id'];
	$result = listSPIDsolicitudes($UID); //SUS 
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
		<table class = "tb-asp" id="obsrv">
				<tr> 
					<td class="sticky" colspan="3">ESTATUS DE MIS PROYECTOS</td>
					<td class="sticky"> OBSERVACIONES </td>
					<td class="sticky">OPCIONES</td>
				</tr>
				<tr> 
				<?php
					while ($proy = mysqli_fetch_array($result)){
						$row = mysqli_fetch_array(listProySolicitados($proy[0]));
						if($row[1] == 'PENDIENTE'){
							$colspan = 1;
							$color = '_azul';
						}else if($row[1] == 'REVISION'){
							$colspan = 2;
							$color = '_amarillo';
						}else if($row[1] == 'ACEPTADO'){
							$colspan = 3;
							$color = '_verde';
						}else if($row[1] == 'RECHAZADO'){
							$colspan = 3;
							$color = '_rojo';
						}
						?>
						<tr class="par">
							<th class="tb-th-asp" id="nombProy" colspan="4"><?php echo $row[0]; ?></th>
							<th rowspan="2" class="tb-th-asp" style="border: 1px solid;">
								<?php 
									if($row[1] != 'ACEPTADO' && $row[1] != 'RECHAZADO' && $row[1] != 'REVISION'){
										?>
										<form action="profesorEditProyRes.php" method="POST" target ="blank">
											<input type="hidden" name="SPID" value="<?php echo $proy[0]; ?>">
											<input type="submit" value="EDITAR" class="tb-th-asb">
										</form>
										<?php
									}
								?>
							</th>
						</tr>
						<tr>
							<th class="tb-th-asp" id="<?php echo $color; ?>" colspan="<?php echo $colspan; ?>"><?php echo $row[1]; ?></th>
							<th class="tb-th-asp"><?php 
								if($row[1] != 'PENDIENTE'){
									$obsrv = observaciones($proy[0]);
									echo $obsrv;
								}
							?></th>
						</tr>
						<?php
					}
					?>
				</tr>
		</table>
	</div>
</body>
</html>