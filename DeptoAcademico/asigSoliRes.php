<!DOCTYPE html>
<html>

<head>
	<title>Departamento Academico</title>
	<link rel="stylesheet" href="style/style.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="a.html">
					<h2><span style="margin-right: 10px;">Dep. Academico</span></h2>
					<img src="img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Asignación de Solicitud de Residencia</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="" class="button-link">Profesores</a>
			<a href="a.html" class="button-link">Solicitudes de Residencia</a>
			<a href="a.html" class="button-link">Solicitudes de Proyectos</a>
			<a href="a.html" class="button-link">Lista Proyectos</a>
		</div>
	</div>
	<div class="tabla-scroll">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre del proyecto</td>
				<td class="sticky">Nombre Residente</td>
				<td class="sticky">Número Control</td>
				<td class="sticky">Tipo Proyecto</td>
				<td class="sticky">Asesor Externo</td>
				<td class="sticky">Asignar a: </td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($i < 100) {
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp">Nombre del proyecto</th>
						<th class="tb-th-asp">Nombre Residente</th>
						<th class="tb-th-asp">Número Control</th>
						<th class="tb-th-asp">Tipo Proyecto</th>
						<th class="tb-th-asp">Asesor Externo</th>
						<form action="">
							<th class="tb-th-asp">
							<select name="comision">
								<option>Profesores</option>
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