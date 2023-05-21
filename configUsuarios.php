<?php 
    //Guardar el id del usuario
    $ID = $_SESSION['id'];
    //validar la existencia de la firma del usuario
    $firma=validarFirma($ID);
    //print_r($firma);
    
?>
<!DOCTYPE html>
<html>

<head>
</head>
<body style="margin: 0;" onload="inicio()">
    <?php
    if($firma['Ufirma']==null | $firma['Ufirma']==''){
        echo '<div clas="btn-firma">
            <form method="POST" enctype="multipart/form-data" >
                <input type="file" name="firma" id="firma" accept=".png" required><br>
                <input type="submit" value="agregar firma" formaction="../agregarFirma.php">
                <input type="hidden" name="id" value = "'.$ID.'">
            </form>
        </div>';
    }
    else{
        echo '<div clas="btn-firma">
            <p>Firma Actual: <br><br>'.$firma['Ufirma'].'</p><br>
            <form method="POST" enctype="multipart/form-data">
                <br><br><input type="file" name="firma" id="firma" accept=".png" required><br><br>
                <input type="submit" value="Agregar una nueva firma" formaction="../agregarFirma.php">
                <input type="hidden" name="id" value = "'.$ID.'">
            </form>
        </div>';
    }
    ?>
</body>
<html>