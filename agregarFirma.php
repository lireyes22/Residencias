<?php
include 'funciones.php';
$imagen = $_FILES['firma']['tmp_name'];
$archivo = file_get_contents($imagen);
$archivo = base64_encode($archivo);
$ID = $_POST['id'];
$conection = conn();
$query = "UPDATE Usuarios SET Ufirma='$archivo' WHERE UID=$ID";
mysqli_query($conection, $query);

//redireccionar a hacia el archivo conf.php del usuario correspondiente
//burcar el rol del usuario
$query = "SELECT URol FROM Usuarios WHERE UID=$ID";
$rol=mysqli_query($conection, $query);
$rol =  mysqli_fetch_assoc($rol);
switch ($rol['URol']){
    case 'Alumno':
        header('location:Alumno/config.php');
    case 'Profesor':
        header('location:Profesor/config.php');
    case 'AsesorExterno':
        header('location:AsesorExterno/config.php');
    case 'JefDeptAca':
        header('location:DeptoAcademico/config.php');
}

?>