<?php  
    include '../InicioSessionSeg.php';
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
                <a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
            </div>
        </div>
        <?php
        include 'MenuAsesorInterno.html';
        ?>
    </div>
    <form method="post">
        <?php 
            $queryAlumno = consultaUsuarioAlumno($idAlumno);
            $queryProyectoAlumno = consultaProyectoAlumno($idAlumno);
            $consultaAlumno;$consultaAlumnoProyecto;$consultaAlumnoCarrera;
            if(!($consultaAlumno = mysqli_fetch_array($queryAlumno))){echo 'error';}
            $queryProyectoCarrera = consultaCarreraAlumno($consultaAlumno['NumeroControl']);
            if(!($consultaAlumnoProyecto = mysqli_fetch_array($queryProyectoAlumno))){echo 'error';}
            if(!($consultaAlumnoCarrera = mysqli_fetch_array($queryProyectoCarrera))){echo 'error';}

            $idSolicitudResidencia = $consultaAlumnoProyecto['SRID'];
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
            </div>
            <!-- Columna central tabla  -->
            <div class="column-Ev2">
                <table class="tb-ev">
                    <tr>
                        <th>Criterios a evaluar</th>
                        <th>Valor Máximo</th>
                        <th>1er. Parcial</th>
                        <th>2o. Parcial</th>
                    </tr>
                    <tr>
                        <td>Asistio puntualmente a las reuniones de asesoria</td>
                        <td>10</td>
                        <td><input type="number" name="PuntualidadP1" min="0" max="10" step="1"></td>
                        <td><input type="number" name="PuntualidadP2" min="0" max="10" step="1"></td>
                    </tr>
                    <tr>
                        <td>Demuestra conocimento en el area de su especialidad</td>
                        <td>20</td>
                        <td><input type="number" name="ConocimientoP1" min="0" max="20" step="1"></td>
                        <td><input type="number" name="ConocimientoP2" min="0" max="20" step="1"></td>
                    </tr>
                    <tr>
                        <td>Trabaja en equipo y se comunica en forma efectiva (oral y escrita)</td>
                        <td>15</td>
                        <td><input type="number" name="TrabajoEquipoP1" min="0" max="15" step="1"></td>
                        <td><input type="number" name="TrabajoEquipoP2" min="0" max="15" step="1"></td>
                    </tr>
                    <tr>
                        <td>Es dedicado y proactivo en las actividades encomendadas</td>
                        <td>20</td>
                        <td><input type="number" name="DedicacionP1" min="0" max="20" step="1"></td>
                        <td><input type="number" name="DedicacionP2" min="0" max="20" step="1"></td>
                    </tr>
                    <tr>
                        <td>Es ordenado y cumple satisfactoriamente con las actividades encomendadas en los tiempos establecidos</td>
                        <td>20</td>
                        <td><input type="number" name="OrdenadoP1" min="0" max="20" step="1"></td>
                        <td><input type="number" name="OrdenadoP2" min="0" max="20" step="1"></td>
                    </tr>
                    <tr>
                        <td>Propone mejoras al proyecto</td>
                        <td>15</td>
                        <td><input type="number" name="DaMejorasP1" min="0" max="15" step="1"></td>
                        <td><input type="number" name="DaMejorasP2" min="0" max="15" step="1"></td>
                    </tr>
                    <tr style="background-color: cadetblue;">
                        <td><STRong>NOTA:Al hacer clic en guardar se actualizaran los datos</STRong></td>
                        <td></td>
                        <td><input type="submit" value="Guardar" name ="Par1" formaction="procesos/AsesorInternoGuardarEvSeguimiento.php"></td>
                        <td><input type="submit" value="Guardar" name ="Par2" formaction="procesos/AsesorInternoGuardarEvSeguimiento.php"></td>
                    </tr>
                </table>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp" style="color: white; font-size: 20px;" ><strong>Observaciones:</strong></label>
                <textarea name="Observaciones" id="" rows="5" style="width: 80%; margin: 10px; resize: none;"></textarea>
            </div>
            <!-- Columna derecha  -->
            <div class="column-Ev3">
                <?php 
                    $queryAsesor = consultaProfesorAsesor($idAsesor);
                    $consultaAsesor;
                    if(!($consultaAsesor = mysqli_fetch_array($queryAsesor))){echo 'error';}
                ?>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Nombre del Asesor Interno:</label>
                <input class="txtSizeEvC3 lb-inp" type="text" name="AsesorInterno" value="<?php echo $consultaAsesor['NombreCompleto']; ?>">
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Firma electronica:</label>
                <input class="txtSizeEvC3 lb-inp" type="file" name="archivo">
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Fecha de evaluación</label>
                <input class="txtSizeEvC3 lb-inp" type="date" value="<?php echo date('Y-m-d'); ?>" disabled>
                <label class="txtSizeEvC3 mrgEvC3 lb-inp">Total Puntos:</label>
                <input class="txtSizeEvC3 lb-inp" type="text" name="TotalPuntos" disabled>
                <input type="hidden" name="idSoliRes" value="<?php echo $idSolicitudResidencia; ?>">
                <input type="hidden" name="idUAsesor" value="<?php echo $idAsesor; ?>">
            </div>
        </div>
        
    </form>
</body>
</html>