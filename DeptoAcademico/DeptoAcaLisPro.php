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
				<h1>Lista de Proyectos</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Profesores</a>
			<a href="deptoAcaAsigAsesor.php" class="button-link">Solicitudes de Residencias</a>
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
				<td class="sticky">Asesor</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($i < 100) {
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp">Nombre Proyecto</th>
						<th class="tb-th-asp">Objetivo</th>
						<th class="tb-th-asp">Número Estudiantes</th>
						<th class="tb-th-asp">Tiempo Estimado</th>
						<th class="tb-th-asp">Asesor</th>
						<form action="">
							<th class="tb-th-asp">
								<input type="submit" value="Asignar">
							</th>
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