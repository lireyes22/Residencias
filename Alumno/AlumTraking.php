<?php
include '../InicioSessionSeg.php';
include_once ('Alumfunciones.php');
$link = conn();
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $query="SELECT * FROM SolicitudProyecto 
    INNER JOIN BancoProyectos ON SolicitudProyecto.SPID = BancoProyectos.SPID 
    INNER JOIN Usuarios ON SolicitudProyecto.UIDResponsable = Usuarios.UID 
    INNER JOIN UsuariosDepartamentos ON Usuarios.UID=UsuariosDepartamentos.UID
    WHERE UsuariosDepartamentos.DID='5' ";
    $result = mysqli_query($link, $query);
include 'headAlumnos.php';
?>
            

            <!-- Contenido principal -->
            <!--Notas: Incorporar botones al incorporar el backlog-->
                <div class="col ms-sm-auto px-4">
                    <div class="container mt-3 text-center">
                        <div id="tr" align="center">
                            <h2>Traking</h2>
                        </div>                        
                        <script>
                        $(document).ready(function(){
                          $("#alert").click(function(){
                            $("#tr").width(1300).height(100);
                          });
                        });
                        </script>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Si no ves tu proyecto intenta actualizar la pagina con <kbd>F5</kbd> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alert"></button>
                            </div>
                        <div class="container text-start mb-4">
                            <div class="h4 d-block">Proyectos Propuestos 
                                <button type="button" class="btn btn-info" data-bs-toggle="popover" title="Información" data-bs-content="Listado de todos los proyectos que has propuesto, asi como el progreso de cada uno.">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                </button>                                  
                                <div class="d-block small text-end">Fecha Límite: <?php echo retornarFechaLimite('ProponerProyecto'); ?></div>
                            </div>
                            <?php 
                                $conn = conn();
                                $id=$_SESSION['id'];
                                $sql = "SELECT * FROM SolicitudProyecto WHERE UPropietario='$id'";
                                $resultado = $conn->query($sql);

                                if ($resultado->num_rows > 0) {
                                    // Imprimir los resultados línea por línea
                                    while ($fila = $resultado->fetch_assoc()) {
                                        $statusInfo = verificarSolicitudProyectoN1($fila['SPEstatus']);
                                        $clase = $statusInfo['clase'];
                                        $porcentaje = $statusInfo['porcentaje'];
                            ?>
                            <div class="h5 d-block"><?php echo $fila['SPNombreProyecto']; ?>
                                <div class="d-block small text-end"><b>ESTATUS: </b><?php echo $fila['SPEstatus']; ?></div>
                            </div>
                            <div class="progress mb-4" style="height:25px"role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="<?php echo $clase; ?>" style="width: <?php echo $porcentaje; ?>%">
                                    <span style="font-size: 17px;"><?php echo $porcentaje; ?>%</span>
                                </div>
                            </div>
                            

                            <?php
                                }
                            } else {
                                echo "No se han propuesto proyectos.";
                            }
                            ?>
                        </div>                      
                        <div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
                        <div class="container text-start mb-4">
                            <div class="h4 d-block">Solicitud residencia
                                <button type="button" class="btn btn-info" data-bs-toggle="popover" data-bs-trigger="focus" title="Información" data-bs-content="Listado de todas las solicitudes , asi como el progreso de cada una.">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                </button>  
                                <div class="d-block small text-end">Fecha Límite: <?php echo retornarFechaLimite('SolicitarResidencia'); ?></div>
                            </div>
                            <?php 
                                $conn = conn();
                                $id=$_SESSION['id'];
                                $sql = "SELECT SolicitudResidencia.UAlumno,SolicitudResidencia.SREstatus, SolicitudProyecto.SPNombreProyecto, SolicitudProyecto.SPID, SolicitudResidencia.SRID FROM SolicitudResidencia 
                                INNER JOIN BancoProyectos ON BancoProyectos.BPID = SolicitudResidencia.BPID 
                                INNER JOIN SolicitudProyecto ON BancoProyectos.SPID = SolicitudProyecto.SPID 
                                WHERE SolicitudResidencia.UAlumno='$id'";
                                $resultado = $conn->query($sql);

                                if ($resultado->num_rows > 0) {
                                    // Imprimir los resultados línea por línea
                                    while ($fila = $resultado->fetch_assoc()) {
                                        $statusInfo2 = verificarSolicitudResidenciaN1($fila['SREstatus']);
                                        $clase2 = $statusInfo2['clase'];
                                        $porcentaje2 = $statusInfo2['porcentaje'];
                            ?>
                            <div class="h5 d-block"><?php echo $fila['SPNombreProyecto']; ?>                        
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex justify-content-end">
                                                    <div class="d-inline">
                                                        <form action="AlumReenviaSoliResidencia.php" method="POST">
                                                            <input type="hidden" name="SPID" value="<?php echo $fila['SPID']?>">
                                                            <input type="hidden" name="SRID" value="<?php echo $fila['SRID']?>">
                                                            <?php
                                                            if($fila['SREstatus']=="RECHAZADO"){
                                                                ?>
                                                                <button type="submit" class="btn btn-outline-info" value="Reenviar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                                      <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                                      <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                                                    </svg>
                                                                     <style>
                                                                        .btn-outline-info:hover::before {
                                                                            content: "Reenviar";
                                                                        }
                                                                        </style>
                                                                </button>
                                                                <?php
                                                            }
                                                            ?>                          
                                                        </form>
                                                    </div>
                                                    <!--condicion para que pueda editar su solicitud  -->
                                                    <?php
                                                    if($fila['SREstatus'] == 'PENDIENTE'){
                                                        //IMPRIMIR EL BOTON DE EDITAR
                                                        ?>
                                                        <div class="d-inline">
                                                            <form method="POST" action="AlumEditSoliResidencia.php">                                        
                                                            <input type="hidden" name="SPID" value="'.$fila['SPID'].'">
                                                            <button type="submit" class="btn btn-outline-primary" value="Generar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                    </svg>
                                                                     <style>
                                                                        .btn-outline-primary:hover::before {
                                                                            content: "Editar";
                                                                        }
                                                                        </style>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        
                                                    <?php  
                                                        }
                                                    ?>
                                                        <div class="d-inline">
                                                            <form action="inserts/dataGenerator.php" method="POST" target="blank">
                                                                <input type="hidden" name="SPID" value="<?php echo $fila['SPID']?>">
                                                                <button type="submit" class="btn btn-outline-success" value="Generar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                                                    </svg>
                                                                     <style>
                                                                        .btn-outline-success:hover::before {
                                                                            content: "Imprimir";
                                                                        }
                                                                        </style>
                                                                </button>
                                                            </form> 
                                                        </div>
                                                        
                                                        <?php
                                                        if($fila['SREstatus'] == 'PENDIENTE'){
                                                        ?>
                                                        <div class="d-inline">
                                                            <form method="post">
                                                                <input type="hidden" name="registro_id" value="<?php echo $fila['SRID']?>">                                 
                                                                <button type="submit" class="btn btn-outline-success" value="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                                                    </svg>
                                                                     <style>
                                                                        .btn-outline-success:hover::before {
                                                                            content: "Imprimir";
                                                                        }
                                                                        </style>
                                                                </button>
                                                            </form> 
                                                        </div>                                      
                                                        <?php 
                                                        }
                                                        ?>                                                                  
                                                    
                                                    <b>ESTATUS: </b><?php echo $fila['SREstatus']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                              
                            </div>
                            <div class="progress mb-4" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="<?php echo $clase2; ?>" style="width: <?php echo $porcentaje2; ?>%">
                                    <span style="font-size: 17px;"><?php echo $porcentaje2; ?>%</span>
                                </div>
                            </div>
                            <?php
                                } 
                            } else {
                                echo "No se han propuesto proyectos.";
                            }   
                            ?> 
                        </div>

                        <div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
                        <div class="container text-start mb-4">
                            <div class="h4 d-block">Reporte parcial 1
                                <button type="button" class="btn btn-info" data-bs-toggle="popover" data-bs-trigger="hover" title="Información" data-bs-content="En esta sección, podrás imprimir los documentos si los asesores han registrado todas las calificaciones.">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                </button>  
                                <div class="d-flex justify-content-end">
                                    <form action="../GenerarDocs/GenerarEvaluacionSeguimiento.php" method="post" target="_blank"> 
                                        <input type="hidden" name="idUAlumno" value="<?php echo $_SESSION['id'] ?>">                                    
                                        <button type="submit" class="btn btn-outline-success" value="Evaluación">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                              <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                              <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                            </svg>
                                             <style>
                                                .btn-outline-success:hover::before {
                                                    content: "Imprimir Reporte";
                                                }
                                                </style>
                                        </button>
                                        </form>
                                    Fecha Límite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?>
                                </div>
                            </div>
                            <div class="h5"><?php echo verificarSolicitudReporteParcial1(true,$_SESSION['id']);?></div>
                            <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-dark" style="width: 100%"><span style="font-size: 17px;">100%</span></div>
                            </div>
                        </div>
                        <div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
                        <div class="container text-start mb-4">
                            <div class="h4 d-block">Reporte parcial 2
                                <button type="button" class="btn btn-info" data-bs-toggle="popover" data-bs-trigger="hover" title="Información" data-bs-content="En esta sección, podrás imprimir los documentos si los asesores han registrado todas las calificaciones.">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                </button>  
                                <div class="d-flex justify-content-end">
                                    <form action="../GenerarDocs/GenerarEvaluacionSeguimiento.php" method="post" target="_blank"> 
                                        <input type="hidden" name="idUAlumno" value="<?php echo $_SESSION['id'] ?>">                                    
                                        <button type="submit" class="btn btn-outline-success" value="Evaluación">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                              <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                              <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                            </svg>
                                             <style>
                                                .btn-outline-success:hover::before {
                                                    content: "Imprimir Reporte";
                                                }
                                                </style>
                                        </button>
                                        </form>
                                    Fecha Límite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?>
                                </div>
                            </div>
                            <div class="h5"><?php echo verificarSolicitudReporteParcial2(true,$_SESSION['id']);?></div>
                            <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-dark" style="width: 100%"><span style="font-size: 17px;">100%</span></div>
                            </div>
                        </div>
                        <div class="container text-start mb-4" style="border-top: 2px solid black;"></div>
                        <div class="container text-start mb-4">
                            <div class="h4 d-block">Reporte final
                                <button type="button" class="btn btn-info" data-bs-toggle="popover" data-bs-trigger="hover" title="Información" data-bs-content="En esta sección, podrás imprimir los documentos si los asesores han registrado todas las calificaciones.">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg>
                                </button>  
                                <div class="d-flex justify-content-end">
                                    <form action="Alumndescargardoc.php" method="post" target="_blank"> 
                                        <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">                                  
                                        <button type="submit" class="btn btn-outline-primary" value="Descargar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                              <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                              <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                            </svg>
                                             <style>
                                                .btn-outline-primary:hover::before {
                                                    content: "Imprimir Reporte";
                                                }
                                                </style>
                                        </button>
                                    </form>
                                    <form action="../GenerarDocs/GenerarEvaluacionReporteFinal.php" method="post" target="_blank"> 
                                        <input type="hidden" name="idUAlumno" value="<?php echo $_SESSION['id'] ?>">                                    
                                        <button type="submit" class="btn btn-outline-success" value="Evaluación">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                              <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                              <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                            </svg>
                                             <style>
                                                .btn-outline-success:hover::before {
                                                    content: "Imprimir Evaluación";
                                                }
                                                </style>
                                        </button>
                                    </form>
                                    Fecha Límite: <?php echo retornarFechaLimite('AsesoresEvaluacionSeguimiento'); ?>
                                </div>
                            </div>
                            <div class="h5"><?php echo verificarSolicitudReporteFinal(true,$_SESSION['id']);?></div>
                            <div class="progress" style="height:25px" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar text-bg-dark" style="width: 100%"><span style="font-size: 17px;">100%</span></div>
                            </div>
                        </div>
            
                        
                    </div>
                </div>
                <script>
                    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
                    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                      return new bootstrap.Popover(popoverTriggerEl);
                    });
                  </script>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
            $conexion = conn();

    // Verificar la conexión
            if (!$conexion) {
                die("Error al conectar a la base de datos: " . mysqli_connect_error());
            }

    // Obtener el ID del registro a eliminar
            $registro_id = $_POST['registro_id'];

    // Eliminar el registro de la base de datos
            $sql = "DELETE FROM solicitudresidencia WHERE SRID = $registro_id";
            if (mysqli_query($conexion, $sql)) {
                //echo "Registro eliminado exitosamente.";
            } else {
                //echo "Error al eliminar el registro: " . mysqli_error($conexion);
            }

    // Cerrar la conexión
            mysqli_close($conexion);

    // Reedireccionar
            echo"<script  language='javascript'>window.location='AlumTraking.php'</script>"; 
        }
    ?>

<?php
include 'footer.php';
?>