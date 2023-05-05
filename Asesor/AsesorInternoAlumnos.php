<?php 
	include ('funcAsesor.php');
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/StyleBase.css">
	<link rel="stylesheet" href="Style/StyleAsesor.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        A
        <div class="row">
            <div class="left-column">
                <a class="home-btn" href="a.html">
                    <h2><span style="margin-right: 10px;">Alumno</span></h2>
                    <img src="img/sombrero.png" width="50px">
                </a>
            </div>
            <div class="center-column">
                <h1>Titulo de pagina mamalona</h1>
            </div>
            <div class="right-column">
                <a href="a.html"><img src="../img/logout.png" width="40px"></a>
            </div>
        </div>
        <div class="button-row">
            <a href="a.html" class="button-link">Botón 1</a>
            <a href="a.html" class="button-link">Botón 2</a>
            <a href="a.html" class="button-link">Boton 3</a>
            <a href="a.html" class="button-link">Boton 4</a>
            <a href="a.html" class="button-link">Boton 5</a>
            <a href="a.html" class="button-link">Boton 6</a>
        </div>
    </div>
    <div class="containerSRP">
        <table>
            <thead>
                <tr>
                    <th>Numero de control</th>
                    <th>Nombre Completo</th>
                    <th>Semestre Actual</th>
                    <th>Correo Institucional</th>
                    <th>Evaluacion de Seguimiento</th>
                    <th>Evaluacion de Reporte Final</th>
                </tr>
            </thead>
            <?php 
                //$query = consultaAsesorAlumno($_SESSION['id']);
                $query = consultaAsesorAlumno(14);
                while($consulta = mysqli_fetch_array($query)){
                    $idAlumno = $consulta['UAlumno'];
                    $queryInfoAlumno = consultaUsuarioAlumno($idAlumno);
                    $consultaAlumno = mysqli_fetch_array($queryInfoAlumno);
                    $_COOKIE['UAlumno'] = $consulta['UAlumno'];
            ?>
            <form method="POST">
            <tbody>
                <td><?php echo $consultaAlumno['NumeroControl']?></td>
                <td><?php echo $consultaAlumno['NombreCompleto']?></td>
                <td><?php echo $consultaAlumno['SemestreActual']?></td>
                <td><?php echo $consultaAlumno['CorreoInstitucional']?></td>
                <td><input type="submit" formaction="AsesorInternoEvaluacionSeguimiento.php" value="Evaluacion de Seguimiento"></td>
                <td><input type="submit" formaction="AsesorInternoEvaluacionReporte.php" value="Evaluacion de Reporte Final"></td>
            </tbody>
            </form>
            <?php }//fin del while ?>
        </table>
    </div>
</body>

</html>