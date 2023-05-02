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
				<h1>Asignación de Solicitud de proyecto</h1>
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
				<td class="sticky">Nombre del proyecto</td>
				<td class="sticky">Objetivo</td>
				<td class="sticky">Numero Estudiantes</td>
				<td class="sticky">Tiempo Estimado</td>
				<td class="sticky">Docente responsable</td>
				<td class="sticky">Asignar a: </td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($row = mysqli_fetch_array($result)){
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp"><p><?php echo $row[5]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[6]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[7]?></p></th>
						<th class="tb-th-asp">Tiempo Estimado</th>
						<?php 
							$row2 = "NULL"; 
							$query = "SELECT `Profesor`.`NombreCompleto`,`Profesor`.`DID`  FROM `SolicitudProyecto` INNER JOIN `Profesor_Usuarios` INNER JOIN `Profesor` ON `SolicitudProyecto`.`ID_Asesor_Sugerido` = `Profesor_Usuarios`.`UID`AND `Profesor_Usuarios`.`RFCProfesor` = `Profesor`.`RFCProfesor`  WHERE `SolicitudProyecto`.`ID_Asesor_Sugerido` = '$row[3]';";
							$result2 = mysqli_query($link, $query);
							$row2 = mysqli_fetch_array($result2);						
						?>
						<th class="tb-th-asp"><?php if (!empty($row2[0])){  echo $row2[0];}else{ echo "Sin Responsable";} ?></th>
						<form action="docs/generador.php"> 
							<th class="tb-th-asp">
							<select name="comision">
								<?php 
									$query2 = "SELECT RFCProfesor, NombreCompleto FROM Profesor WHERE Profesor.DID = '$row2[1]'";
									$result3 = mysqli_query($link, $query2);
									while ($row3 = mysqli_fetch_array($result3)){
										?>
											<option value="<?php echo $row3[0]; ?>"> <?php echo $row3[1] ?> </option>
										<?php
									}
								?>
							</select>
							</th>
							<th class="tb-th-asp">
								<input type="submit" value="Asignar">
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