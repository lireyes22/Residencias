<?php
	include '../InicioSessionSeg.php';
	include 'funcAsesor.php';
	$uid = $_SESSION['id'];
	$idAseint = getIDAsesorInterno($uid);
	$_SESSION['AIID'] = $idAseint;
?>
<!DOCTYPE html>
<html>
	<?php include ('encabezado.php'); encabezadox('Inicio') #encabezado xd?>
</body>
</html>