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
                    <th>Número de control</th>
                    <th>Nombre Completo</th>
                    <th>Semestre Actual</th>
                    <th>Correo Institucional</th>
                    <th>Evaluación de Seguimiento</th>
                    <th>Evaluación de Reporte Final</th>
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
                <td><input type="submit" formaction="AsesorInternoEvaluacionSeguimiento.php" value="Evaluación de Seguimiento" class="btn btn-actualizar"></td>
                <td><input type="submit" formaction="AsesorInternoEvaluacionReporte.php" value="Evaluación de Reporte Final" class="btn btn-actualizar"></td>
            </tbody>
                    <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                    <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
            </form>
            <?php }//fin del while ?>
        </table>
    </div>
</body>
</html>