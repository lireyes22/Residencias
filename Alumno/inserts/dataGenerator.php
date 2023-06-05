<?php  
    include '../../conectionBD.php';   
	include ('../Alumfunciones.php'); 
    include '../../InicioSessionSeg.php';
    //ID del proyecto
    $SPID = $_POST['SPID'];
    //Llamo a funciones
    $empresa = getEmpresa($SPID);
    $residente = getResidente($_SESSION['id']);
    $residencia = getResidencia($SPID);
    $asesorI = getAsesor($SPID);
    $conn = conn();
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
        <?php
            $administrativo = Division_Coordinador($residente['nomcarrera']);
        ?>
        <input type="hidden" name="1" value="<?php echo date('dd-md-yyyy'); ?>">
        <input type="hidden" name="2" value="<?php echo $administrativo['jefeDivEst'] ?>">
        <input type="hidden" name="3" value="<?php echo $administrativo['coordinador'] ?>">
        <input type="hidden" name="4" value="<?php echo $residente['nomcarrera'] ?>">
        <input type="hidden" name="5" value="<?php echo $residencia['spnombreproyecto']; ?>">
        <?php if($residencia['sptipo'] == 'INTERNO'){
            echo '<input type="hidden" name="6" value="interno">';
        }else if($residencia['sptipo'] == 'EXTERNO'){
            echo '<input type="hidden" name="6" value="externo">';
        }else if($residencia['sptipo'] == 'DUAL'){
            echo '<input type="hidden" name="6" value="dual">';
        }else if($residencia['sptipo'] == 'CIIE'){
            echo '<input type="hidden" name="6" value="ciie">';
        }
        ?>
            <?php
            $query = "SELECT SolicitudResidencia.`SROpcionElegida` FROM `SolicitudResidencia`
            INNER JOIN BancoProyectos ON BancoProyectos.BPID = SolicitudResidencia.BPID
            INNER JOIN SolicitudProyecto ON SolicitudProyecto.SPID = BancoProyectos.SPID
            WHERE SolicitudResidencia.UAlumno = ".$_SESSION['id']." AND SolicitudProyecto.`SPID` = $SPID";
            $residenciaOP = mysqli_fetch_array(mysqli_query($conn,$query));
            if($residenciaOP[0] == 'Op1'){
                    echo "<input type='hidden' name='7' value='propuesta'>";
                }else if($residenciaOP[0] == 'Op2'){
                    echo "<input type='hidden' name='7' value='trabajador'>";
                }else if($residenciaOP[0] == 'Op3'){
                    echo "<input type='hidden' name='7' value='banco'>";
            }
        ?>
        <input type="hidden" name="8" value="<?php echo $residencia['sdtiempoestimado'] . ' meses'; ?>">
        <input type="hidden" name="10" min="1" max="4" value="<?php echo $residencia['spestudiantesrequeridos']; ?>">
        <input type="hidden" name="11" value="<?php echo $empresa['nombre'] ?>">
        <?php if($empresa['ramo'] == 'Industrial'){
            echo '<input type="hidden" name="12" value="infustrial">';
            }else if($empresa['ramo'] == 'Servicios'){
                echo '<input type="hidden" name="12" value="servicios">';
            }else if(empty($empresa['ramo']) || $empresa['ramo'] == 'Otro' || ($empresa['ramo'] != 'Industrial' && $empresa['ramo'] != 'Servicios' && $empresa['ramo'] != 'Escolar')){
                echo '<input type="hidden" name="12" value="otro">';
            }
        ?>
        <input type="hidden" name="13" value="<?php echo $empresa['erfc'] ?>">
        <?php if($empresa['esector'] == 'Publico'){
            echo '<input type="hidden" name="14" value="publico">';
        }else if($empresa['esector'] == 'Privado'){
            echo '<input type="hidden" name="14" value="privado">';
        }else if(empty($empresa['esector']) || $empresa['esector'] == 'Otro' || ($empresa['esector'] != 'Publico' && $empresa['esector'] != 'Privado')){
            echo '<input type="hidden" name="14" value="Otro">';
        }

        ?>
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
        <input type="hidden" name="b35" value="<?php echo $residente['seguro_social'] ?>">
        <?php if($residente['institucionseguro'] == 'IMSS'){
                echo '<input type="hidden" name="34" value="IMSS">';   
            }else if($residente['institucionseguro'] == 'ISSSTE'){
                echo '<input type="radio" name="34" value="ISSSTE">';
            }else if(empty($residente['institucionseguro']) || $residente['institucionseguro'] == 'Otro' || ($residente['institucionseguro'] != 'IMSS' && $residente['institucionseguro'] != 'ISSSTE')){
                echo '<input type="radio" name="34" value="OTROS">';
            }
        ?>
        <input type="hidden" name="35" value="<?php echo $residente['ciudad'] ?>">
        <input type="hidden" name="36" value="<?php echo $residente['tel'] ?>">  
        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
        <input type="submit" id="submitButton" value="">
        <script>
           var submitButton = document.getElementById('submitButton');
            // Simula un clic en el botón de envío automáticamente
            submitButton.click();
        </script>
    </form>
</body>
</html> 
