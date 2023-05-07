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
    $sql="SELECT DepartamentoAcademico.CorreoInstitucional, DepartamentoAcademico.ContrasenaCorreo, Usuarios.URol, Usuarios.UID
    FROM DepartamentoAcademico 
    INNER JOIN DepartamentoAcademico_Usuarios ON DepartamentoAcademico.RFCDepartamentoAcademico = DepartamentoAcademico_Usuarios.RFCDepartamentoAcademico
    INNER JOIN Usuarios ON DepartamentoAcademico_Usuarios.UID = Usuarios.UID WHERE DepartamentoAcademico.CorreoInstitucional='$correo'";
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

function salir(){
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión

    header("Location: login.php"); // Redirigir a la página de inicio
    exit(); // Asegurarse de que el resto del código no se ejecute
}
?>