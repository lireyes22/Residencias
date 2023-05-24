<?php
include 'funciones.php';
$imagen = $_FILES['firma']['tmp_name'];
$archivo = file_get_contents($imagen);
$archivo = base64_encode($archivo);
$ID = $_POST['id'];
$url=$_POST['url'];
$conection = conn();
$query = "UPDATE Usuarios SET Ufirma='$archivo' WHERE UID=$ID";
mysqli_query($conection, $query);
header("location:".$url."?"."idUsuario=".$ID);
//redireccionar a hacia el archivo conf.php del usuario correspondiente
//burcar el rol del usuario
/*$query = "SELECT URol FROM Usuarios WHERE UID=$ID";
$rol=mysqli_query($conection, $query);
$rol =  mysqli_fetch_assoc($rol);*/

header("location:usuariosConfig.php?idUsuario=".$ID);
/*if($rol['URol'] == 'Alumno'){
    header('location:Alumno/config.php');
}elseif($rol['URol'] == 'Profesor'){
    header('location:Profesor/config.php');
}elseif($rol['URol'] == 'AsesorExterno'){
    header('location:AsesorExterno/config.php');
}elseif($rol['URol'] == 'JefDeptAca'){
    header('location:DeptoAcademico/config.php');
}*/

?>