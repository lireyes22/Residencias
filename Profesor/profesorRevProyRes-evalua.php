<?php 
	$idProy = $_POST['idProy'];
	include ('funcProfesor.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query = "SELECT * FROM SolicitudProyecto WHERE SPID = '$idProy'";
    $result = mysqli_query($link, $query);
	$row = mysqli_fetch_array($result);
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
				<h1>Solicitudes de Proyectos</h1>
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
			<p class="izq-nomb-proy"><?php echo $row[1]; ?></p>
			<form action="exc/insert.php" method="post">
				<input type="hidden" name="SPID" value="<?php echo $idProy; ?>">
				<input class="obsrv" type="text" name="observaciones" PLACEHOLDER="Observaciones" required size="38" maxlength="255">
				<input type="hidden" name="IDfuncion" value="desicionProyecto">
				<input type="submit" name="desicion" value="ACEPTADO"> <br>
				<input type="submit" name="desicion" value="RECHAZADO" class="denegar">
			</form>
		</div>
		<div class="datos-proy">
			<form action="">
					<p class="_blanco">Objetivo del proyecto </p> <textarea name="objetivo-1" cols="150" rows="4" disabled > <?php echo $row[2] ?> </textarea> 
					<p class="_blanco">Breve descripcion del proyecto</p> <textarea name="descripcion" cols="150" rows="4" disabled><?php echo $row[3] ?></textarea> 
					<p>Impacto del proyecto</p>
					<p class="_blanco"><?php echo "Aqui va el impacto del proyecto" ?></p>
					<textarea name="objetivo-2" cols="150" rows="4" disabled><?php echo $row[4] ?></textarea> 
					<p class="_blanco">Lugar donde se va a desarrollar</p>
					<input type="text" name="lugar" size="155" disabled value="<?php echo $row[5] ?>"> <br> <br> 
					<p class="_blanco">Docentes Responsables</p>
					<?php $profesor_nombre = mysqli_fetch_array(NombreProfesor($row[11])); ?>
					<input type="text" name="docente" size="155" disabled value="<?php echo $profesor_nombre[0] ?>"> <br> <br> 
					<div class="doble-fila">
						<label class="lbl" for="estudiantes-req">Cantidad de estudiantes requeridos: </label>
						<input class="res" type="text" name="estudiantes-req" size="2" disabled value=<?php echo $row[6]; ?>>
						<label class="lbl" for="tiempo-est">Tiempo estimado de proyecto: </label>
						<input class="res" type="text" name="tiempo-est" size="10" disabled value="<?php echo $row[7] ?> MESES"> <br><br>
						<div class="carrera-req">
							<p class="_blanco">Carrera requerida de los estudiantes:</p>
							<?php
							$prevCarreras = carrerasSolicitud($row[0]);
							while ($carreras = mysqli_fetch_array($prevCarreras)){
								?>
								<input type="checkbox" name="<?php echo $carreras[1]; ?>" value="<?php echo $carreras[1]; ?>" checked disabled><?php echo $carreras[0]; ?> <br><br>
								<?php
							} ?>
						</div>
						<div class="propuesta-int">
						
						<input type="checkbox" name="INTERNO" value="INTERNO" <?php if($row[8]=='INTERNO') echo "checked" ?> disabled>INTERNO <br><br>	 
						<input type="checkbox" name="EXTERNO" value="EXTERNO" <?php if($row[8]=='EXTERNO') echo "checked" ?> disabled>EXTERNO <br><br> 
						<input type="checkbox" name="DUAL" value="DUAL" <?php if($row[8]=='DUAL') echo "checked" ?> disabled>DUAL<br><br> 
						<input type="checkbox" name="CIIE" value="CIIE" <?php if($row[8]=='CIIE') echo "checked" ?> disabled>CIIE <br><br>
						</div>
					</div>
					<p class="n-line">Línea de investigación que beneficia:</p>
						<input type="text" name="linea" value="<?php echo $row[9]; ?>" disabled>
					<?php /*
					<input type="radio" name="ITIC" value="" <?php echo "checked" ?> disabled>
					<label for="ITIC">Sistemas de Cómputo para la Autonomía de las Cosas (LGAC-2017-CHET-ITIC-17) ITIC</label><br>
					<input type="radio" name="ISC" value="" <?php echo "" ?> disabled>
					<label for="ISC">Sistemas, bases de datos y plataformas computacionales (LGAC-2017-CHET-ISCO-14) ISC</label><br>
					 /*<table class="tabla-benef">
						<tr>
							<td>Servicio Social</td>
							<td><input type="text" name="srvSocial" disabled size="5"></td>
							<td>Residencia profesiona</td>
							<td><input type="text" name="resProf" disabled size="5"></td>
							<td>Titulación</td>
							<td><input type="text" name="titulacion" disabled size="5"></td>
						</tr>
						<tr class="tr-td-gray">
							<td>Creditos Complementarios</td>
							<td><input type="text" name="credComp" disabled size="5"></td>
							<td>Beca</td>
							<td><input type="text" name="beca" disabled size="5"></td>
							<td>Participación en congresos de <br> investigación y/o innovación</td>
							<td><input type="text" name="congrInveInov" disabled size="5"></td>
						</tr>
						<tr>
							<td>Participación en concursos académicos</td>
							<td><input type="text" name="concAcad" disabled size="5"></td>
							<td>Publicación de revistas de divulgación <br> científica y tecnológica</td>
							<td><input type="text" name="revDivCient" disabled size="5"></td>
							<td>Oportunidad laboral</td>
							<td><input type="text" name="OportLab" disabled size="5"></td>
						</tr>
					</table>*/
					?>
					<p class="_blanco">Incluya las referencias esenciales para enmarcar el contenido de su propuesta.</p>
					<textarea name="refEsenciales" cols="150" rows="4" disabled><?php echo $row[10] ?></textarea>
			</form>
		</div>
	</div>
</body>
</html>