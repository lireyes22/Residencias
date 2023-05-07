<?php
	include 'funcProfesor.php';
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM SolicitudProyecto 
    INNER JOIN BancoProyectos ON SolicitudProyecto.SPID = BancoProyectos.SPID 
    INNER JOIN Usuarios ON SolicitudProyecto.UIDResponsable = Usuarios.UID 
    INNER JOIN UsuariosDepartamentos ON Usuarios.UID=UsuariosDepartamentos.UID
    WHERE UsuariosDepartamentos.DID='5' ";
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
				<h1>Solicitudes de Proyectos</h1>
			</div>
			<div class="right-column">
				<a href="index.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="index.php" class="button-link">Comisiones</a>
			<a href="index.php" class="button-link">Proyectos Registrados</a>
			<a href="profesorSoliProyRes.php" class="button-link">Registrar Proyecto</a>
			<a href="profesorListadoSoliRes.php" class="button-link">Solicitudes de Residencia</a>
			<a href="profesorRevProyRes.php" class="button-link">Solicitudes de Proyecto</a>
		</div>
	</div> 
		<div class="tabla-scroll">
		<table class="tb-asp">
			<tr>
			<th class="sticky">Nombre del Proyecto</th>
				<td class="sticky">Objetivo Proyecto</td>
				<td class="sticky">Descripción</td>
				<td class="sticky">Partcipantes</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr>
			<?php
				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr <?php if ($i % 2 == 0) echo "class='par'" ?>>
						<td><?php echo $row['SPNombreProyecto']; ?></td>
						<td><?php echo $row['SPObjetivo']; ?></td>
						<td><?php echo $row['SPDescripcion']; ?></td>
						<td><?php echo $row['SPEstudiantesRequeridos']; ?></td>
						<form action="profesorRevSoliRes.php" method="Post">
							<th class="tb-th-asp"> 
								<input type="hidden" name="enviar" value="<?php echo $row['SPID'];?>">
								<input type="submit" value="Revisar" data-proyecto-id="<?php echo $row['SPEstatus']; ?>">
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