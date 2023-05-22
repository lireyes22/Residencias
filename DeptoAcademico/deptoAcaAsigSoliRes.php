<?php 
	include ('funcionesDepto.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT SolicitudResidencia.UAlumno, SolicitudProyecto.UIDResponsable, SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPID  FROM SolicitudProyecto INNER JOIN SolicitudResidencia INNER JOIN `BancoProyectos` ON SolicitudResidencia.`BPID` = BancoProyectos.`BPID` AND SolicitudProyecto.`SPID` = BancoProyectos.`SPID` WHERE SREstatus = 'PENDIENTE';";
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
				<h1>Asignación de Solicitud de Residencia</h1>
			</div>
			<div class="right-column">
				<a href="config.php"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuDeptoAcademico.html';
        ?>
	</div>
	<div class="tabla-scroll">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre del proyecto</td>
				<td class="sticky">Nombre Residente</td>
				<td class="sticky">Número Control</td>
				<td class="sticky">Tipo Proyecto</td>
				<td class="sticky">Asesor Interno</td>
				<td class="sticky">Asignar a: </td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($row = mysqli_fetch_array($result)){
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp"> <?php echo $row[2]; ?> 
						
						</th>
						<?php 
							$query2 = "SELECT Alumnos.NumeroControl, Alumnos.NombreCompleto, Alumnos.CID FROM Alumnos INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl  WHERE Alumno_Usuarios.UID = '$row[0]'";
							$alumno = mysqli_query($link, $query2);
							$rowAlumno = mysqli_fetch_array($alumno);
						?>
						<th class="tb-th-asp"><?php echo $rowAlumno[1]; ?>
						
						</th>
						<th class="tb-th-asp"><?php echo $rowAlumno[0]; ?>
						<?php 
							$query5 = "SELECT Nombre FROM Carreras WHERE Carreras.CID = '$rowAlumno[2]'";
							$carrera = mysqli_query($link, $query5);
							$rowCarrera = mysqli_fetch_array($carrera);
						?>
						
						</th>
						<?php 
							$queryTipo = "SELECT SPTipo FROM SolicitudProyecto WHERE SolicitudProyecto.SPID = $row[3]";
							$tipo = mysqli_query($link, $queryTipo);
							$rowTipo = mysqli_fetch_array($tipo);
						?>
						<th class="tb-th-asp"> <?php echo $rowTipo[0]; ?> </th>
						<?php
							$profesor3 = "SELECT Profesor.NombreCompleto FROM Profesor INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor  = Profesor_Usuarios.RFCProfesor WHERE Profesor_Usuarios.UID = $row[1];";
							$profesor = mysqli_query($link, $profesor3);
							$rowProfesor = mysqli_fetch_array($profesor);
							$departamentoQ = "SELECT Carreras.`DID` FROM `Carreras` INNER JOIN `CarrerasSolicitudProyecto` INNER JOIN `SolicitudProyecto` ON Carreras.`CID` = CarrerasSolicitudProyecto.`CID` AND SolicitudProyecto.`SPID` = CarrerasSolicitudProyecto.`SPID` WHERE CarrerasSolicitudProyecto.`SPID` = '$row[3]';";//AQUI TENGO QUE SACAR EL DID DEL PROYECTO
							$departamento = mysqli_query($link, $departamentoQ);
							$rowDeptoID = mysqli_fetch_array($departamento);
						?>

						<th class="tb-th-asp"><?php echo $rowProfesor[0]; ?></th>
							<th class="tb-th-asp">
							
							<select name="profesor">
								<?php 
									$comision = "SELECT NombreCompleto FROM Profesor WHERE Profesor.DID = '$rowDeptoID[0]'";
									$resultComision = mysqli_query($link, $comision);
									while ($rowComision = mysqli_fetch_array($resultComision)){
										?>
											<option value="<?php echo $rowComision[0]; ?>"> <?php echo $rowComision[0] ?> </option>

										<?php
										$nombre = $rowComision[0];
									} 
								?>
							</select>
							</th>
							<th class="tb-th-asp">
							<?php 
								$query4 = "SELECT DNombre FROM Departamentos WHERE Departamentos.DID = '$rowDeptoID[0]'";
								$depto = mysqli_query($link, $query4);
								$rowDepto = mysqli_fetch_array($depto);
							?>
								<form action="docs/generador.php" method="POST" target="blank">
								<input type="hidden" name="profesor" value="<?php echo $nombre; ?>">
								<input type="hidden" name="departamento" value="<?php echo $rowDepto[0]; ?>">
								<input type="hidden" name="noOficio" value="6061"> 
								<input type="hidden" name="firma" value="Vve+KIMdhPjSiPoA+oFPOI1+DHhbIZpAfjHDjdvuDpN9ga4g">
								<input type="hidden" name="fecha" value="<?php	echo date("d-m-Y"); ?>">
								<input type="number" name="mes" min="1" max="12" PLACEHOLDER="MES">
								<input type="number" name="dia" min="1" max="30" PLACEHOLDER="DIA">
								<input type="hidden" name="proyecto" value="<?php echo $row[2]; ?>">
								<input type="hidden" name="residente" value="<?php echo $rowAlumno[1]; ?>">
								<input type="hidden" name="carrera" value="<?php echo $rowCarrera[0]; ?>">
								<input type="submit" value="Asignar">
								</form>
							</th>
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