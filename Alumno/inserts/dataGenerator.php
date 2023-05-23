<?php     
	include ('../Alumfunciones.php');
    include '../../InicioSessionSeg.php';
    //ID del proyecto
    $SPID = $_POST['SPID'];
    //Llamo a funciones
    $empresa = getEmpresa($SPID);
    $residente = getResidente($_SESSION['id']);
    $residencia = getResidencia($SPID);
    $asesorI = getAsesor($SPID);
?>

<!DOCTYPE html>
<html>
    
<head>
    <link rel="stylesheet" type="text/css" href="style/styleAlumno.css" title="styleSolicRes">
    <link rel="stylesheet" href="../style/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud para la residencia profesional</title>
</head>
<body style="margin: 0;">
    <!----------------------------------------------------- Fieldset Proyecto ---------------------------------------------------------->
    <form method="POST" action="../docs/generador.php"; enctype="multipart/form-data" target="blank">
        <input type="date" name="1" value="<?php echo date('Y-m-d'); ?>">
        <input type="hidden" name="2" value="<?php echo 'Juan Cocio' ?>">
        <input type="hidden" name="3" value="<?php echo 'Benja' ?>">
        <input type="hidden" name="4" value="<?php echo $residente['nomcarrera'] ?>">
        <input type="hidden" name="5" value="<?php echo $residencia['spnombreproyecto']; ?>">
        <select name="6" disabled>
            <option value="interno" <?php if($residencia['sptipo'] == 'INTERNO') echo 'selected'; ?>>Interno</option>
            <option value="externo" <?php if($residencia['sptipo'] == 'EXTERNO') echo 'selected'; ?>>Externo</option>
            <option value="dual" <?php if($residencia['sptipo'] == 'DUAL') echo 'selected'; ?>>Dual</option>
            <option value="CIIE" <?php if($residencia['sptipo'] == 'CIIE') echo 'selected'; ?>>CIIE</option>
        </select>
        <select name="7">
            <?php
                if($residencia['SROpcionElegida'] == 'Op1'){
                    echo "<option value='Propuesta Propia'>Propuesta Propia</option>";
                }else if($residencia['SROpcionElegida'] == 'Op2'){
                    echo '<option value="Trabajador">Trabajador</option>';
                }else if($residencia['SROpcionElegida'] == 'Op3'){
                    echo '<option value="Op3">Banco de Proyectos</option>';
                }
            ?>
            </select>
        <input type="hidden" name="8" value="<?php echo $residencia['sdtiempoestimado'] . ' meses'; ?>">
        <input type="number" name="10" min="1" max="4" placeholder="0" value="<?php echo $residencia['spestudiantesrequeridos']; ?>">
        <input type="hidden" name="11" value="<?php echo $empresa['nombre'] ?>">
        <select name="12" disabled>
            <option value="Industrial" <?php if($empresa['ramo'] == 'Industrial') echo 'selected'; ?>>Industrial</option>
            <option value="Servicios" <?php if($empresa['ramo'] == 'Servicios') echo 'selected'; ?>>Servicios</option>
            <option value="Escolar" <?php if($empresa['ramo'] == 'Escolar') echo 'selected'; ?>>Escolar</option>
            <option value="Otro" <?php if(empty($empresa['ramo']) || $empresa['ramo'] == 'Otro' || ($empresa['ramo'] != 'Industrial' && $empresa['ramo'] != 'Servicios' && $empresa['ramo'] != 'Escolar')) echo 'selected'; ?>>Otro</option>
        </select>
        <input type="hidden" name="13" value="<?php echo $empresa['erfc'] ?>">
        <select name="14" disabled>
            <option value="Publico" <?php if($empresa['esector'] == 'Publico') echo 'selected'; ?>>Publico</option>
            <option value="Privado" <?php if($empresa['esector'] == 'Privado') echo 'selected'; ?>>Privado</option>
            <option value="Otro" <?php if(empty($empresa['esector']) || $empresa['esector'] == 'Otro' || ($empresa['esector'] != 'Publico' && $empresa['esector'] != 'Privado')) echo 'selected'; ?>>Otro</option>
        </select>
        <input type="hidden" name="15" value="<?php echo $empresa['eactprincipal'] ?>">
        <input type="hidden" name="16" value="<?php echo $empresa['edomicilio'] ?>">
        <input type="hidden" name="17" value="<?php echo $empresa['ecolonia'] ?>">
        <input type="hidden" name="18" value="<?php echo $empresa['ecp'] ?>">
        <input type="hidden" name="19" value="<?php echo $empresa['efax'] ?>">
        <input type="hidden" name="20" value="<?php echo $empresa['eciudad'] ?>">
        <input type="hidden" name="21" value="<?php echo $empresa['etelefono'] ?>">
        <input type="hidden" name="22" value="<?php echo $empresa['enombretitular']?>">
        <input type="hidden" name="23" value="<?php echo $empresa['epuestotitular']?>">
        <input type="hidden" name="24" value="<?php echo $empresa['enombreacuerdo']?>">
        <input type="hidden" name="25" value="<?php echo $empresa['epuestoacuerdo']?>">
        <input type="hidden" name="26" value="<?php echo $empresa['enombreacuerdo']?>">
        <input type="hidden" name="28" value="<?php echo $residente['nombre'] ?>">
        <input type="hidden" name="29" value="<?php echo $residente['nomcarrera'] ?>">
        <input type="hidden" name="30" value="<?php echo $residente['numcontrol'] ?>">                    
        <input type="hidden" name="31" value="<?php echo $residente['semestre'] ?>">
        <input type="hidden" name="32" value="<?php echo $residente['domicilio'] ?>">
        <input type="hidden" name="33" value="<?php echo $residente['email'] ?>">
        <input type="hidden" name="34" value="<?php echo $residente['seguro_social'] ?>">
        <input type="radio" name="34" value="IMSS" <?php if($residente['institucionseguro'] == 'IMSS') echo 'checked'; ?> >
        <input type="radio" name="34" value="ISSSTE" <?php if($residente['institucionseguro'] == 'ISSSTE') echo 'checked'; ?> >
        <input type="radio" name="34" value="OTROS" <?php if(empty($residente['institucionseguro']) || $residente['institucionseguro'] == 'Otro' || ($residente['institucionseguro'] != 'IMSS' && $residente['institucionseguro'] != 'ISSSTE')) echo 'checked'; ?>>
        <input type="hidden" name="35" value="<?php echo $residente['ciudad'] ?>">
        <input type="hidden" name="36" value="<?php echo $residente['tel'] ?>">  
        <input type="submit" id="submitButton" value="">
        <script>
           var submitButton = document.getElementById('submitButton');
            // Simula un clic en el botón de envío automáticamente
            submitButton.click();
        </script>
    </form>
</body>
</html> 
