<?php
	include ('../InicioSessionSeg.php');
	$UID = $_SESSION['id'];
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
				<a href="../logout.php"><img src="../img/logout.png" width="40px"></a>
			</div>
		</div>
		<?php
        include 'MenuDeptoAcademico.html';
        ?>
	</div> 
	<div>
		<form action="" method="post"></form>
	</div>
</body>
</html>