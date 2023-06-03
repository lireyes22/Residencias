<?php
include ('conectionBD.php');

function conn(){
    return conectBD();
}
function Ejemplo() {
    $conection = conn();
    $consulta = "select xd............";
    $query = mysqli_query($conection, $consulta);
    return $query;
}
    //Funciones NEFTALI logueo
function GenerarLogAlum($correo) {
    $sql = "SELECT Alumnos.CorreoInstitucional, Alumnos.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM Alumnos 
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl
    INNER JOIN Usuarios ON Alumno_Usuarios.UID = Usuarios.UID WHERE Alumnos.CorreoInstitucional='$correo'";
    return $sql;
}
function GenerarLogAProf($correo) {
    $sql="SELECT Profesor.CorreoInstitucional, Profesor.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM Profesor 
    INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor = Profesor_Usuarios.RFCProfesor
    INNER JOIN Usuarios ON Profesor_Usuarios.UID = Usuarios.UID WHERE Profesor.CorreoInstitucional='$correo'";
    return $sql;
}
function GenerarLogJefDept($correo) {
    $sql="SELECT *
    FROM Usuarios 
    INNER JOIN Profesor_Usuarios ON Usuarios.UID = Profesor_Usuarios.UID
    INNER JOIN Profesor ON Profesor.RFCProfesor = Profesor_Usuarios.RFCProfesor
    WHERE Profesor.CorreoInstitucional ='$correo' AND Usuarios.URol='JefDeptAca'";
    return $sql;
}
function GenerarLogAsesorInt($correo) {
    $sql="SELECT Profesor.CorreoInstitucional, Profesor.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM Profesor 
    INNER JOIN Profesor_Usuarios ON Profesor.RFCProfesor = Profesor_Usuarios.RFCProfesor
    INNER JOIN Usuarios ON Profesor_Usuarios.UID = Usuarios.UID 
    INNER JOIN AsesorInterno ON AsesorInterno.UID = Usuarios.UID
    WHERE Profesor.CorreoInstitucional='$correo'";
    return $sql;
}
function GenerarLogAsesorExt($correo) {
    $sql="SELECT * FROM AsesorExterno
    WHERE AsesorExterno.AECorreo='$correo'";
    return $sql;
}

//funcion que busca la firma de usuario
function validarFirma($ID){
    $conection = conn();
    $sql="SELECT Ufirma FROM Usuarios WHERE UID=$ID";
    $query = mysqli_query($conection, $sql);
    $sql=mysqli_fetch_assoc($query);
    return $sql;
}
?>