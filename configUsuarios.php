<?php 
    //Guardar el id del usuario
    $ID = $_SESSION['id'];
    //validar la existencia de la firma del usuario
    $firma=validarFirma($ID);
?>
<!DOCTYPE html>
<html>

<head>
    
</head>
<body style="margin: 0;" class="bd-confU">
    <?php
    if($firma['Ufirma']==null | $firma['Ufirma']==''){
        echo '<div class="btn-firma">
            <form method="POST" enctype="multipart/form-data" >
            <h3>Agregar Firma:</h3>
                <p><input type="file" name="firma" id="firma" value="agregar nueva firma" accept=".png" required></p>
                <p><input type="submit" value="Guardar" formaction="../agregarFirma.php"></p><br>
                <input type="hidden" name="id" value = "'.$ID.'">
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
                <p><input type="submit" value="Guardar" formaction="../agregarFirma.php"></p><br>
                <input type="hidden" name="id" value = "'.$ID.'">
            </form>
        </div>';
    }
    ?>
    </body>
<html>