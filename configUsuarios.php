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
            <form action="config.php" method="Post" enctype="multipart/form-data" >
                <input type="file" name="firma" id="firma" accept=".png" required><br>
                <input type="submit" value="agregar firma" >
            </form>
        </div>';
    }
    else{
        echo '<div clas="btn-firma">
            <p>Firma Actual: <br><br>'.$firma['Ufirma'].'</p><br>
            <form action="config.php"  method="Post" enctype="multipart/form-data">
                <br><br><input type="file" name="firma" id="firma" accept=".png" required><br><br>
                <input type="submit" value="Agregar una nueva firma">
            </form>
        </div>';
    }
    ?>
</body>
<html>
<script type="text/javascript">
    function validarExt(){
        var achivoInput = document.getElementById('firma');
        var archivoRuta = achivoInput.value;
        var extPermitidas = /(.png|.PNG)$/i;
        if(!extPermitidas.exe(archivoRuta)){
            alert('Solo se admiten archivos');
            achivoInput.value = '';
        }
   }
</script>