<?php 
	include '../InicioSessionSeg.php';
    include ('funcAsesorE.php');
    $idAsesor = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

    <?php include ('encabezado.php'); encabezadox('Inicio') #encabezado xd?>

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
                $query = consultaAsesorAlumno($idAsesor);
                while($consulta = mysqli_fetch_array($query)){
                    $idAlumno = $consulta['UAlumno'];
                    $queryInfoAlumno = consultaUsuarioAlumno($idAlumno);
                    $consultaAlumno = mysqli_fetch_array($queryInfoAlumno);
                    $ProyectoS = ObtenerSolicitudProyecto($consulta['SPID']);
                    
            ?>
            <form method="POST" target ="blank">
                <input type="hidden" name="idAlumno" value="<?php echo $idAlumno; ?>">
                <input type="hidden" name="idAsesor" value="<?php echo $idAsesor; ?>">
            <tbody>
                <td><?php echo $ProyectoS['SPNombreProyecto']?></td>
                <td><?php echo $consultaAlumno['NumeroControl']?></td>
                <td><?php echo $consultaAlumno['NombreCompleto']?></td>
                <td><?php echo $consultaAlumno['SemestreActual']?></td>
                <td><?php echo $consultaAlumno['CorreoInstitucional']?></td>
                <td><input name="EvSeg" type="submit" formaction="AsesorExternoEvaluacionSeguimiento.php" value="Evaluación de Seguimiento" class="btn btn-actualizar"></td>
                <td><input name="EvRep" type="submit" formaction="AsesorExternoEvaluacionReporte.php" value="Evaluación de Reporte Final" class="btn btn-actualizar"></td>
            </tbody>
            </form>
                <?php }//fin del while ?>
        </table>
    </div>
</body>
</html>