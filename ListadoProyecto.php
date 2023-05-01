<!DOCTYPE html>
<html>

<head>
	<title>Listado De Proyectos</title>
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
				<h2>LISTADO DE PROYECTOS</h2>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Solicitud de residencia</a>
			<a href="a.html" class="button-link">Proyectos</a>
			<a href="a.html" class="button-link">Reporte</a>
			<a href="a.html" class="button-link">Asesorias</a>
			<a href="a.html" class="button-link">Faq &nbsp;<img src="img/pregunta.jpg" width="20px"></a>
		</div>
	</div>
	<br>
	<img src="img/lupa.png" height="20" widt="20">&nbsp;&nbsp;<input name='buscar' type='text' size="20" value="" align="right">

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
				while ($i < 100) {
				?>
			<tr <?php if ($i % 2 == 0) echo "class='par'" ?>>
				<th class="tb-th-asp">Nombre</th>
				<th class="tb-th-asp">Objetivo</th>
				<th class="tb-th-asp">Numero Estudiantes</th>
				<th class="tb-th-asp">Tiempo Estimado</th>
				<th class="tb-th-asp">Docente responsable</th>
				<form action="">
					<th class="tb-th-asp">
						<select name="comision">
							<option>option 1</option>
							<option>option 2</option>
							<option>option 3</option>
							<option> option 4 </option>
							<option> option 5 </option>
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