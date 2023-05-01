<!DOCTYPE html>
<html>

<head>
	<title>Mi sitio web</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="style/StyleProfesor.css">
	<meta charset="utf-8">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<div class="dropdown">
					<a class="dropbtn home-btn" href="indexProfesor.html" style="text-decoration: none;"><span>Profesor</span><img src="img/profesor.png" width="50px"></a>
					<ul class="dropdown-content">
						<li><a href="../Asesor/IndexAsesorInterno.html"><span>Asesor</span><img src="img/asesor.png" width="50px"></a></li>
					</ul>
				</div>
			</div>
			<div class="center-column">
				<h1>Solicitud de Residencias</h1>
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
			<a href="a.html" class="button-link">Solicitudes de Proyecto</a>
		</div>
	</div>
	<div class="tabla-scroll">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre Proyecto</td>
				<td class="sticky">Nombre Residente</td>
				<td class="sticky">Número Control</td>
				<td class="sticky">Tipo Control</td>
				<td class="sticky">Asesor Externo</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($i < 100) {
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp">Nombre Proyecto</th>
						<th class="tb-th-asp">Nombre Residente</th>
						<th class="tb-th-asp">Número Control</th>
						<th class="tb-th-asp">Tipo Control</th>
						<th class="tb-th-asp">Asesor Externo</th>
						<form action="">
							<th class="tb-th-asp">
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
	</div>
</body>
</html>