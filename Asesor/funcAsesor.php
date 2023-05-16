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

function consultaAsesorAlumno($idAsesor) {
    $conection = conn();
    $sql = "CALL AsesorxAlumno($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaUsuarioAlumno($idAlumno) {
    $conection = conn();
    $sql = "CALL UsuarioxAlumno($idAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaProyectoAlumno($idAlumno) {
    $conection = conn();
    $sql = "CALL AlumnoxProyecto($idAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaCarreraAlumno($NumAlumno) {
    $conection = conn();
    $sql = "CALL AlumnoxCarrera($NumAlumno)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function consultaProfesorAsesor($idAsesor) {
    $conection = conn();
    $sql = "CALL ProfesorxAsesor($idAsesor)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}
function getIDAsesorInterno($uid) {
    $conection = conn();
    $sql = "CALL ObtenerIDAsesorInterno($uid)";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    $consulta = mysqli_fetch_array($query);
    $idAsInt = $consulta['AIID'];
    return $idAsInt;
}
