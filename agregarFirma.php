<?php
include 'funciones.php';
$imagen = $_FILES['firma']['tmp_name'];
$archivo = file_get_contents($imagen);
$archivo = base64_encode($archivo);
$ID = $_POST['id'];
$conection = conn();
$query = "UPDATE Usuarios SET Ufirma='$archivo' WHERE UID=$ID";
mysqli_query($conection, $query);
header("location:usuariosConfig.php?idUsuario=".$ID);
?>