<?php
	include '../InicioSessionSeg.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Mi sitio web</title>
	<link rel="stylesheet" href="../style/StyleBase.css">
	<link rel="stylesheet" href="Style/StyleAsesor.css">
	<meta charset="utf-8">
</head>
<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<div class="dropdown">
					<a class="dropbtn home-btn" href="IndexAsesorInterno.html" style="text-decoration: none;"><span>Asesor</span><img src="img/asesor.png" width="50px"></a>
					<ul class="dropdown-content">
						<li><a href="../Profesor/index.php"><span>Profesor</span><img src="img/profesor.png" width="50px"></a></li>
					</ul>
				</div>
			</div>
			<div class="center-column">
				<h1>Inicio</h1>
			</div>
			<div class="right-column">
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
			<a href=# class="button-link">Asesorias</a>
			<a href="AsesorInternoAlumnos.php" class="button-link">Alumnos</a>
			<a href=# class="button-link">Reporte Semestral</a>
			<a href=# class="button-link">Residencias</a>
		</div> 
	</div>
	<div>
	</div>
</body>
</html>