<?php 
include '../InicioSessionSeg.php';
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
    				<h1>Proyecto: <?php echo $row[1]; ?></h1>
    			</div>
    			<div class="right-column">
    				<a href="../usuariosConfig.php?idUsuario=<?php echo $_SESSION['id'];?>"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
    				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
    			</div>
    		</div>
    	</div> 
    	<!--<div>
    		<div class="izq-decision">
    			<p>Nombre del Proyecto</p> 
    			<p class="izq-nomb-proy"><?php echo $row[1]; ?></p>
    			<button id="cancelar" onclick="cerrarPagina()">Cerrar</button>
    		</div>
    		
    	</div>-->
    	<div class="datos-proy">
    		<form action="">
    			<p class="_blanco">Objetivo del proyecto </p> <textarea name="objetivo-1" cols="150" rows="4" disabled > <?php echo $row[2] ?> </textarea> 
    			<p class="_blanco">Breve descripción del proyecto</p> <textarea name="descripcion" cols="150" rows="4" disabled><?php echo $row[3] ?></textarea> 
    			<p class="_blanco"><?php echo "Impacto del proyecto" ?></p>
    			<textarea name="objetivo-2" cols="150" rows="4" disabled><?php echo $row[4] ?></textarea> 
    			<p class="_blanco">Lugar donde se va a desarrollar</p>
    			<input type="text" name="lugar" size="155" disabled value="<?php echo $row[5] ?>"> <br> <br> 
    			<p class="_blanco">Docente Responsable</p>
    			<?php $profesor_nombre = mysqli_fetch_array(NombreProfesor($row[11])); ?>
    			<input type="text" name="docente" size="155" disabled value="<?php echo $profesor_nombre[0] ?>"> <br> <br> 
    			<?php 
    			$numeroActual = estudiantesActuales($row[0]);
    			?>
    			<label class="lbl" for="estudiantes-req"><p class="_blanco"><?php echo "Cantidad de estudiantes requeridos:" ?></p> </label>
    			<input class="res" type="text" name="estudiantes-req" size="2" disabled value=<?php echo $numeroActual; ?>>
    			<label class="lbl" for="tiempo-est"><p class="_blanco"><?php echo "Tiempo estimado de proyecto: " ?></p></label>
    			<input class="res" type="text" name="tiempo-est" size="10" disabled value="<?php echo $row[7] ?> MESES"> <br><br>
    			<p class="_blanco">Carrera requerida de los estudiantes:</p>
    			<?php
    			$prevCarreras = carrerasSolicitud($row[0]);
    			while ($carreras = mysqli_fetch_array($prevCarreras)){
    				?>
    				<input type="checkbox" name="<?php echo $carreras[1]; ?>" value="<?php echo $carreras[1]; ?>" checked disabled><?php echo $carreras[0]; ?> <br><br>
    				<?php
    			} ?> 
    			<p class="_blanco">Tipo de proyecto</p>
    			<input type="checkbox" name="INTERNO" value="INTERNO" <?php if($row[8]=='INTERNO') echo "checked" ?> disabled>INTERNO <br><br>	 
    			<input type="checkbox" name="EXTERNO" value="EXTERNO" <?php if($row[8]=='EXTERNO') echo "checked" ?> disabled>EXTERNO <br><br> 
    			<input type="checkbox" name="DUAL" value="DUAL" <?php if($row[8]=='DUAL') echo "checked" ?> disabled>DUAL<br><br> 
    			<input type="checkbox" name="CIIE" value="CIIE" <?php if($row[8]=='CIIE') echo "checked" ?> disabled>CIIE <br><br>
    			<p class="_blanco"><?php echo "Línea de investigación que beneficia:" ?></p>
    			<input type="text" name="linea" value="<?php echo $row[9]; ?>" disabled>					
    			<p class="_blanco">Referencias:</p>
    			<textarea name="refEsenciales" cols="150" rows="4" disabled><?php echo $row[10] ?></textarea>
    		</form>
    	</div>
    	
    </div>
    <div align="center">
    	<button class="floating-button" onclick="cerrarPagina()">Cerrar Pagina</button>	
    </div>

    <script>
    	function cerrarPagina(){
    		window.close();
    	}
    </script>
</body>
</html>