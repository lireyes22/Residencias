<?php
include 'funciones.php';
$id= $_GET['idUsuario'];
$firma=validarFirma($id);
//crear la conecion a la base
$conection = conn();
//validar el tipo de usuario
$sql = "SELECT URol FROM Usuarios WHERE UID = $id;";
$sql = mysqli_query($conection,$sql);
$sql = mysqli_fetch_assoc($sql);
$rol=$sql['URol'];
$rolUsuario= $rol;
if($rol == 'JefDeptAca'){
    $rol= 'Departamento Academico';
    //$url=;
}elseif($rol == 'AsesorExterno'){
    $rol= 'Asesor';
    $url='AsesorExterno/IndexAE.php';
}elseif($rol == 'Alumno'){
    $rol= 'Alumno';
    $url='Alumno/AlumTraking.php';
}

//crear el link de para que pueda regresar a su index

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styleConfu.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuraciones</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="left-column">
                <a class="home-btn" href="<?php echo $url;?>">
                    <h2><span style="margin-right: 10px;"><?php echo $rol;?></span></h2>
                    <img src="img/sombrero.png" width="50px">
                </a>
            </div>
            <div class="center-column">
                <h2>Configuraciones</h2>
            </div>
            <div class="right-column">
                <a href="usuariosConfig.php?idUsuario=<?php echo $_SESSION['id'];?>"><img src="img/configuraciones.png" width="50px"></a> &nbsp; &nbsp;
                <a href="logout.php"><img src="img/logout.png" width="40px"></a>
            </div>
        </div>
        <?php
        //include 'MenuAlumno.html';
        ?>
    </div> 
    <?php 
    if($firma['Ufirma']==null | $firma['Ufirma']==''){
        echo '<div class="btn-firma">
            <form method="POST" enctype="multipart/form-data" >
            <h3>Agregar Firma:</h3>
                <p><input type="file" name="firma" id="firma" value="agregar nueva firma" accept=".png" required></p>
                <p>
                <input type="submit" value="Guardar" formaction="agregarFirma.php">
                <input type="reset" value="No guardar">
                </p><br>
                <input type="hidden" name="id" value = "'.$id.'">
                <input type="hidden" name="url" value = "'.$url.'">
            </form>
        </div>';
    }
    else{
        echo '<div class="btn-firma">
            <div class = "ufirma">
                <h3>Mi Firma: </h3>
                <p><input type="text" size="80" maxlength="80" value= "'.$firma['Ufirma'].' " disabled></p>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <h3>Agregar Nueva Firma: </h3>
                <p><input type="file" name="firma" id="firma" value="agregar nueva firma" accept=".png" required></p>
                <p><input type="submit" value="Guardar" formaction="agregarFirma.php">
                <input type="reset" value="No guardar"></p><br>
                <input type="hidden" name="id" value = "'.$id.'">
                <input type="hidden" name="id" value = "'.$id.'">
            </form>
        </div>';
    }
    ?>

</body>
</html>