<?php 
	include ('funcionesDepto.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT * FROM SolicitudProyecto WHERE SPEstatus = 'ACEPTADO'";
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
				<h1>Lista de Proyectos</h1>
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
	<div class="tabla-scroll">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre Proyecto</td>
				<td class="sticky">Objetivo</td>
				<td class="sticky">Número Estudiantes</td>
				<td class="sticky">Tiempo Estimado</td>
				<td class="sticky">Docente Responsable</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp"><p><?php echo $row[1]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[2]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[6]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[7]?></p></th>
						<?php 
							$row1 = "NULL"; 
							$query = "SELECT `Profesor`.`NombreCompleto`,`Profesor`.`DID`  FROM `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` INNER JOIN `Profesor` ON `SolicitudProyecto`.`UIDResponsable` = `Profesor_Usuarios`.`UID`AND `Profesor_Usuarios`.`RFCProfesor` = `Profesor`.`RFCProfesor`  WHERE `SolicitudProyecto`.`UIDResponsable` = '$row[11]';";
							$result1 = mysqli_query($link, $query);
							$row1 = mysqli_fetch_array($result1);						
						?>
						<th class="tb-th-asp"><?php if (!empty($row1[0])){  echo $row1[0];}else{ echo "Sin Responsable";} ?></th>
						<form action="deptoAcaAsigAsesor.php" method="_POST" target ="blank">
							<th class="tb-th-asp">
								<input type="submit" value="Asignar">
							</th>
						</form>
						<form action="deptoAcaReasigAsesor.php" method="_POST" target ="blank">
							<th class="tb-th-asb">
								<input type="submit" value="Reasignar">
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