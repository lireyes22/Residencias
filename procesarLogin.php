<?php
if (file_exists('funciones.php')) {
	include 'funciones.php';
	//echo "LLego bien";
	$username = $_POST['username'];
	$username = $_POST['password'];
	$username = $_POST['rol'];

	$conection = conn();
	if ($conection->connect_error){
		die("La conexion falló: " . $conexion->connect_error);
		echo"<script>alert('Servidor Fuera de Linea')</script>";
		echo"<script  language='javascript'>window.location='login.php'</script>"; 
	}else{
		//echo "Todo bien";
		

		$sql = "SELECT Alumnos.CorreoInstitucional, Alumnos.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
		FROM Alumnos 
		INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl
		INNER JOIN Usuarios ON Alumno_Usuarios.UID = Usuarios.UID";

		$result = $conection->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();

			if (($row["CorreoInstitucional"]==$username) ) {

				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $row['UID'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
				$resultado = mysqli_query($conection, $sql);
				while ($row = mysqli_fetch_assoc($resultado)) {
					if ($row['URol']=="Alumno") {
						echo "Eres una bestia";
						//header('Location: index.php');
					}

				}

			} else{
				echo"<script>alert('Contraseña incorrecta.')</script>";
				echo"<script  language='javascript'>window.location='login.html'</script>";  
			}

		} else { 
			echo"<script>alert('Su usuario no existe')</script>";
			echo"<script  language='javascript'>window.location='login.html'</script>";  
		}
		mysqli_close($conection);
	}

}else{
	echo"<script>alert('Servidor Fuera de Linea')</script>";
	echo"<script  language='javascript'>window.location='login.php'</script>"; 
}
?>