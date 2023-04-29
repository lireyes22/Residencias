<?php 
	$idProy = $_POST['idProy'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Profesor</title>
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
				<h1>Solicitudes de Proyectos</h1>
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
			<a href="revProyRes.php" class="button-link">Solicitudes de Proyecto</a>
		</div>
	</div>
	<div>
		<div class="izq-decision">
			<h3>Nombre del Proyecto</h3>
			<p class="izq-nomb-proy"><?php echo $idProy ?></p>
			<input type="submit" value="Aceptar"> <br>
			<input type="submit" value="Denegar">
		</div>
		<div class="datos-proy">

		</div>
	</div>
</body>
</html>