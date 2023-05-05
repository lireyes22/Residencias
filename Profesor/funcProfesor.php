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
    function basicInfoProy($SPID){ //Nombre del proyecto, Objetivo, Numero Estudiantes, Tiempo Estimado, Nombre del Responsable
        $conection = conn();
        $sql = "CALL basicInfo($SPID);";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function listProyPendientes($UID){ 
        $conection = conn();
        $sql = "SELECT SPID FROM `ComisionProyectoProfesor` WHERE `UProfesor` = $UID AND `CPPEstatus` = 'PENDIENTE';";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function NombreProfesor($UID){
        //SELECT Profesor.`NombreCompleto` FROM `Profesor` INNER JOIN `Profesor_Usuarios` ON Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE Profesor_Usuarios.`UID` = 10;
        $conection = conn();
        $sql = "SELECT Profesor.`NombreCompleto` FROM `Profesor` INNER JOIN `Profesor_Usuarios` ON Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE Profesor_Usuarios.`UID` = $UID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function carrerasSolicitud($SPID){
        $conection = conn();
        $sql = "SELECT Carreras.Nombre, Carreras.CID FROM Carreras INNER JOIN CarrerasSolicitudProyecto ON Carreras.CID = CarrerasSolicitudProyecto.CID WHERE CarrerasSolicitudProyecto.SPID = $SPID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function updateComision($_SPID, $_CPPEstatus, $_CPPObservaciones){
        $conection = conn();
        $sql = "UPDATE ComisionProyectoProfesor SET ComisionProyectoProfesor.CPPEstatus = '$_CPPEstatus', ComisionProyectoProfesor.CPPObservaciones = '$_CPPObservaciones' WHERE SolicitudProyecto.SPID = $_SPID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
    }
    function updateSolicitudProyecto($_SPID, $_CPPEstatus){
        $conection = conn();
        $sql = "UPDATE SolicitudProyecto SET SolicitudProyecto.SPEstatus = '$_CPPEstatus' WHERE SolicitudProyecto.SPID = $_SPID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
    }
?>