<?php 
	include ('Alumfunciones.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT * FROM SolicitudProyecto";
    $result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Listado De Proyectos</title>
	<link rel="stylesheet" href="../style/styleAlumno.css">
	<link rel="stylesheet" href="../style/style.css">

</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h2>LISTADO DE PROYECTOS</h2>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="AlumSolicitudResidencia.php" class="button-link">Solicitud de residencia</a>
			<a href="a.html" class="button-link">Proyectos</a>
			<a href="a.html" class="button-link">Reporte</a>
			<a href="a.html" class="button-link">Asesorias</a>
			<a href="a.html" class="button-link">Faq &nbsp;<img src="../img/pregunta.jpg" width="20px"></a>
		</div>
	</div>
	<br>
	<img src="../img/lupa.png" height="20" widt="20">&nbsp;&nbsp;<input name='buscar' type='text' size="20" value="" align="right">

	<select name="Selecion" id="Seleccion">
		<option value="Seleccione uno...">Seleccione uno...</option>
		<option value="Objetivo Proyecto">Objetivo Proyecto</option>
		<option value="Participantes">Participantes</option>
		<option value="Campos">Campos</option>
		<option value="Descripción">Descripción</option>
		<option value="Nombre del Proyecto">Nombre del Proyecto</option>
	</select>

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
						<form action="AlumSolicitudResidencia.php" method="Post">
							<th class="tb-th-asp"> 
								<input type="hidden" name="enviar" value="<?php echo $row['SPID'];?>">
								<input type="submit" value="Solicitar" data-proyecto-id="<?php echo $row['SPEstatus']; ?>">
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