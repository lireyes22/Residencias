<?php 
	include '../InicioSessionSeg.php';
	//$idAlumno =	$_SESSION['id']; Desactivar este cuando este validado el login
	$idAlumno = 30;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Reporte final de residencia</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="../style/styleAlumno.css">
	<meta charset="utf-8">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="AlumTraking.php">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h2>REPORTE FINAL DE RESIDENCIA</h2>
			</div>
			<div class="right-column">
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuAlumno.html';
        ?>
	</div>
	<form action="" method="post" enctype="multipart/form-data" action="AlumnoInsertarReporte.php">
		
		<div>
			<h1>ESTRUCTURA DEL REPORTE</h1>
			<div style="margin-left: 10px;">
				Nombre del Proyecto:&nbsp;<input name='nombre' type='text' value="">
			</div>
			<ol>
				<li>Portada</li>
				<li>Agradecimientos</li>
				<li>Resumen</li>
				<li>Índices</li>
				<li>Introdución</li>
				<li>Antecedentes o Marco Teórico</li>
				<li>Justificación</li>
				<li>Objetivos (General y Especificos)</li>
				<li>Metodologia</li>
				<li>Resultados</li>
				<li>Discuciones</li>
				<li>Conclusiones</li>
				<li>Fuentes de información</li>
			</ol>
			<div class="tb-th-asp">
				<input type="submit" value="Enviar" formaction="AlumnoInsertarReporte.php">
				<input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
			</div>
			<br>
			<div class="form-group">
				<label for="file-input">
					<img src="../img/archivo.jpg">
				</label>
				<input id="file-input" accept=".pdf" type="file" name="ReporteFinal">
			</div>
		</div>
	</form>
</body>

</html>