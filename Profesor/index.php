<?php
include '../InicioSessionSeg.php';
	include 'funcProfesor.php';
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
					<a class="dropbtn home-btn" href="index.php" style="text-decoration: none;"><span>Profesor</span><img src="img/profesor.png" width="50px"></a>
					<ul class="dropdown-content">
						<li><a href="../Asesor/IndexAsesorInterno.html"><span>Asesor</span><img src="img/asesor.png" width="50px"></a></li>
					</ul>
				</div>
			</div>
			<div class="center-column">
				<h1>Comisiones Asignadas</h1>
			</div>
			<div class="right-column">
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
		include 'MenuProfesor.html';
		?>
	</div>
	<div>
		
	</div>
</body>
</html>