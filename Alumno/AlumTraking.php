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
    				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
    			</div>
    		</div>
    		<?php
    		include 'MenuAlumno.html';
    		?>

    	</div>
    	
    		

    		<div class="center-container">
    			<div class="progress-container">
    				<div class="progress-bar"><span class="progress-bar-fill"></span></div>
    			</div>
    			<div class="progress-container">
    				<div class="progress-bar"><span class="progress-bar-fill"></span></div>
    			</div>
    			<div class="progress-container">
    				<div class="progress-bar"><span class="progress-bar-fill"></span></div>
    			</div>
    		</div>
    	
    </body>
    </html>