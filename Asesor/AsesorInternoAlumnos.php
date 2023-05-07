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
        <div class="row">
            <div class="left-column">
                <a class="home-btn" href="IndexAsesorInterno.html">
                    <h2><span style="margin-right: 10px;">Asesor</span></h2>
                    <img src="img/asesor.png" width="50px">
                </a>
            </div>
            <div class="center-column">
                <h1>Seguimientos</h1>
            </div>
            <div class="right-column">
                <a href=#><img src="../img/logout.png" width="40px"></a>
            </div>
        </div>
        <div class="button-row">
            <a href=# class="button-link">Asesorias</a>
			<a href="IndexAsesorInterno.html" class="button-link">Alumnos</a>
			<a href=# class="button-link">Reporte Semestral</a>
			<a href=# class="button-link">Residencias</a>
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
                //$idAsesor = $_SESSION['id'];
                $idAsesor = 14;
                $query = consultaAsesorAlumno(14);
                while($consulta = mysqli_fetch_array($query)){
                    $idAlumno = $consulta['UAlumno'];
                    $queryInfoAlumno = consultaUsuarioAlumno($idAlumno);
                    $consultaAlumno = mysqli_fetch_array($queryInfoAlumno);
                    

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
                    <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                    <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
            </form>
            <?php }//fin del while ?>
        </table>
    </div>
</body>
</html>