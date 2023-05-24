<?php 
	include ('funcionesDepto.php');
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
	$DID = mysqli_fetch_array(DID($UID));
    $result = listSolicProy($DID[0]);
?>
<!DOCTYPE html>
<html>
 
<head>
	<title>Departamento Academico</title>
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="Style/styleDepto.css">
</head>

<body style="margin: 0;" id="bgcolor">
	<div class="container">
		<div class="row">
			<div class="left-column">
				<a class="home-btn" href="index.php">
					<h2><span style="margin-right: 10px;">Dep. Academico</span></h2>
					<img src="../img/sombrero.png" width="50px">
				</a>
			</div>
			<div class="center-column">
				<h1>Asignación de Solicitud de proyecto</h1>
			</div>
			<div class="right-column">
				<a href="config.php"><img src="../img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuDeptoAcademico.html';
        ?>
	</div>
	<div class="tabla-scroll">
		
	<form action="exc/insert.php" method="POST" target="blank">
	<table class = "tb-asp">
			<tr> 
				<td class="sticky">Nombre del proyecto</td>
				<td class="sticky">Objetivo</td>
				<td class="sticky">Numero Estudiantes</td>
				<td class="sticky">Tiempo Estimado</td>
				<td class="sticky">Docente responsable</td>
				<td class="sticky">Asignar a: </td>
				<td class="sticky">Fecha Maxima</td>
				<td class="sticky"></td>
			</tr>
            <tr>
			<?php
				$i = 0;
				while ($SPID = mysqli_fetch_array($result)){
					$row = mysqli_fetch_array(basicInfoProy($SPID[0]));
					?>
					<tr <?php if($i%2==0) echo "class='par'" ?> >
						<th class="tb-th-asp"><p><?php echo $row[1]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[2]?></p></th>
						<th class="tb-th-asp"><p><?php echo $row[3]?></p></th>
						<th class="tb-th-asp"><?php echo $row[4]?> MESES</th>
						<th class="tb-th-asp"><?php echo $row[5]?></th> 
						    <th class="tb-th-asp">
							<select name="UProfesor">
								<?php
									$RFC = mysqli_fetch_array(RFCprofesor($row[0]));
									$listaProfesores = listaDocentes($DID[0], $RFC[0]);
									while ($profesor = mysqli_fetch_array($listaProfesores)){
										?>
											<option value="<?php echo $profesor[0]; ?>" size="20"> <?php echo $profesor[1] ?> </option>
										<?php
										$UProfesor = mysqli_fetch_array(UProfesor($profesor[0]));
									}
								?>
							</select>
							</th>
							<th class="tb-th-asp">
								<?php /*<input type="hidden" name="UProfesor" value="<?php echo $UProfesor[0]; ?>">*/?>
								<input type="hidden" name="SPID" value="<?php echo $row[0]; ?>">
								<input type="number" name="mes" min="1" max="12" PLACEHOLDER="MES">
								<input type="number" name="dia" min="1" max="30" PLACEHOLDER="DIA">
							</th>
							<th class="tb-th-asp">
								<input type="hidden" name="IDfuncion" value="ComisionProyectoProfesor">
								<input type="submit" value="Asignar">
							</th>
					</tr>
					<?php
					$i++;
				}
				?>
            </tr>
        </table>
	</form>
	</div>
</body>
</html>