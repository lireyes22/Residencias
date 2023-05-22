<?php
	include '../InicioSessionSeg.php';
    include 'funcAsesor.php';
?>
<!DOCTYPE html>
<html>
    
    <?php include ('encabezado.php'); encabezadox('Residencias') #encabezado xd?>

	<div class="containerSRP">
        <table>
            <thead>
                <tr>
                    <th>Nombre del Proyecto</th>
                    <th>Objetivo</th>
                    <th>Descripcion</th>
                    <th>Numero de Residentes</th>
                    <th>Actualizar Numero de Residentes</th>
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
                    <td > <input type="number" min="0" max="5" class="inp-tb" name="nResidentes" value="<?php echo $consultaAR['SPEstudiantesRequeridos']; ?>" required></td>
                    <td><input type="submit" value="Actualizar" class="btn btn-actualizar" formaction="procesos/AsesorInternoActualizarResidencia.php"></td>
                    <td><input type="submit" class="btn btn-actualizar" formaction="" value="Detalles"></td>
                </tbody>
            </form>
            <?php } ?>
        </table>
    </div>
</body>
</html>