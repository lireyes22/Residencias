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
				<a class="home-btn" href="a.html">
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
			<a href="asigSoliRes.php" class="button-link">Solicitudes de Residencias</a>
			<a href="asigProyRes.php" class="button-link">Solicitudes de Proyectos</a>
			<a href="a.html" class="button-link">Lista proyectos</a>
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
						<th class="tb-th-asp">Docente responsable</th>
						<form action="">
							<th class="tb-th-asp">
							<select name="comision">
								<option>option 1</option>
								<option>option 2</option>
								<option>option 3</option>
								<option>option 4</option>
								<option>option 5</option>
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