<?php 
include '../InicioSessionSeg.php';
include_once ('Alumfunciones.php');
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
    				<h2>TRACKING</h2>
    			</div>
    			<div class="right-column">
    				<a href="../usuariosConfig.php?idUsuario=<?php echo $_SESSION['id'];?>"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
    				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
    			</div>
    		</div>
    		<?php
    		include 'MenuAlumno.html';
    		?>

    	</div>    	

    	<div class="center-container">
    		<div class="TituloTraking"><b>Proyectos Propuestos</b> Fecha Límite: <?php echo retornarFechaLimite('ProponerProyecto'); ?></div>
    		<?php 
    		$conn = conn();
    		$id=$_SESSION['id'];
    		$sql = "SELECT * FROM SolicitudProyecto WHERE UPropietario='$id'";
    		$resultado = $conn->query($sql);

    		if ($resultado->num_rows > 0) {
				// Imprimir los resultados línea por línea
    			while ($fila = $resultado->fetch_assoc()) {
    				?>
    				<div class="TituloTraking"><?php echo $fila['SPNombreProyecto']." (".$fila['SPEstatus'].")"; ?></div>
    				<div class="progress-container">
    					<div class="progress-bar"><span class="<?php echo verificarSolicitudProyecto($fila['SPEstatus']); ?>"></span></div>
    					<!--<button class="btn-actualizar">Botón</button>    		-->
    				</div>
    				<?php
    			}
    		} else {
    			echo "No se han propuesto proyectos.";
    		}
    		?>
    		<div class="TituloTraking" style="border-top: 1px solid black;"><b>Solicitud Residencia</b> Fecha Límite: <?php echo retornarFechaLimite('SolicitarResidencia'); ?></div>
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
    					<!--<button class="btn-actualizar">Botón</button>  -->
    					<form action="AlumReenviaSoliResidencia.php" method="POST">
    						<input type="hidden" name="SPID" value="<?php echo $fila['SPID']?>">
    						<input type="hidden" name="SRID" value="<?php echo $fila['SRID']?>">
    						<?php
    						if($fila['SREstatus']=="RECHAZADO"){
    							?>
    							<input type="submit" class="btn-actualizar" value="Reenviar">
    							<?php
    						}
    						?>							
    					</form>
    					<!--condicion para que pueda editar su solicitud  -->
    					<?php
    					if($fila['SREstatus'] == 'PENDIENTE'){
							//IMPRIMIR EL BOTON DE EDITAR
    						echo '<form method="POST" action="AlumEditSoliResidencia.php">
    						<button class="btn-actualizar" type="submit">Editar</button>
    						<input type="hidden" name="SPID" value="'.$fila['SPID'].'">
    						</form>';}
    						?>
    						<form action="inserts/dataGenerator.php" method="POST" target="blank">
    							<input type="hidden" name="SPID" value="<?php echo $fila['SPID']?>">
    							<input type="submit" class="btn-actualizar" value="Generar">
    						</form>
    						<form method="post">
    							<input type="hidden" name="registro_id" value="<?php echo $fila['SRID']?>">
    							<input type="submit" class="btn-actualizar" value="Eliminar"  onclick="return confirm('¿Estás seguro de eliminar este registro?')">
    						</form>
    					</div>
    					<?php
    				} 
    			} else {
    				echo "No se han propuesto proyectos.";
    			}
    			?> 
    			<div class="TituloTraking" style="border-top: 1px solid black;"><b>Reporte parcial 1</b>(<?php echo verificarSolicitudReporteParcial1(true,$_SESSION['id']);?>)<b></b>Fecha Límite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?></div>
    			<div class="progress-container">
    				<div class="progress-bar"><span class="<?php echo verificarSolicitudReporteParcial1(false,$_SESSION['id']);?>"></span></div>
    				<form action="../GenerarDocs/GenerarEvaluacionSeguimiento.php" method="post" target="_blank"> 
    					<input type="submit" value="Evaluación" class="btn-actualizar">
    					<input type="hidden" name="idUAlumno" value="<?php echo $_SESSION['id'] ?>">
    				</form>
    			</div>
    			<div class="TituloTraking" style="border-top: 1px solid black;"><b>Reporte parcial 2 </b>(<?php echo verificarSolicitudReporteParcial2(true,$_SESSION['id']);?>)<b></b>Fecha Límite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?></div>
    			<div class="progress-container">
    				<div class="progress-bar"><span class="<?php echo verificarSolicitudReporteParcial2(false,$_SESSION['id']);?>"></span></div>
    				<form action="../GenerarDocs/GenerarEvaluacionSeguimiento.php" method="post" target="_blank"> 
    					<input type="submit" value="Evaluación" class="btn-actualizar">
    					<input type="hidden" name="idUAlumno" value="<?php echo $_SESSION['id'] ?>">
    				</form>
    			</div>
    			<div class="TituloTraking" style="border-top: 1px solid black;"><b>Reporte Final </b>(<?php echo verificarSolicitudReporteFinal(true,$_SESSION['id']);?>)<b></b>Fecha Límite: <?php echo retornarFechaLimite('AsesoresEvaluacionReporteFinal'); ?></div>
    			<div class="progress-container">
    				<div class="progress-bar"><span class="<?php echo verificarSolicitudReporteFinal(false,$_SESSION['id']);?>"></span></div>


    				<form action="Alumndescargardoc.php" method="post"> 
    					<input type="submit" value="Descargar" class="btn-actualizar" >
    					<input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
    				</form>  
    				<form action="../GenerarDocs/GenerarEvaluacionReporteFinal.php" method="post" target="_blank"> 
    					<input type="submit" value="Evaluación" class="btn-actualizar">
    					<input type="hidden" name="idUAlumno" value="<?php echo $_SESSION['id'] ?>">
    				</form>  
    			</div>
    		</div>
    	</body>
    	</html>
    	<?php
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    		$conexion = conn();

    // Verificar la conexión
    		if (!$conexion) {
    			die("Error al conectar a la base de datos: " . mysqli_connect_error());
    		}

    // Obtener el ID del registro a eliminar
    		$registro_id = $_POST['registro_id'];

    // Eliminar el registro de la base de datos
    		$sql = "DELETE FROM solicitudresidencia WHERE SRID = $registro_id";
    		if (mysqli_query($conexion, $sql)) {
    			echo "Registro eliminado exitosamente.";
    		} else {
    			echo "Error al eliminar el registro: " . mysqli_error($conexion);
    		}

    // Cerrar la conexión
    		mysqli_close($conexion);

    // Reedireccionar
    		echo"<script  language='javascript'>window.location='AlumTraking.php'</script>"; 
    	}
    ?>