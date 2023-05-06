<?php
function conn(){
    $host = 'mapachitos.cisuktad1m53.us-east-2.rds.amazonaws.com';
    $user = 'admin';
    $password = 'mapachitos123';
    $db = 'Residencias';
    $conection = @mysqli_connect($host, $user, $password, $db);

    if(!$conection){
        echo 'Error de conexion';
        return null;
    }
    mysqli_set_charset($conection, "utf8");
    return $conection;
}

$conexion = conn();

// Nombre del archivo y ruta
$archivo = $_POST['ReporteFinal'];
$idAlumno = $_POST['idAlumno'];


// Lee el contenido del archivo
$contenido = file_get_contents($archivo);

// Query de inserción
$sql = "CALL InsertarReporteFinal($idAlumno, '$contenido')";

// Ejecuta la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Archivo insertado correctamente.";
} else {
    echo "Error al insertar archivo: " . mysqli_error($conexion);
}

// Cierra la conexión
mysqli_close($conexion);
?>
