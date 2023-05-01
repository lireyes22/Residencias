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

    
?>