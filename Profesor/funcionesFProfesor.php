<?php
include '../InicioSessionSeg.php';
include ('../conectionBD.php');
// Establecer la conexión a la base de datos
$comentario=$_POST['observaciones'];
$SRID = $_POST['SRID'];
$opcion = $_POST['accion'];
$idUser= $_SESSION['id'];
// Datos a actualizar
$SRID = $SRID;
$estatus = $opcion;

// Consulta SQL para actualizar los datos
$sql = "UPDATE SolicitudResidencia SET SREstatus = '$estatus' WHERE SRID = $SRID";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
  if ($opcion=="APROBADO") {
    $sql2 = "INSERT INTO ObservacionesSolicitudes (Observvaciones, idSolicitud,UProfesor) VALUES ('$comentario', '$SRID','$idUser')";

    // Ejecutar la consulta
    if (mysqli_query($conn, $sql2)) {
      echo"<script>alert('Observaciones Registradas')</script>";
      echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
    } else {
      echo"<script>alert('Error al registrar observaciones')</script>";
      echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
    }
      
    echo"<script>alert('Estatus Actualizado')</script>";
      echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
  }else{
    echo"<script>alert('Estatus Actualizado')</script>";
      echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
  }

} else {
  echo"<script>alert('Datos invalidos')</script>";
  echo"<script  language='javascript'>window.location='profesorListadoSoliRes.php'</script>";  
}

// Cerrar la conexión a la base de datos
$conn->close();
?>