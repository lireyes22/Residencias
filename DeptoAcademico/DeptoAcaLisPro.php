<?php 
	include ('funcionesDepto.php');
	$UID = 13;
	$DID = mysqli_fetch_array(DID($UID));
    $result = listSolicProyAcep($DID[0]);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Departamento Academico</title>
	<link rel="stylesheet" href="../style/style.css">
</head>

<body style="margin: 0;">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Dep. Academico</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Lista de Proyectos</h1>
			</div>
			<div class="right-column">
				<a href="a.html"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuDeptoAcademico.html';
        ?>
	</div>
	<div class="tabla-scroll">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre Proyecto</td>
				<td class="sticky">Objetivo</td>
				<td class="sticky">Número Estudiantes</td>
				<td class="sticky">Tiempo Estimado</td>
				<td class="sticky">Docente Responsable</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="sticky">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($SPID = mysqli_fetch_array($result)){
					$row = mysqli_fetch_array(basicInfoProy($SPID[0])); 
					?> 
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp"><p><?php echo $row[1];?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[2];?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[3];?></p></th>
						<th class="tb-th-asp"><?php echo $row[4]?> MESES</th>
						<th class="tb-th-asp"><?php if (!empty($row[5])){  echo $row[5];}else{ echo "Sin Responsable";} ?></th>
						<form action="deptoAcaAsigAsesor.php" method="POST" target ="blank">
							<th class="tb-th-asp">
								<input type="hidden" name="SPID" value="<?php echo $row[0];?>">
								<?php 
									$BPID = mysqli_fetch_array(existeBanco($row[0]));
									$asesor = mysqli_fetch_array(asesorInterno($BPID[0]));
									if(empty($asesor)){
										$asigna = 'submit';
										$reasigna = "hidden";
									}else{
										$asigna = 'hidden';
										$reasigna = "submit";
									}
								?>
								<input type="<?php echo $asigna; ?>" value="Asignar">
							</th>
						</form>
						<form action="deptoAcaReasigAsesor.php" method="POST" target="blank">
							<th class="tb-th-asb">
								<input type="hidden" name="SPID" value="<?php echo $row[0];?>">
								<input type="<?php echo $reasigna; ?>" value="Reasignar">
							</th>
						</form>
					</tr>
					<?php
					$i++;
				}
				?>
            </tr>
        </table>
	</div>
</body>
</html>