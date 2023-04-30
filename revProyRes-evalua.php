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
			<p>Nombre del Proyecto</p> 
			<p class="izq-nomb-proy"><?php echo $idProy ?></p>
			<form action="a.html">
				<input type="submit" value="Aceptar"> <br>
				<input type="submit" value="Denegar" class="denegar">
			</form>
		</div>
		<div class="datos-proy">
			<form action="">
					<p>Objetivo del proyecto </p> <textarea name="objetivo-1" cols="150" rows="4" disabled></textarea> 
					<p>Breve descripcion del proyecto</p> <textarea name="descripcion" cols="150" rows="4" disabled></textarea> 
					<p>Impacto del proyecto</p>
					<p><?php echo "Aqui va el impacto del proyecto" ?></p>
					<textarea name="objetivo-2" cols="150" rows="4" disabled></textarea> 
					<p>Lugar donde se va a desarrollar</p>
					<input type="text" name="lugar" size="162" disabled> <br> <br> 
					<div class="doble-fila">
						<label class="lbl" for="estudiantes-req">Cantidad de estudiantes requeridos: </label>
						<input class="res" type="text" name="estudiantes-req" size="2" disabled>
						<label class="lbl" for="tiempo-est">Tiempo estimado de proyecto: </label>
						<input class="res" type="text" name="tiempo-est" size="10" disabled>
					</div>

			</form>
		</div>
	</div>
</body>
</html>