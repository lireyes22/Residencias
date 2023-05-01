<?php 
	include ('funciones.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT * FROM SolicitudProyecto";
    $result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profesor</title>
	<link rel="stylesheet" href="style/style.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Profesor</span></h2>
					<img src="img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Solicitudes de Proyectos</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Comisiones</a>
			<a href="a.html" class="button-link">Proyectos Registrados</a>
			<a href="a.html" class="button-link">Registrar Proyecto</a>
			<a href="a.html" class="button-link">Solicitudes de Residencia</a>
			<a href="revProyRes.php" class="button-link">Solicitudes de Proyecto</a>
		</div>
	</div>
	<div class="tabla-scroll">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre del proyecto</td>
				<td class="sticky">Objetivo</td>
				<td class="sticky">Numero Estudiantes</td>
				<td class="sticky">Tiempo Estimado</td>
				<td class="sticky">Docente</td>
				<td class="sticky"></td>
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
						<th class="tb-th-asp"><p>Tiempo Estimado</p></th>
						<th class="tb-th-asp"><p>Docente responsable</p></th>
						<form action="revProyRes-evalua.php" target="BLANK" method="post">
							<th class="tb-th-asp">
								<input type="hidden" name="idProy" value=<?php echo $row[0] ?>>
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