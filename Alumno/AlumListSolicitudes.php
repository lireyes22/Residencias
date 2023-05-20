<?php 
	include '../InicioSessionSeg.php';
	include ('Alumfunciones.php');
	$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    //llamar a la funcion que trae un array los nombres de las solicitudes del estudiante
    $ID = $_SESSION['id'];
    $result=getListSoliProyect($ID);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Listado De Solicitudes de Residencia</title>
	<link rel="stylesheet" href="../style/styleAlumno.css">
	<link rel="stylesheet" href="../style/style.css">

</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="AlumTraking.php">
					<h2><span style="margin-right: 10px;">Alumno</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h2>TRAKING</h2>
			</div>
			<div class="right-column">
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuAlumno.html';
        ?>
	</div>
    <div class="tabla-scroll">
    <table class="tb-asp">
        <tr>
        <th class="sticky">Nombre del Proyecto</th>
        <td class="sticky" colspan="2"></td>
        </tr>
        <tr>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr <?php if ($i % 2 == 0) echo "class='par'" ?>>
                    <td><?php echo $row['SPNombreProyecto']; ?></td>
                    <?php 
                        $rechazado = rechazado($row['SRID']);
                        $vReenviar = 'hidden';
                        $vEditar = 'submit';
                        if($rechazado == 'RECHAZADO'){
                           $vReenviar = 'submit';
                           $vEditar = 'hidden';
                        }else if($rechazado == 'ACEPTADO'){
                            $vReenviar = 'hidden';
                           $vEditar = 'hidden';
                        }
                    ?>
                    <form action="AlumEditSoliResidencia.php" method="Post">
                        <th class="tb-th-asp"> 
                            <input type="hidden" name="SPID" value="<?php echo $row['SPID'];?>">
                            <input type="<?php echo $vEditar; ?>"  value="Editar Solicitud">
                        </th>
                    </form>
                    <form action="AlumReenviaSoliResidencia.php" method="Post">
                        <th class="tb-th-asp"> 
                            <?php 
                                $rechazado = rechazado($row['SRID']);
                                $vReenviar = 'hidden';
                                if($rechazado == 'RECHAZADO'){
                                    $vReenviar = 'submit';
                                }
                            ?>
                            <input type="hidden" name="SPID" value="<?php echo $row['SPID'];?>">
                            <input type="hidden" name="SRID" value="<?php echo $row['SRID'];?>">
                            <input type="<?php echo $vReenviar; ?>"  value="Reenviar Solicitud">
                        </th>
                    </form>
                </tr>
            <?php
                $i++;
            }
        ?>
    </tr>
    </table>
</body>
</html>