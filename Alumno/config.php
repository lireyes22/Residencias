<?php
include '../InicioSessionSeg.php';
include '../funciones.php';
if($_POST){
    $imgFirma = $_FILES['firma']['tmp_name'];
    $archivo = file_get_contents($imgFirma);
    $ID = $_SESSION['id'];
    //llamar al metodo para agregar la firma al usuario
    setFirma($ID,$imagenEnBase64);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Configuraciones</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleAlumno.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="left-column">
                <a class="home-btn" href="AlumTraking.php">
                    <h2><span style="margin-right: 10px;">Alumno</span></h2>
                    <img src="../img/sombrero.png" width="50px">
                </a>
            </div>

            <div class="center-column">
                <h2>Configuraciones</h2>
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
    </div>

    <div>
        <?php
        include 'MenuAlumno.html';
        include '../configUsuarios.php';
        ?>

	</div>
</body>
</html>