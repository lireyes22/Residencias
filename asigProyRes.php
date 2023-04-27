<!DOCTYPE html>
<html>

<head>
	<title>Departamento Academico</title>
	<link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/mystyle.css">
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
				<h1>Asignación de Solicitud de proyecto</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href="a.html" class="button-link">Asignación de Solicitud de Proyecto</a>
			<a href="asigProyRes.php" class="button-link">Asignación de Solicitud de Residencia</a>
		</div>
	</div>
	<div id="tabla-scroll">
	<div id="contenedor-tabla">
	<table>
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
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th>Nombre</th>
						<th>Objetivo</th>
						<th>Numero Estudiantes</th>
						<th>Tiempo Estimado</th>
						<th>Docente responsable</th>
						<th>Asignar</th>
						<th>boton</th>
					</tr>
					<?php
					$i++;
				}
				?>
            </tr>
        </table>
	</div>
	</div>
</body>
</html>