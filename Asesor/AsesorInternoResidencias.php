<?php
	include '../InicioSessionSeg.php';
    include 'funcAsesor.php';
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
					<a class="dropbtn home-btn" href="IndexAI" style="text-decoration: none;"><span>Asesor</span><img src="img/asesor.png" width="50px"></a>
					<ul class="dropdown-content">
						<li><a href="../Profesor/index.php"><span>Profesor</span><img src="img/profesor.png" width="50px"></a></li>
					</ul>
				</div>
			</div>
			<div class="center-column">
				<h1>Inicio</h1>
			</div>
			<div class="right-column">
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
        <?php
        include 'MenuAsesorInterno.html';
        ?>
	</div>
	<div class="containerSRP">
        <table>
            <thead>
                <tr>
                    <th>Nombre del Proyecto</th>
                    <th>Objetivo</th>
                    <th>Descripcion</th>
                    <th>Numero de Residentes</th>
                    <th>Actualizar</th>
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
                </tbody>
            </form>
            <?php } ?>
        </table>
    </div>
</body>
</html>