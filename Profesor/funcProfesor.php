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
    /*
    function nombreUsuario(){
       return $sql; 
    }*/
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
        $sql = "UPDATE ComisionProyectoProfesor SET ComisionProyectoProfesor.CPPEstatus = '$_CPPEstatus', ComisionProyectoProfesor.CPPObservaciones = '$_CPPObservaciones' WHERE ComisionProyectoProfesor.SPID = $_SPID;";
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
    function cargarBanco($SPID){
        $conection = conn();
        $sql = "INSERT INTO BancoProyectos(SPID, BPPeriodo) VALUES($SPID,'ENE-JUN 2023');";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
    }
    function existeBanco($SPID){
        $conection = conn();
        $sql = "SELECT * FROM BancoProyectos WHERE SPID = $SPID";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }

    // -------------------------------------------------------- Reflection Funciones --------------------------------------------------

    function getResidente($SRID){
        $conection = conn();
        $sql = "SELECT Alumnos.NombreCompleto, Alumnos.NumeroControl, Alumnos.Domicilio,
        Alumnos.SemestreActual, Alumnos.NumeroSeguroSocial, Alumnos.Email, Alumnos.Ciudad,
        Alumnos.Telefono, Alumnos.InstitucionSeguro, Alumnos.CID
        FROM Alumnos
        INNER JOIN Alumno_Usuarios ON Alumno_Usuarios.NumeroControl = Alumnos.NumeroControl
        INNER JOIN SolicitudResidencia ON SolicitudResidencia.UAlumno = Alumno_Usuarios.UID
        WHERE SolicitudResidencia.SRID = $SRID";
        $query = mysqli_query($conection, $sql);
        $result = mysqli_fetch_assoc($query);
        
        $CID = $result['CID'];

        $sql2 = "SELECT Nombre FROM Carreras WHERE $CID = CID";
        $query2 = mysqli_query($conection, $sql2);
        $result2 = mysqli_fetch_assoc($query2);

        return array(
            'nombre' => $result['NombreCompleto'],
            'numcontrol' => $result['NumeroControl'],
            'domicilio' => $result['Domicilio'],
            'semestre' => $result['SemestreActual'],
            'seguro_social' => $result['NumeroSeguroSocial'],
            'email' => $result['Email'],
            'ciudad' => $result['Ciudad'],
            'tel' => $result['Telefono'],
            'nomcarrera' => $result2['Nombre'],
            'institucionseguro' => $result['InstitucionSeguro']
        );
    }

    function getEmpresa($SRID){
        $conection = conn();
        $sql = "SELECT Empresas.`ENombre`, Empresas.`ERFC`, Empresas.`ERamo`, Empresas.`ESector`, Empresas.`EActPrincipal`, Empresas.`EDomicilio`, Empresas.`EColonia`, Empresas.`ECiudad`, Empresas.`ECp`, Empresas.`EFax`, Empresas.`ETelefono`,Empresas.`EEstatus`, Empresas.`ENombreTitular`, Empresas.`ENombreAcuerdo`, Empresas.`EPuestoTitular`, Empresas.`EPuestoAcuerdo`
        FROM `Empresas`
        INNER JOIN SolicitudProyecto ON SolicitudProyecto.`ERFC` = Empresas.`ERFC`
        INNER JOIN BancoProyectos ON BancoProyectos.`SPID` = SolicitudProyecto.`SPID`
        INNER JOIN SolicitudResidencia ON SolicitudResidencia.`BPID` = BancoProyectos.`BPID`
        WHERE SolicitudResidencia.`SRID` = $SRID";
        $query = mysqli_query($conection, $sql);
    
        $result = mysqli_fetch_assoc($query);
        $nombre = $result['ENombre'];
        $ramo = $result['ERamo'];
        $erfc = $result['ERFC'];
        $esector = $result['ESector'];
        $eactprincipal = $result['EActPrincipal'];
    
        return array(
            'nombre' => $nombre,
            'ramo' => $ramo,
            'erfc' => $erfc,
            'esector' => $esector,
            //Otra forma de hacerlo sin la necesidad de copiarlo en otra variable
            'eactprincipal' => $result['EActPrincipal'],
            'edomicilio' => $result['EDomicilio'],
            'ecolonia' => $result['EColonia'],
            'ecp' => $result['ECp'],
            'efax' => $result['EFax'],
            'eciudad' => $result['ECiudad'],
            'etelefono' => $result['ETelefono'],
            'enombretitular' => $result['ENombreTitular'],
            'epuestotitular' => $result['EPuestoTitular'],
            'enombreacuerdo' => $result['ENombreAcuerdo'],
            'epuestoacuerdo' => $result['EPuestoAcuerdo']
        );
    }

    function getResidencia($SRID){
        $conection = conn();
        $sql = "SELECT SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPTipo, 
        SolicitudProyecto.SPEstudiantesRequeridos, SolicitudProyecto.SDTiempoEstimado
        FROM SolicitudProyecto
        INNER JOIN BancoProyectos ON BancoProyectos.`SPID` = SolicitudProyecto.`SPID`
        INNER JOIN SolicitudResidencia ON SolicitudResidencia.`BPID` = BancoProyectos.`BPID`
        WHERE $SRID = SolicitudResidencia.SRID";
        $query = mysqli_query($conection, $sql);
        $result = mysqli_fetch_assoc($query);
    
        $sql2 = "SELECT SolicitudResidencia.SROpcionElegida FROM SolicitudResidencia
        WHERE $SRID = SolicitudResidencia.SRID";
        $query2 = mysqli_query($conection, $sql2);
        $result2 = mysqli_fetch_assoc($query2);
    
        // SolicitudResidencia.SROpcionElegida
    
        return array (
            'sropcionelegida' => $result2['SROpcionElegida'],
            'spnombreproyecto' => $result['SPNombreProyecto'],
            'sptipo' => $result['SPTipo'],
            'spestudiantesrequeridos' => $result['SPEstudiantesRequeridos'],
            'sdtiempoestimado' => $result['SDTiempoEstimado']
        );
    }

    function getAsesor($SRID){
        $conection = conn();
        $sql = "SELECT Profesor.NombreCompleto FROM Profesor
        INNER JOIN `Profesor_Usuarios` ON Profesor.`RFCProfesor` = Profesor_Usuarios.RFCProfesor
        INNER JOIN `AsesorInterno`ON Profesor_Usuarios.`UID` = AsesorInterno.`UID`
        INNER JOIN `BancoProyectos` ON AsesorInterno.`AIID` = BancoProyectos.`AIID`
        INNER JOIN `SolicitudResidencia`ON BancoProyectos.`BPID` = SolicitudResidencia.`BPID`
        WHERE SolicitudResidencia.`SRID`= $SRID";
        $query = mysqli_query($conection, $sql);
    
        //Obtengo datos del profesor
        $result = mysqli_fetch_assoc($query);
    
        return array(
            'nombreasesor' => $result['NombreCompleto']
        );
    }
?>