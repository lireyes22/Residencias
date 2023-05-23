<?php 
include '../InicioSessionSeg.php';
include ('Alumfunciones.php');
$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM SolicitudProyecto 
    INNER JOIN BancoProyectos ON SolicitudProyecto.SPID = BancoProyectos.SPID 
    INNER JOIN Usuarios ON SolicitudProyecto.UIDResponsable = Usuarios.UID 
    INNER JOIN UsuariosDepartamentos ON Usuarios.UID=UsuariosDepartamentos.UID
    WHERE UsuariosDepartamentos.DID='5' ";
    $result = mysqli_query($link, $query);
    ?>
    <!DOCTYPE html>
    <html>

    <head>
    	<title>Listado De Proyectos</title>
    	<link rel="stylesheet" href="../style/style.css">
    	<link rel="stylesheet" href="style/Traking.css">

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
    				<h2>TRAKING</h2>
    			</div>
    			<div class="right-column">
    				<a href="config.php"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
    				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
    			</div>
    		</div>
    		<?php
    		include 'MenuAlumno.html';
    		?>

    	</div>    	

    	<div class="center-container">
    		<div class="TituloTraking"><b>Proyectos Propuestos</b> Fecha Limite: <?php echo retornarFechaLimite('ProponerProyecto'); ?></div>
    		<?php 
    		$conn = conn();
    		$id=$_SESSION['id'];
    		$sql = "SELECT * FROM SolicitudProyecto WHERE UIDResponsable='$id'";
    		$resultado = $conn->query($sql);

    		if ($resultado->num_rows > 0) {
				// Imprimir los resultados línea por línea
    			while ($fila = $resultado->fetch_assoc()) {
    				?>
    				<div class="TituloTraking"><?php echo $fila['SPNombreProyecto']." (".$fila['SPEstatus'].")"; ?></div>
					<div class="progress-container">
						<div class="progress-bar"><span class="<?php echo verificarSolicitudProyecto($fila['SPEstatus']); ?>"></span></div>
						<button class="btn btn-actualizar">Botón</button>    		
					</div>
    				<?php
				}
			} else {
				echo "No se han propuesto proyectos.";
			}
			?>


			<div class="TituloTraking"><b>Solicitud Residencia</b> Fecha Limite: <?php echo retornarFechaLimite('SolicitarResidencia'); ?></div>
    		<?php 
    		$conn = conn();
    		$id=$_SESSION['id'];
    		$sql = "SELECT SolicitudResidencia.UAlumno,SolicitudResidencia.SREstatus, SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPID, SolicitudResidencia.SRID FROM SolicitudResidencia 
			INNER JOIN BancoProyectos ON BancoProyectos.BPID = SolicitudResidencia.BPID 
			INNER JOIN SolicitudProyecto ON BancoProyectos.SPID = SolicitudProyecto.SPID 
			WHERE SolicitudResidencia.UAlumno='$id'";
    		$resultado = $conn->query($sql);

    		if ($resultado->num_rows > 0) {
				// Imprimir los resultados línea por línea
    			while ($fila = $resultado->fetch_assoc()) {
    				?>
    				<div class="TituloTraking"><?php echo $fila['SPNombreProyecto']." (".$fila['SREstatus'].")"; ?></div>
					<div class="progress-container">
						<div class="progress-bar"><span class="<?php echo verificarSolicitudResidencia($fila['SREstatus']); ?>"></span></div> 
						<button class="btn btn-actualizar">Botón</button>  
						<form action="AlumReenviaSoliResidencia.php" method="POST">
							<input type="hidden" name="SPID" value="<?php echo $fila['SPID']?>">
							<input type="hidden" name="SRID" value="<?php echo $fila['SRID']?>">
							<input type="submit" class="btn btn-actualizar" value="Reenviar">
						</form>
						<!--condicion para que pueda editar su solicitud  -->
						<?php
						if($fila['SREstatus'] == 'PENDIENTE'){
							//IMPRIMIR EL BOTON DE EDITAR
							echo '<form method="POST" action="AlumEditSoliResidencia.php">
									<button class="btn btn-actualizar" type="submit">Editar</button>
									<input type="hidden" name="SPID" value="'.$fila['SPID'].'">
								</form>';}
						?>
						<form action="inserts/dataGenerator.php" method="POST" target="blank">
						<input type="hidden" name="SPID" value="<?php echo $fila['SPID']?>">
						<input type="submit" class="btn btn-actualizar" value="Generar">
						</form>
					</div>
    				<?php
				} 
			} else {
				echo "No se han propuesto proyectos.";
			}
			?> 
		<div class="TituloTraking">Reporte parcial 1 (<?php echo verificarSolicitudReporteParcial1(true,$_SESSION['id']);?>)<b></b>Fecha Limite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?></div>
		<div class="progress-container">
			<div class="progress-bar"><span class="<?php echo verificarSolicitudReporteParcial1(false,$_SESSION['id']);?>"></span></div>
			<button class="btn btn-actualizar">Generar</button>
		</div>
		<div class="TituloTraking">Reporte parcial 2 (<?php echo verificarSolicitudReporteParcial2(true,$_SESSION['id']);?>)<b></b>Fecha Limite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?></div>
		<div class="progress-container">
			<div class="progress-bar"><span class="<?php echo verificarSolicitudReporteParcial2(false,$_SESSION['id']);?>"></span></div>
			<button class="btn btn-actualizar">Generar</button>
		</div>
		<div class="TituloTraking">Reporte Final (<?php echo verificarSolicitudReporteFinal(true,$_SESSION['id']);?>)<b></b>Fecha Limite: <?php echo retornarFechaLimite('AsesoresEvaluacionReporteFinal'); ?></div>
		<div class="progress-container">
			<div class="progress-bar"><span class="<?php echo verificarSolicitudReporteFinal(false,$_SESSION['id']);?>"></span></div>
			<button class="btn btn-actualizar">Generar</button>
			
			<form action="Alumndescargardoc.php" method="post"> 
				<input type="submit" value="Descargar">
				<input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
			</form>  
		</div>
	</div>
</body>
</html>