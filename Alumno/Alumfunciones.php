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

if(isset($_POST['EnviarSolicitud'])){
    setProyecto();
}

function generarBancoProyecto($IDUsuario){
    $conection = conn();

    $IDDepUser = "SELECT Alumnos.DID FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl= Alumno_Usuarios.NumeroControl
    INNER JOIN Usuarios ON Alumno_Usuarios.UID= Usuarios.UID
    WHERE Usuarios.UID='$IDUsuario'";

}

function getAsesor($SPID){
    $conection = conn();
    $sql = "SELECT Profesor.NombreCompleto FROM Profesor
    INNER JOIN `Profesor_Usuarios` ON Profesor.`RFCProfesor` = Profesor_Usuarios.RFCProfesor
    INNER JOIN `AsesorInterno`ON Profesor_Usuarios.`UID` = AsesorInterno.`UID`
    INNER JOIN `BancoProyectos` ON AsesorInterno.`AIID` = BancoProyectos.`AIID`
    INNER JOIN `SolicitudProyecto`ON BancoProyectos.`SPID` = SolicitudProyecto.`SPID`
    WHERE SolicitudProyecto.`SPID`= $SPID";
    $query = mysqli_query($conection, $sql);

    //Obtengo datos del profesor
    $result = mysqli_fetch_assoc($query);

    return array(
        'nombreasesor' => $result['NombreCompleto']
    );
}

function getCoordinador($UID){
    $conection = conn();
    $sql = "SELECT * FROM `Usuarios` 
    INNER JOIN `UsuariosDepartamentos` ON Usuarios.`UID`=UsuariosDepartamentos.`UID`
    WHERE Usuarios.`UID`=$UID";
    $query = mysqli_query($conection, $sql);
    $result = mysqli_fetch_assoc($query);

    $depto = $result['Urol'];

    $sql2 = "SELECT * FROM `Usuarios` 
    INNER JOIN `UsuariosDepartamentos` ON Usuarios.`UID`=UsuariosDepartamentos.`UID` 
    INNER JOIN `Profesor_Usuarios` on Profesor_Usuarios.`UID`=Usuarios.`UID`
    INNER JOIN `Profesor` ON Profesor_Usuarios.`RFCProfesor`=Profesor.`RFCProfesor` 
    WHERE Usuarios.`URol`='Coordinador' AND UsuariosDepartamentos.DID='$depto'";
    $query2 = mysqli_query($conection, $sql2);
    $result2 = mysqli_fetch_assoc($query2);
}

function getResidente($UID){
    $conection = conn();
    $sql = "SELECT * FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl 
    WHERE $UID = Alumno_Usuarios.UID";
    $query = mysqli_query($conection, $sql);
    
    // Obtener los valores de las columnas
    $result = mysqli_fetch_assoc($query);
    $nombre = $result['NombreCompleto'];
    $NumControl = $result['NumeroControl'];
    $domicilio = $result['Domicilio'];
    $email = $result['Email'];
    $semestre = $result['SemestreActual'];
    $seguro = $result['NumeroSeguroSocial'];
    $ciudad = $result['Ciudad'];
    $tel = $result['Telefono'];
    $CID = $result['CID'];

    $sql2 = "SELECT Nombre FROM Carreras WHERE $CID = CID";
    $query2 = mysqli_query($conection, $sql2);
    $result2 = mysqli_fetch_assoc($query2);

    // Obtener los valores de las columnas
    $nomCarrera = $result2['Nombre'];

    // Retornar un arreglo asociativo con los valores
    return array(
        'nombre' => $nombre,
        'numcontrol' => $NumControl,
        'domicilio' => $domicilio,
        'semestre' => $semestre,
        'seguro_social' => $seguro,
        'email' => $email,
        'ciudad' => $ciudad,
        'tel' => $tel,
        'nomcarrera' => $nomCarrera,
        'institucionseguro' => $result['InstitucionSeguro']
    );
}

function getEmpresa($SPID){
    $conection = conn();
    $sql = "SELECT * FROM Empresas 
    INNER JOIN SolicitudProyecto ON SolicitudProyecto.ERFC = Empresas.ERFC 
    WHERE $SPID = SolicitudProyecto.SPID";
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

function getResidencia($SPID){
    $conection = conn();
    $sql = "SELECT SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPTipo, 
            SolicitudProyecto.SPEstudiantesRequeridos, SolicitudProyecto.SDTiempoEstimado
            FROM SolicitudProyecto
            WHERE $SPID = SolicitudProyecto.SPID";
    $query = mysqli_query($conection, $sql);
    $result = mysqli_fetch_assoc($query);

    // $sql2 = "SELECT SolicitudResidencia.SROpcionElegida FROM SolicitudResidencia
    // WHERE $SPID = SolicitudResidencia.SPID";
    // $query2 = mysqli_query($conection, $sql2);
    // $result2 = mysqli_fetch_assoc($query2);

    // SolicitudResidencia.SROpcionElegida

    return array (
        'spnombreproyecto' => $result['SPNombreProyecto'],
        'sptipo' => $result['SPTipo'],
        'spestudiantesrequeridos' => $result['SPEstudiantesRequeridos'],
        'sdtiempoestimado' => $result['SDTiempoEstimado']
    );
}

function getProyecto($UID){
    //SELECT Profesor.`NombreCompleto` FROM `Profesor` INNER JOIN `Profesor_Usuarios` ON Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE Profesor_Usuarios.`UID` = 10;
    $conection = conn();
    $sql = "SELECT Profesor.`NombreCompleto` FROM `Profesor` INNER JOIN `Profesor_Usuarios` ON Profesor_Usuarios.`RFCProfesor` = Profesor.`RFCProfesor` WHERE Profesor_Usuarios.`UID` = $UID;";
    $query = mysqli_query($conection, $sql);
    // vaciar el buffer de resultados
    while (mysqli_next_result($conection)) { }
        return $query;
}

function validarRes($ID){
    $activo = false;
    $candidato = false;
    $conection = conn();
    $sql = "SELECT SolicitudResidencia.SREstatus FROM `SolicitudResidencia`
    WHERE SolicitudResidencia.UAlumno = $ID";
    $query = mysqli_query($conection, $sql);

    // Verificar si hay al menos una fila en el resultado
    if (mysqli_num_rows($query) > 0) {
        // Loop a través de cada fila en el resultado
        while ($fila = mysqli_fetch_assoc($query)) {
            // Validar el contenido de cada fila
            if ($fila['SREstatus'] == 'ESPERA' || $fila['SREstatus'] == 'ASIGNADO' || $fila['SREstatus'] == 'APROBADO'
            || $fila['SREstatus'] == 'PENDIENTE') {
                $activo = true;
            }
        }
    } else {
        $activo = false;
    }


    $sql2 = "SELECT Alumnos.CreditosComplementariosCumplidos, Alumnos.NoTenerCursosEspeciales,
    Alumnos.OchentaPorcientoCargaAcademica, Alumnos.AcreditacionServicioSocial
    FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl = Alumno_Usuarios.NumeroControl 
    WHERE Alumno_Usuarios.UID = $ID";
    $query2 = mysqli_query($conection, $sql2);
    $result2 = mysqli_fetch_assoc($query2);

    if ($result2['CreditosComplementariosCumplidos'] == 5 && $result2['NoTenerCursosEspeciales'] == 0
        && $result2['OchentaPorcientoCargaAcademica'] == 1 && $result2['AcreditacionServicioSocial'] == 1) {
        $candidato = true;
    } else {
        $candidato = false;
    }

    return array(
        'activo' => $activo,
        'candidato' => $candidato
    );
}

?>