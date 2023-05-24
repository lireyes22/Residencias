<?php
include '../InicioSessionSeg.php';
include '../funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Configuraciones</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/styleAlumno.css">
    <link rel="stylesheet" href="../style/styleConf.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="left-column">
                <a class="home-btn" href="index.php">
                    <h2><span style="margin-right: 10px;">Dep. Academico</span></h2>
                    <img src="../img/sombrero.png" width="50px">
                </a>
            </div>

            <div class="center-column">
                <h2>Configuraciones</h2>
            </div>
            <div class="right-column">
                <a href="config.php"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
                <a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
            </div>
        </div>
    </div>    
</body>
</html>

<?php include '../configUsuarios.php';?>