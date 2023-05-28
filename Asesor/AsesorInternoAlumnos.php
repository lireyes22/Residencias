<?php 
	include '../InicioSessionSeg.php';
    include ('funcAsesor.php');	
?>
<!DOCTYPE html>
<html lang="en">

<?php include ('encabezado.php'); encabezadox('Lista Alumnos') #encabezado xd?>

    <div class="containerSRP">
        <table>
            <thead>
                <tr>
                    <th>Nombre del proyecto</th>
                    <th>Numero de control</th>
                    <th>Nombre Completo</th>
                    <th>Semestre Actual</th>
                    <th>Correo Institucional</th>
                    <th>Evaluacion de Seguimiento</th>
                    <th>Evaluacion de Reporte Final</th>
                </tr>
            </thead>
            <?php 
                $query = consultaAsesorAlumno($_SESSION['id']);
                $idAsesor = $_SESSION['id'];
                //echo $idAsesor.'<br>';
                //echo $_SESSION['id'];
                //$idAsesor = 14;
                //$query = consultaAsesorAlumno(14);
                while($consulta = mysqli_fetch_array($query)){
                    $idAlumno = $consulta['UAlumno'];
                    $ProyectoS = ObtenerSolicitudProyecto($consulta['SPID']);
                    $queryInfoAlumno = consultaUsuarioAlumno($idAlumno);
                    $consultaAlumno = mysqli_fetch_array($queryInfoAlumno);
                    

            ?>
            <form method="POST">
            <tbody>
                <td><?php echo $ProyectoS['SPNombreProyecto']?></td>
                <td><?php echo $consultaAlumno['NumeroControl']?></td>
                <td><?php echo $consultaAlumno['NombreCompleto']?></td>
                <td><?php echo $consultaAlumno['SemestreActual']?></td>
                <td><?php echo $consultaAlumno['CorreoInstitucional']?></td>
                <td><input type="submit" formaction="AsesorInternoEvaluacionSeguimiento.php" value="Evaluacion de Seguimiento" class="btn btn-actualizar"></td>
                <td><input type="submit" formaction="AsesorInternoEvaluacionReporte.php" value="Evaluacion de Reporte Final" class="btn btn-actualizar"></td>
            </tbody>
                    <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                    <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
            </form>
            <?php }//fin del while ?>
        </table>
    </div>
</body>
</html>