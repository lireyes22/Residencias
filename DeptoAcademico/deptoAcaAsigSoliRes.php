<?php 
	include ('funcionesDepto.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT UAlumno, UIDResponsable, SPNombre_Proyecto FROM SolicitudProyecto WHERE SPEstatus = 'PENDIENTE'";
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
						<th class="tb-th-asp"> - </th>
						<?php
							$profesor3 = "SELECT Profesor.NombreCompleto, Profesor.DID FROM Profesor INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor  = Profesor_Usuarios.RFCProfesor WHERE Profesor_Usuarios.UID = '$row[1]'";
							$profesor = mysqli_query($link, $profesor3);
							$rowProfesor = mysqli_fetch_array($profesor);
						?>
						<th class="tb-th-asp"><?php echo $rowProfesor[0]; ?></th>
							<th class="tb-th-asp">
							
							<form action="docs/generador.php" method="POST" target="blank">
							<select name="profesor">
								<?php 
									$comision = "SELECT NombreCompleto FROM Profesor WHERE Profesor.DID = '$rowProfesor[1]'";
									$resultComision = mysqli_query($link, $comision);
									while ($rowComision = mysqli_fetch_array($resultComision)){
										?>
											<option value="<?php echo $rowComision[0]; ?>"> <?php echo $rowComision[0] ?> </option>
										<?php
									}
								?>
							</select>
							</th>
							<th class="tb-th-asp">
							<?php 
								$query4 = "SELECT DNombre FROM Departamentos WHERE Departamentos.DID = '$rowProfesor[1]'";
								$depto = mysqli_query($link, $query4);
								$rowDepto = mysqli_fetch_array($depto);
							?>
								<input type="hidden" name="departamento" value="<?php echo $rowDepto[0]; ?>">
								<input type="hidden" name="noOficio" value="6061">
								<input type="hidden" name="firma" value="Vve+KIMdhPjSiPoA+oFPOI1+DHhbIZpAfjHDjdvuDpN9ga4g">
								<input type="hidden" name="fecha" value="01-05-2023">
								<input type="hidden" name="mes" value="06">
								<input type="hidden" name="dia" value="01">
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