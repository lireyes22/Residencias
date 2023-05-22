<?php
include '../InicioSessionSeg.php';
	include 'funcProfesor.php';
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM SolicitudProyecto 
    INNER JOIN BancoProyectos ON SolicitudProyecto.SPID = BancoProyectos.SPID 
    INNER JOIN SolicitudResidencia ON BancoProyectos.BPID = SolicitudResidencia.BPID
    INNER JOIN Usuarios ON SolicitudProyecto.UIDResponsable = Usuarios.UID 
    INNER JOIN UsuariosDepartamentos ON Usuarios.UID=UsuariosDepartamentos.UID
    INNER JOIN Alumno_Usuarios ON SolicitudResidencia.UAlumno=Alumno_Usuarios.UID
    INNER JOIN Alumnos ON Alumno_Usuarios.NumeroControl=Alumnos.NumeroControl
    INNER JOIN Empresas ON SolicitudProyecto.ERFC=Empresas.ERFC
    WHERE UsuariosDepartamentos.DID='5' AND SolicitudResidencia.SREstatus='PENDIENTE' ";
    $result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Profesor</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="Style/StyleProfesor.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Profesor</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Solicitudes de Residencia</h1>
			</div>
			<div class="right-column">
				<a href="config.php"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
		include 'MenuProfesor.html';
		?>
	</div> 
		<div class="tabla-scroll">
		<table class="tb-asp">
			<tr>
			    <td class="sticky">Nombre del Proyecto</td>
				<td class="sticky">Nombre Residente</td>
				<td class="sticky">Nombre Empresa</td>
				<td class="sticky">Estudiantes Requeridos</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr>
			<?php
				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr <?php if ($i % 2 == 0) echo "class='par'" ?>>
						<td><?php echo $row['SPNombreProyecto']; ?></td>
						<td><?php echo $row['NombreCompleto']; ?></td>
						<td><?php echo $row['ENombre']; ?></td>
						<td><?php echo $row['SPEstudiantesRequeridos']; ?></td>
						<form action="profesorRevSoliRes.php" method="Post">
							<th class="tb-th-asp"> 
								<input type="hidden" name="SRID" value="<?php echo $row['SRID'];?>">
								<input type="submit" value="Revisar">
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