<?php
    /*function conn(){
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
    }*/
    /*
    function nombreUsuario(){
       return $sql; 
    }*/
    include ('../conectionBD.php');


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
            'institucionseguro' => $result['InstitucionSeguro'],
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
    
        $sql2 = "SELECT SolicitudResidencia.SROpcionElegida, SolicitudResidencia.SRAnteProyecto FROM SolicitudResidencia
        WHERE $SRID = SolicitudResidencia.SRID";
        $query2 = mysqli_query($conection, $sql2);
        $result2 = mysqli_fetch_assoc($query2);
    
        // SolicitudResidencia.SROpcionElegida
    
        return array (
            'sropcionelegida' => $result2['SROpcionElegida'],
            'anteproyecto' => $result2['SRAnteProyecto'],
            'spnombreproyecto' => $result['SPNombreProyecto'],
            'sptipo' => $result['SPTipo'],
            'spestudiantesrequeridos' => $result['SPEstudiantesRequeridos'],
            'sdtiempoestimado' => $result['SDTiempoEstimado']
        );
    }

    function getAsesor($SRID){ //ALV
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
        $nombre = 'SIN ASESOR';
        if(isset($result["NombreCompleto"])){
            $nombre = $result["NombreCompleto"];
        }
        return array(
            'nombreasesor' => $nombre
        );
    }
    function revision($SPID){
        $conection = conn();
        $sql = "SELECT SolicitudProyecto.SPEstatus FROM SolicitudProyecto WHERE SPID = $SPID";
        $query = mysqli_fetch_array(mysqli_query($conection, $sql));
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query[0];
    }
    function estudiantesActuales($SPID){ //DEVUELVE EL NUMERO DE ESPACIOS LIBRES QUE QUEDAN EN UN PROYECTO
        $conection = conn();
        $sql = "SELECT Count(*) FROM SolicitudResidencia INNER JOIN BancoProyectos ON SolicitudResidencia.BPID = BancoProyectos.BPID WHERE BancoProyectos.SPID = $SPID AND SolicitudResidencia.SREstatus = 'APROBADO';";
        $query = mysqli_fetch_array(mysqli_query($conection, $sql));
        $numeroDeResidentes = intval($query[0]);
        $sql = "SELECT SPEstudiantesRequeridos FROM SolicitudProyecto WHERE SolicitudProyecto.SPID = $SPID;";
        $query = mysqli_fetch_array(mysqli_query($conection, $sql));
        $estudiantesRequeridos = intval($query[0]);
        $n = $estudiantesRequeridos - $numeroDeResidentes;
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $n;
    }
    function listSolicProyAcep($DID){ //LISTA DE SPID ACEPTADOS Y EN EL DEPARTAMENTO SOLICITADO
        $conection = conn();
        $sql = "SELECT SolicitudProyecto.`SPID` FROM `SolicitudProyecto` INNER JOIN `UsuariosDepartamentos` ON SolicitudProyecto.`UIDResponsable` = UsuariosDepartamentos.`UID` WHERE UsuariosDepartamentos.`DID` = $DID AND SolicitudProyecto.`SPEstatus`='ACEPTADO';";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function DID($UID){ //OBTIENE EL DEPARTAMENTO ID CON EL ID DEL USUARIO
        $conection = conn();
        $sql = "SELECT UsuariosDepartamentos.`DID` FROM `UsuariosDepartamentos` WHERE `UsuariosDepartamentos`.UID = $UID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function listProySolicitados($SPID){ //DEVUELVE EL NOMBRE Y SU ESTATUS (PENDIENTE, REVISION, ACEPTADO, RECHAZADO) ASI COMO SUS COMENTARIOS
        $conection = conn();
        $sql = "SELECT SolicitudProyecto.`SPNombreProyecto`, SolicitudProyecto.SPEstatus FROM `SolicitudProyecto` WHERE `SolicitudProyecto`.SPID = $SPID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function observaciones($SPID){ //OBSERVACIONES
        $conection = conn();
        $sql = "SELECT ComisionProyectoProfesor.CPPObservaciones FROM `ComisionProyectoProfesor` WHERE `ComisionProyectoProfesor`.SPID = $SPID;";
        $query = mysqli_fetch_array(mysqli_query($conection, $sql));
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query[0];
    }

    function listSPIDsolicitudes($UID){ //DEVUELVE EL SPID
        $conection = conn();
        $sql = "SELECT SolicitudProyecto.`SPID` FROM `SolicitudProyecto` WHERE `SolicitudProyecto`.UIDResponsable = $UID AND SolicitudProyecto.SPEstatus != 'CANCELADO';";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function getCarreras(){
        $conection = conn();
        $sql = "SELECT * FROM Carreras";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function getCarrerasXSolicitud($IDSP_ACTUAL){
        $conection = conn();
        $sql = "SELECT CarrerasSolicitudProyecto.* FROM CarrerasSolicitudProyecto INNER JOIN SolicitudProyecto ON CarrerasSolicitudProyecto.SPID=SolicitudProyecto.SPID WHERE SolicitudProyecto.SPID='$IDSP_ACTUAL'";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function banco($DID){
        $conection = conn();
        $sql = "CALL bancoProyecto($DID);";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function SolicitudData($SPID){
        $link = conn();
        $query = "SELECT * FROM SolicitudProyecto WHERE SPID = '$SPID'";
        $result = mysqli_query($link, $query);
        // vaciar el buffer de resultados
        while (mysqli_next_result($link)) { }
        return mysqli_fetch_array($result);
    }
    function empresa($SPID){
        $conection = conn();
        $sql = "SELECT Empresas.ENombre FROM Empresas INNER JOIN SolicitudProyecto ON Empresas.ERFC = SolicitudProyecto.ERFC WHERE SolicitudProyecto.SPID = $SPID;";
        $query = mysqli_query($conection, $sql);
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query;
    }
    function coordinador($DID){
        $conection = conn();
        $sql = "SELECT Profesor.NombreCompleto FROM profesor INNER JOIN profesor_usuarios ON profesor.`RFCProfesor` = profesor_usuarios.`RFCProfesor` INNER JOIN usuarios ON profesor_usuarios.`UID` = usuarios.`UID` WHERE usuarios.`URol` = 'Coordinador' AND profesor.`DID` = $DID;";
        $query = mysqli_fetch_assoc(mysqli_query($conection, $sql));
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return array(
            'coordinador' => $query['NombreCompleto']
        );
    }
    function jefeDivision(){
        $conection = conn();
        $sql = "SELECT Profesor.NombreCompleto FROM profesor INNER JOIN profesor_usuarios ON profesor.`RFCProfesor` = profesor_usuarios.`RFCProfesor` INNER JOIN usuarios ON profesor_usuarios.`UID` = usuarios.`UID` WHERE usuarios.`URol` = 'JefeDivisonEstudios';";
        $query = mysqli_fetch_assoc(mysqli_query($conection, $sql));
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return array(
            'jefeDivision' => $query['NombreCompleto']
        );
    }
    function bienvenida($UID){
        $conection = conn();
        $sql = "SELECT Profesor.NombreCompleto FROM profesor INNER JOIN profesor_usuarios ON profesor.`RFCProfesor` = profesor_usuarios.`RFCProfesor` WHERE profesor_usuarios.UID = '$UID'";
        $query = mysqli_fetch_assoc(mysqli_query($conection, $sql));
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        return $query['NombreCompleto'];
    }
    function comentarios($SPID){
        $conection = conn();
        $sql = "SELECT profesor.`NombreCompleto`, profesor.`CorreoInstitucional`, comisionproyectoprofesor.`CPPFechaLimite`, comisionproyectoprofesor.`CPPEstatus`, comisionproyectoprofesor.`CPPObservaciones`
        FROM profesor INNER JOIN profesor_usuarios ON profesor.`RFCProfesor` = profesor_usuarios.`RFCProfesor` INNER JOIN comisionproyectoprofesor ON comisionproyectoprofesor.`UProfesor` = profesor_usuarios.`UID`
        WHERE comisionproyectoprofesor.`SPID` = $SPID;";
        $query = mysqli_fetch_assoc(mysqli_query($conection, $sql));
        // vaciar el buffer de resultados
        while (mysqli_next_result($conection)) { }
        if(!isset($query)){
            return array(
                'Nombre' => 'Sin revision asignada',
                'Correo' => '-',
                'Fecha' => '-',
                'Estatus' => '-',
                'Comentarios' => '-'
            );
        }
        return array(
            'Nombre' => $query['NombreCompleto'],
            'Correo' => $query['CorreoInstitucional'],
            'Fecha' => $query['CPPFechaLimite'],
            'Estatus' => $query['CPPEstatus'],
            'Comentarios' => $query['CPPObservaciones']
        );
    }
?>