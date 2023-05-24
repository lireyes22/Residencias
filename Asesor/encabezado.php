<?php
    function encabezadox($titulo){
        echo '<head>
        <title>Mi sitio web</title>
        <link rel="stylesheet" href="../style/StyleBase.css">
        <link rel="stylesheet" href="Style/StyleAsesor.css">
        <link rel="stylesheet" href="Style/StyleAsesor1.css">
        <script src="procesos/intercDivs.js"></script>
        <meta charset="utf-8">
    </head>
    <body style="margin: 0;">
        <div class="container">
            <div class="row">
                <div class="left-column">
                    <div class="dropdown">
                        <a class="dropbtn home-btn" href="IndexAI.php" style="text-decoration: none;"><span>Asesor</span><img src="img/asesor.png" width="50px"></a>
                    </div>
                </div>
                <div class="center-column">
                    <h1>'.$titulo.'</h1>
                </div>
                <div class="right-column">
                    <a href="config.php"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
                    <a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
                </div>
            </div>
            <div class="button-row">
                <a href=# class="button-link" name="asesorias">Asesorias</a>
                <a href="AsesorInternoAlumnos.php" class="button-link" name="alumnos">Alumnos</a>
                <a href=# class="button-link" name="reportesemestral">Reporte Semestral</a>
                <a href="AsesorInternoResidencias.php" class="button-link" name="residencias">Residencias</a>
            </div>
        </div>';
    }
?>