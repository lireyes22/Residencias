<?php
	include ('../InicioSessionSeg.php');
	include ('funcionesDepto.php');
	$UID = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Departamento Académico</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="Style/styleDepto.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Dep. Académico</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Lista de Proyectos</h1>
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
	<div>
		<table>
			<thead>
				<tr>
                    <th>Nombre del trámite</th>
                    <th>Fecha Límite</th>
					<th>Actualizar Fecha</th>
                </tr>
			</thead>
			<?php	
				$query = getFechas();
				while($consulta = mysqli_fetch_assoc($query)){
					$FVTramite = $consulta['FVTramite'];
					$FVFechaLimite = $consulta['FVFechaLimite'];
					$FVDescripcionTramite = $consulta['FVDescripcionTramite'];				
			?>
			<tbody>
			<form action="" method="post">
				<input type="hidden" name="FVTramite" value="<?php echo $FVTramite; ?>">
				<td><?php echo $consulta['FVDescripcionTramite'];?></td>
				<td><input name="FVNewFechaLimite" type="date" min="<?php echo date('Y-m-d', strtotime('-1 day')); ?>" value="<?php echo $consulta['FVFechaLimite'];?>"></td>
				<td><input name="UpdFecha" type="submit" formaction="exc/UpdateFechaLimite.php" value="Actualizar" class="btn btn-actualizar"></td>
			</form>
			</tbody>
			<?php } #fin del while?>
		</table>
	</div>
</body>
</html>