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
    return $conection;
}

function consultaRet($consulta) {
    $conection = conn();
    $sql = "SELECT * FROM Usuarios
    INNER JOIN 
    ";
    $query = mysqli_query($conection, $consulta);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
    return $query;
}

function Ejemplo() {
    $conection = conn();
    $consulta = "select xd............";
    $query = mysqli_query($conection, $consulta);
    return $query;
}
?>