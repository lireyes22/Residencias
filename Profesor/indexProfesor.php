<?php
	include 'funciones.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Mi sitio web</title>
	<link rel="stylesheet" href="../style/StyleBase.css">
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
				<h1>Titulo de pagina mamalona</h1>
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
	<div>
		Hola mundo
	</div>
</body>
</html>