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
	<link rel="stylesheet" href="../style/styleAlumno.css">
	<link rel="stylesheet" href="../style/style.css">

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
			<!-- Boton de configuraciones-->
            <div class = btn-conf>
                <a href="config.php"><img src="../img/conf.png" width="40px"></a>
            </div>
            <!-- Fin del boton de configuraciones -->
			<div class="right-column">
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuAlumno.html';
        ?>
		
	</div>
	<div class= 'soliAlum'>
		<?php
		$ID = $_SESSION['id'];
		//validar que tenga un almenos un proyecto en el banco de proyectos
		if (validarProyEnBancoProy($ID)==true) {
			echo '<button name="editarSoliRes" class = "btn-editRes"><a href="AlumListSolicitudes.php">EDITAR MIS SOLICITUDES DE RESIDENCIA</a></button>';
		} else {
			echo "<button name='editarSoliRes' class = 'btn-editRes'>EDITAR MIS SOLICITUDES DE RESIDENCIA</button>";
		}
		?>
	</div>
</body>
</html>