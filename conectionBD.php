<?php
    function conectBD(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'Residencias';
        $conection = @mysqli_connect($host, $user, $password, $db);
    
        if(!$conection){
            echo 'Error de conexion';
            return null;
        }
        mysqli_set_charset($conection, "utf8");
        return $conection;
    }
?>