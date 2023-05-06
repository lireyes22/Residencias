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
function generarBancoProyecto($IDUsuario){
    $conection = conn();

    $IDDepUser = "SELECT Alumnos.DID FROM Alumnos
    INNER JOIN Alumno_Usuarios ON Alumnos.NumeroControl= Alumno_Usuarios.NumeroControl
    INNER JOIN Usuarios ON Alumno_Usuarios.UID= Usuarios.UID
    WHERE Usuarios.UID='$IDUsuario'";

}

function getAsesor($IDPU){
    $conection = conn();
    $sql = "SELECT * FROM Profesor
    INNER JOIN Profesor_Usuarios ON Profesor_Usuarios.RFCProfesor = Profesor.RFCProfesor
    WHERE $IDPU = Profesor_Usuarios.IDPU";
    $query = mysqli_query($conection, $sql);

    //Obtengo datos del profesor
    $result = mysqli_fetch_assoc($query);

    return array(
        'nombreasesor' => $result['NombreCompleto']
    );
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

function getEmpresa($ERFC){
    $conection = conn();
    $sql = "SELECT * FROM Empresas WHERE ERFC = '$ERFC'";
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
        'epuestotitular' => $result['EPuestoTitular']

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
?>