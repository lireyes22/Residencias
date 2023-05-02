<!DOCTYPE html>
<html>

<head>
	<title>Mi sitio web</title>
	<link rel="stylesheet" href="style/style.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>SOLICITUD RESIDENCIA</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Solicitud Residencia</a>
			<a href="a.html" class="button-link">Proyetos</a>
			<a href="a.html" class="button-link">Reportes</a>
			<a href="a.html" class="button-link">Asesorias</a>
			<a href="a.html" class="button-link">FUCK</a>
		</div>
	</div>
	<div>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Objetivo</th>
					<th>Participantes</th>
					<th>Campo</th>
					<th>Descripción</th>
					<th>Solicitar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				while ($i < 100) {
					?>
					<tr>
						<th>ENombre</th>
						<th>EObjetivo</th>
						<th>EParticipantes</th>
						<th>ECampo</th>
						<th>EDescripción</th>
						<th>ESolicitar</th>
					</tr>
					<?php
					$i++;
				}
				?>
			</tbody>
		</table>
	</div>

</body>
</html>
