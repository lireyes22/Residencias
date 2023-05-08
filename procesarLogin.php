<?php
if (file_exists('funciones.php')) {
	include 'funciones.php';
	//echo "LLego bien";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rol = $_POST['rol'];

	$conection = conn();
	if ($conection->connect_error){
		die("La conexion falló: " . $conexion->connect_error);
		echo"<script>alert('Servidor Fuera de Linea')</script>";
		echo"<script  language='javascript'>window.location='login.php'</script>"; 
	}else{
		//echo "Todo bien";		
		if ($rol == "Alumno") {
			$sql=GenerarLogAlum($username);
		}elseif ($rol == "Profesor") {
			$sql=GenerarLogAProf($username);
		}elseif ($rol == "JefDept") {
			$sql=GenerarLogJefDept($username);
		}elseif ($rol == "DeptVin") {
			$sql=GenerarLogADeptVin($username);
		}elseif ($rol == "AsesorInterno") {
			$sql=GenerarLogAsesorInt($username);
		}		

		$result = $conection->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			

			if (($row["CorreoInstitucional"]==$username) && ($row["ContrasenaCorreo"]==$password)) {
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $row['UID'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
				$resultado = mysqli_query($conection, $sql);
				while ($row = mysqli_fetch_assoc($resultado)) {
					if($rol=="AsesorInterno"){
						header('Location: Asesor/IndexAI.php');
					}
					if ($row['URol']=="Alumno") {
						header('Location: Alumno/AlumTraking.php');
					}
					if($row['URol']=="Profesor"){
						header('Location: Profesor/index.php');
					}
					if($row['URol']=="JefDeptAca"){
						header('Location: DeptoAcademico/index.php');
					}


				}

			} else{
				echo"<script>alert('Contraseña incorrecta.')</script>";
				echo"<script  language='javascript'>window.location='login.php'</script>";  
			}

		} else { 
			echo"<script>alert('Su usuario no existe')</script>";
			echo"<script  language='javascript'>window.location='login.php'</script>";  
		}
		mysqli_close($conection);
	}

}else{
	echo"<script>alert('Servidor Fuera de Linea')</script>";
	echo"<script  language='javascript'>window.location='login.php'</script>"; 
}
?>