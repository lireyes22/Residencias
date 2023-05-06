<?php  
    include ('funcAsesor.php');
    $idAsesor = $_POST['idAsesor'];
    $idAlumno = $_POST['idAlumno'];
    //echo $idAsesor;echo '<br>';echo $idAlumno;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mi sitio web</title>
    <link rel="stylesheet" href="../style/StyleBase.css">
    <link rel="stylesheet" href="Style/StyleAsesor.css">
    <meta charset="utf-8">
</head>

<body style="margin: 0;">
    <div class="container">
        <div class="row">
            <div class="left-column">
                <div class="dropdown">
                    <a class="dropbtn home-btn" href="IndexAsesorInterno.html" style="text-decoration: none;"><span>Asesor</span><img src="img/asesor.png" width="50px"></a>
                    <ul class="dropdown-content">
                        <li><a href="../Profesor/indexProfesor.php"><span>Profesor</span><img src="img/profesor.png" width="50px"></a></li>
                    </ul>
                </div>
            </div>
            <div class="center-column">
                <h1>Evaluacion de Reporte</h1>
            </div>
            <div class="right-column">
                <a href="a.html"><img src="../img/logout.png" width="40px"></a>
            </div>
        </div>
        <div class="button-row">
            <a href="a.html" class="button-link">Asesorias</a>
            <a href="a.html" class="button-link">Alumnos</a>
            <a href="a.html" class="button-link">Reporte Semestral</a>
            <a href="a.html" class="button-link">Residencias</a>
        </div>
    </div>
    <form action="">
        <?php 
            $queryAlumno = consultaUsuarioAlumno($idAlumno);
            $queryProyectoAlumno = consultaProyectoAlumno($idAlumno);
            $consultaAlumno;$consultaAlumnoProyecto;$consultaAlumnoCarrera;
            if(!($consultaAlumno = mysqli_fetch_array($queryAlumno))){echo 'error';}
            $queryProyectoCarrera = consultaCarreraAlumno($consultaAlumno['NumeroControl']);
            if(!($consultaAlumnoProyecto = mysqli_fetch_array($queryProyectoAlumno))){echo 'error';}
            if(!($consultaAlumnoCarrera = mysqli_fetch_array($queryProyectoCarrera))){echo 'error';}
        ?>
        <div class="containerEv">
            <!-- Columna izquierda  -->
            <div class="column-Ev1">
                <label for="" class="lb-inp txtSizeEv">Información:</label>
                <label for="" class="lb-inp">Numero de control:</label> <br>
                <input type="text" name="numControl" class="lb-inp" value="<?php echo $consultaAlumno['NumeroControl']; ?>"> <br>
                <label for="" class="lb-inp">Nombre del residente:</label> <br>
                <input type="text" class="lb-inp" name="NombreResidente" value="<?php echo $consultaAlumno['NombreCompleto']; ?>"> <br>
                <label for="" class="lb-inp">Nombre del Proyecto:</label> <br>
                <input type="text" class="lb-inp" name="NombreProyecto" value="<?php echo $consultaAlumnoProyecto['SPNombreProyecto']; ?>"> <br>
                <label for="" class="lb-inp">Programa Educativo:</label> <br>
                <input type="text" class="lb-inp" name="ProgramaEducativo" value="<?php echo $consultaAlumnoCarrera['Nombre']; ?>"> <br>
                <label for="" class="lb-inp">Periodo de Realizacion:</label> <br>
                <input type="text" class="lb-inp" name="PeriodoRealizacion" value="<?php echo $consultaAlumnoProyecto['SRPeriodo']; ?>"> <br>
                <input type="submit" value="Enviar" class="lb-inp btnEnviarEv">
            </div>
            <!-- Columna central tabla  -->
            <div class="column-Ev2">
                <table class="tb-ev">
                    <tr>
                        <th>Criterios a evaluar</th>
                        <th>Valor Máximo</th>
                        <th>Evaluación Asesor Interno</th>
                    </tr>
                    <tr>
                        <td>Agradecimientos</td>
                        <td>0</td>
                        <td><input type="number" name="Agradecimientos" min="0" max="0" step="1"></td>
                    </tr>
                    <tr>
                        <td>Resumen</td>
                        <td>2</td>
                        <td><input type="number" name="Resumen" min="0" max="2" step="1"></td>
                    </tr>
                    <tr>
                        <td>Índice</td>
                        <td>2</td>
                        <td><input type="number" name="Índice" min="0" max="2" step="1"></td>
                    </tr>
                    <tr>
                        <td>Introducción</td>
                        <td>5</td>
                        <td><input type="number" name="Introducción" min="0" max="5" step="1"></td>
                    </tr>
                    <tr>
                        <td>Antecedentes o marco Teórico</td>
                        <td>5</td>
                        <td><input type="number" name="Antecedentes" min="0" max="5" step="1"></td>
                    </tr>
                    <tr>
                        <td>Justificación</td>
                        <td>5</td>
                        <td><input type="number" name="Justificación" min="0" max="5" step="1"></td>
                    </tr>
                    <tr>
                        <td>Objetivos</td>
                        <td>10</td>
                        <td><input type="number" name="Objetivos" min="0" max="10" step="1"></td>
                    </tr>
                    <tr>
                        <td>Metodología</td>
                        <td>10</td>
                        <td><input type="number" name="Metodología" min="0" max="10" step="1"></td>
                    </tr>
                    <tr>
                        <td>Resultados</td>
                        <td>15</td>
                        <td><input type="number" name="Resultados" min="0" max="15" step="1"></td>
                    </tr>
                    <tr>
                        <td>Discusiones</td>
                        <td>25</td>
                        <td><input type="number" name="Discusiones" min="0" max="25" step="1"></td>
                    </tr>
                    <tr>
                        <td>Conclusiones</td>
                        <td>15</td>
                        <td><input type="number" name="Conclusiones" min="0" max="15" step="1"></td>
                    </tr>
                    <tr>
                        <td>Fuentes de Información</td>
                        <td>5</td>
                        <td><input type="number" name="FuentesInformacion" min="0" max="5" step="1"></td>
                    </tr>
                </table>
                
            </div>
            <!-- Columna derecha  -->
            <div class="column-Ev3">
                <?php 
                    $queryAsesor = consultaProyectoAlumno($idAsesor);
                    $consultaAsesor;
                    if(!($consultaAsesor = mysqli_fetch_array($queryAsesor))){echo 'error';}
                ?>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Nombre del Asesor Interno:</label>
                <input class="txtSizeEvC3 lb-inp" type="text" name="AsesorInterno">
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Firma electronica:</label>
                <input class="txtSizeEvC3 lb-inp" type="file" name="archivo">
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Fecha de evaluación</label>
                <input class="txtSizeEvC3 lb-inp" type="date" name="FechaEvaluacion">
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Total Puntos:</label>
                <input class="txtSizeEvC3 lb-inp" type="text" name="TotalPuntos">
                <a style="text-decoration: none; color: white;" class="mrgEvC3 lb-inp" href="" download>Descargar reporte</a>
            </div>
        </div>
        
    </form>
</body>
</html>