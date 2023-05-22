    <?php 
    include ('funcAsesor.php');
    $SPID = $_POST['SPID'];
    $empresa = getEmpresa($SPID);
    $ProyectoS = ObtenerSolicitudProyecto($SPID);
    ?>
    <!DOCTYPE html>
    <html>
<?php include ('encabezado.php'); encabezadox('Detalles Proyectos') #encabezado xd?> 
    <br>
    <form>
        <fieldset class="bg-fldst">
        <legend class="legend">Datos del Proyecto</legend>
                <div class="columnaL">
                    <div class="form-row">
                        <label for="NombreProyecto">Nombre del Proyecto:</label>
                        <input type="text" class="input-estiloDG" name="NombreProyecto" value="<?php echo $ProyectoS['SPNombreProyecto']; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for="ObjetivoP">Objetivo:</label>
                        <input type="text" name="ObjetivoP" value="<?php echo $ProyectoS['SPObjetivo']; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for='DespripcionP'>Descripcion:</label>
                        <input type="text" name="DespripcionP" value="<?php echo $ProyectoS['SPDescripcion']; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for="ImapactoP">Impacto:</label>
                        <input type="text" name="ImapactoP" value="<?php echo $ProyectoS['SPImpacto'] ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                    <label for="LugarP">Lugar:</label>
                        <input type="text" name="LugarP" value="<?php echo $ProyectoS['SPLugar']; ?>" disabled='disabled'>
                    </div>
                </div>
                <div class="columnaC">
                    <div class="form-row">
                        <label for="Estudiantes-req">Estudiantes Requeridos:</label>
                        <input type="text" name="Estudiantes-req" value="<?php echo $ProyectoS['SPEstudiantesRequeridos']; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for="TiempoP">Tiempo Estimado:</label>
                        <input type="text" name="TiempoP" value="<?php echo $ProyectoS['SDTiempoEstimado'] . ' Meses'; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for="TipoP">Tipo Proyecto:</label>
                        <input type="text" name="TipoP" value="<?php echo $ProyectoS['SPTipo']; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for="lineaInv">Linea de Investigacion:</label>
                        <input type="text" name="lineaInv" value="<?php echo $ProyectoS['SPLineaInvestigacion']; ?>" disabled='disabled'>
                    </div>
                    <div class="form-row">
                        <label for="ReferenciasP">Referencias:</label>
                        <input type="text" name="ReferenciasP" value="<?php echo $ProyectoS['SPReferencias']; ?>" disabled='disabled'>
                    </div>
                </div>
        </fieldset>
        <br>
        <!------------------------------------------------------- Fieldset Datos Empresa ---------------------------------------------------------->
        <fieldset class="bg-fldst">
        <legend class="legend">Datos de la empresa</legend>
                    <div class="columnaL">
                        <div class="form-row">
                        <label for="ENombre">Nombre Empresa:</label>
                        <input type="text" id="ENombre" name="ENombre" value="<?php echo $empresa['nombre'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="Eramo">Ramo:</label>
                            <input type="text" name="ramo" value="<?php echo $empresa['ramo'] ?>" disabled='disabled' >
                        </div>
                        <div class="form-row">
                            <label for="ERFC">RFC:</label>
                            <input type="text" id="ERFC" name="ERFC" value="<?php echo $empresa['erfc'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="ESector">Sector:</label>
                            <input type="text" name="ESector" value="<?php echo $empresa['esector'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="EActPrincipal">Actividad principal de la empresa:</label>
                            <input type="text" id="EActPrincipal" name="EActPrincipal" value="<?php echo $empresa['eactprincipal'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="EDomicilio">Domicilio:</label>
                            <input type="text" id="EDomicilio" name="EDomicilio" value="<?php echo $empresa['edomicilio'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="EColonia">Colonia:</label>
                            <input type="text" id="EColonia" name="EColonia" value="<?php echo $empresa['ecolonia'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="ECp">CP:</label>
                            <input type="text" id="ECp" name="ECp" value="<?php echo $empresa['ecp'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="EFax">FAX:</label>
                            <input type="text" id="EFax" name="EFax" value="<?php echo $empresa['efax'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="ECiudad">Ciudad:</label>
                            <input type="text" id="ECiudad" name="ECiudad" value="<?php echo $empresa['eciudad'] ?>" disabled='disabled'>
                        </div>
                    </div>
                    <div class="columnaC">
                        <div class="form-row">
                            <label for="ETelefono">Teléfono:</label>
                            <input type="tel" id="ETelefono" name="ETelefono" value="<?php echo $empresa['etelefono'] ?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                        <label for="nombreTitular">Nombre del titular de la empresa:</label>
                            <input type="text" id="nombreTitular" value="<?php echo $empresa['enombretitular']?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="puestoTitular">Puesto:</label>
                            <input type="text" name="puestoTitular" value="<?php echo $empresa['epuestotitular']?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="nomAsesorExterno">Nombre del Asesor Externo:</label>
                            <input type="text" name="nomAsesorExterno" value="<?php echo $empresa['enombreacuerdo']?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="puestoAsesor">Puesto:</label>
                            <input type="text" name="puestoAsesor" value="<?php echo $empresa['epuestoacuerdo']?>" disabled='disabled'>
                        </div>
                        <div class="form-row">
                            <label for="ENombreEncargado">Nombre de la persona que firmará el acuerdo de trabajo. Estudiante- Escuela-Empresa:</label>
                            <input type="text" name="ENombreEncargado" value="<?php echo $empresa['enombreacuerdo']?>" disabled='disabled'>
                        </div> 
                    </div>
        </fieldset><br>
        <fieldset class="bg-fldstEst">
        <legend class="legend">Datos De Los Alumnos</legend>
        <div class="containerSRP">
        <table>
            <thead>
                <tr>
                    <th>Numero de control</th>
                    <th>Nombre Completo</th>
                    <th>Semestre Actual</th>
                    <th>Correo Institucional</th>
                </tr>
            </thead>
            <?php
                $Alumnos = alumnosResidentes($SPID);
                while($result = mysqli_fetch_array($Alumnos)){
            ?>
            <form method="POST">
            <tbody>
                <td><?php echo $result['NumeroControl']?></td>
                <td><?php echo $result['NombreCompleto']?></td>
                <td><?php echo $result['SemestreActual']?></td>
                <td><?php echo $result['CorreoInstitucional']?></td>
            </tbody>
            </form>
            <?php } ?>
        </table>
    </div> <br>
    </fieldset><br>
    <div class="button-reg">
    <input type="submit" formaction="AsesorInternoResidencias.php" value="Regresar"class="btn btn-actualizar">
    </div><br>
    </form>
    </body>
</html>
