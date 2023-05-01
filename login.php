<!DOCTYPE html>
<html>

<head>
	<title>Residencias</title>
	<link rel="stylesheet" href="style/style.css"> 
	<link rel="stylesheet" href="style/styleLogin.css">
	<meta charset="utf-8">
</head>

<body style="margin: 0;">
	<div class="page-login">
		<div class="loginCentral">
			<div class="box1">
				<h1>Login</h1>
			</div>
			<div class="box2">
				<form action="procesarLogin.php" method="POST">							
					<input type="text" id="username" name="username" placeholder="Usuario">
					<input type="password" id="password" name="password" placeholder="Password">
					<div class="combo">
						<select class="combo-select" name="rol">
							<option value="Alumno">Alumno</option>
							<option value="Profesor">Profesor</option>
							<option value="JefDept">Jefe de departamento Academico</option>
						</select>
					</div>
					<button type="submit" value="Enviar">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
