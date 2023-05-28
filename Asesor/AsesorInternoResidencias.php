<?php
	include '../InicioSessionSeg.php';
    include 'funcAsesor.php';
?>
<!DOCTYPE html>
<html>
    
    <?php include ('encabezado.php'); encabezadox('Lista Residencias') #encabezado xd?>

	<div class="containerSRP">
        <table>
            <thead>
                <tr>
                    <th>Nombre del Proyecto</th>
                    <th>Objetivo</th>
                    <th>Descripcion</th>
                    <th>Número de Residentes</th>
                    <th>Actualizar Número de Residentes</th>
                    <th>Detalles del Proyecto</th>
                </tr>
            </thead>
            <?php
                $aiid = $_SESSION['AIID'];
                $queryAR = consultaAsesorResidencias($aiid);
                while($consultaAR = mysqli_fetch_array($queryAR)){

            ?>
            <form method="POST">
                <tbody>
                    <input type="hidden" name="SPID" value="<?php echo $consultaAR['SPID']; ?>">
                    <td><?php echo $consultaAR['SPNombreProyecto']; ?></td>
                    <td><?php echo $consultaAR['SPObjetivo']; ?></td>
                    <td><?php echo $consultaAR['SPDescripcion']; ?></td>
                    <td > <input type="number" min="<?php echo $consultaAR['SPEstudiantesRequeridos']; ?>" class="inp-tb" name="nResidentes" value="<?php echo $consultaAR['SPEstudiantesRequeridos']; ?>" required></td>
                    <td><input type="submit" value="Actualizar" class="btn btn-actualizar" formaction="procesos/AsesorInternoActualizarResidencia.php"></td>
                    <td><input type="submit" class="btn btn-actualizar" formaction="AsesorInternoDetallesProyectos.php" value="Detalles"></td>
                </tbody>
            </form>
            <?php } ?>
        </table>
    </div>
</body>
</html>