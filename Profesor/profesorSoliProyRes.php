<?php 
	#include ('funcProfesor.php');
	#$link = conn();
    #$query = "INSERT INTO SolicitudProyecto (SPNombreProyecto, SPObjetivo, SPDescripcion, SPImpacto, SPLugar, SPEstudiantesRequeridos, SDTiempoEstimado, UIDResponsable) VALUES ";
    #$result = mysqli_query($link, $query);
	#$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Profesor</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="Style/StyleProfesor.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Profesor</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Solicitar Proyecto</h1>
			</div>
			<div class="right-column">
				<a href="index.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<div class="button-row">
		<a href="index.php" class="button-link">Comisiones</a>
			<a href="index.php" class="button-link">Proyectos Registrados</a>
			<a href="index.php" class="button-link">Registrar Proyecto</a>
			<a href="profesorSoliRes.php" class="button-link">Solicitudes de Residencia</a>
			<a href="profesorRevProyRes.php" class="button-link">Solicitudes de Proyecto</a>
		</div>
	</div> 
	<div>
		<div class="izq-decision">
			<p>Nombre del Proyecto</p> 
			<form action="exc/insert.php" method="post">
				<input class="obsrv" type="text" name="nombreProy" required size="50%">
				<input type="submit" name="enviar" value="Enviar">
			</form>
		</div>
		<div class="datos-proy">
			<form action="">
					<p class="_blanco">Objetivo del proyecto </p> <textarea name="objetivo" cols="150" rows="4"></textarea> 
					<p class="_blanco">Breve descripcion del proyecto</p> <textarea name="descripcion" cols="150" rows="4"></textarea> 
					<p class="_blanco">Impacto del proyecto</p>
					<p style="max-width: 60%;">Establecer la importancia y aporte de la investigación propuesta en función de la generación de conocimiento, 
                        el desarrollo tecnológico, la innovación y la solución de problemas locales, nacionales o internacionales.</p>
					<textarea name="lugar" cols="150" rows="4"></textarea> 
					<p class="_blanco">Lugar donde se va a desarrollar</p>
					<input type="text" name="lugar" size="155"> <br>
					<p class="_blanco">Docentes Responsables</p>
                    <select name="profesores-res" id="tipo-prop">
                            <option value="opcion1">Profesor Random Equis De</option>
                            <option value="opcion2">2</option>
                            <option value="opcion3">3</option>
                            <option value="opcion4">4</option>
                    </select>
                    <br><br>
                    <label class="lbl" for="estudiantes-req">Cantidad de estudiantes requeridos: </label>
                    <input class="res" type="text" name="estudiantes-req" size="2"><br><br>
                    <label class="lbl" for="tiempo-est">Tiempo estimado de proyecto: </label>
                    <input class="res" type="text" name="tiempo-est" size="2"> 
                    <label class="lbl" for="tiempo-est">MES(ES)</label> <br><br>
                    <label class="lbl" for="carrera-req-est">Carrera Requerida por los estudiantes: </label>
                    <input class="res" type="text" name="carrera-req-est" size="10">
                    <br><br>
                    <label class="lbl" for="tipo-prop">Tipo de propuesta:</label>
                    <select name="tipo-prop">
                        <option value="opcion1">INTERNO</option>
                        <option value="opcion2">EXTERNO</option>
                        <option value="opcion3">DUAL</option>
                        <option value="opcion4">CIIE</option>
                    </select>
                    <br><br>
					<label class="lbl" for="linea-inv">Linea de investigación que beneficia: </label>
                    <select name="linea-inv">
                            <option value="opcion1">1</option>
                            <option value="opcion2">2</option>
                            <option value="opcion3">3</option>
                            <option value="opcion4">4</option>
                    </select>
					<p class="_blanco">Incluya las referencias esenciales para enmarcar el contenido de su propuesta.</p>
					<textarea name="refEsenciales" cols="150" rows="4"></textarea>
			</form>
		</div>
	</div>
</body>
</html>